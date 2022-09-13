<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();


//Load Composer's autoloader
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

if(isset($_POST['submit']))
{
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = 'http://localhost/create-new-pasword.php?selector='. $selector . '&validator=' . bin2hex($token);

    $expires = date("U") + 1800;

    require 'db.inc.php';

    $userEmail = $_POST['email'];

    $sql = 'DELETE FROM pwdReset WHERE pwdResetEmail=?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo 'err';
        exit();
    }else
    {
        mysqli_stmt_bind_param($stmt, 's', $userEmail);
        mysqli_stmt_execute($stmt);
    }
    
    $sql = 'INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?,?,?,?);';
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo 'err';
        exit();
    }else
    {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, 'ssss', $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $subject = 'Reset Password for send Email';

    $message = '<p>We received a password reset request. The link to reset your password is below. If you did not make this reqeust, you can ignore this email</p>';
    $message .= '<p>Here is the link to reset your password: </br>';
    $message .= '<a href="'. $url . '">' . $url . '</a></p>';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try{
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USERNAME'];                     //SMTP username
        $mail->Password   = $_ENV['SMTP_PWD'];                               //SMTP password
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('ebenvosloo2001@gmail.com', 'Develpment');
        //$mail->addAddress('example@example.com', 'Receiver');     //Add a recipient
        $mail->addAddress($userEmail);               //Name is optional
        
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        $response = 'Success';
        header("Location: ../forgot.php?response=$response");
    } catch (Exception $e) {
        $response = $e;
        header("Location: ../forgot.php?response=$response");
    }

}else{
    header("Location: ../login.php");
}