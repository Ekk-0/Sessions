<?php
    session_start();
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $response = "";

    if(isset($_POST['submit'])){
        //Load Composer's autoloader
        require '../vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        if(isset($_POST['attachments']))
        {
            $fileName = $_FILES['attachments']['name'];
            $fileTMPname = $_FILES['attachments']['tmp_name'];
            $fileSize = $_FILES['attachments']['size'];
            $fileError = $_FILES['attachments']['error'];
            $fileType = $_FILES['attachments']['type'];
    
            $fileExt = explode('.', $fileName);
            $fileExtR = strtolower(end($fileExt));
    
            $allow = array('jpg', 'jpeg', 'png', 'pdf');
    
            if(in_array($fileExtR, $allow))
            {
                if($fileError === 0)
                {
                    if($fileSize < 1000000)
                    {
                        $fileNameN = uniqid('', true) . "." . $fileExtR;
                        $fileDest = '../uploads/'.$fileNameN;

                        move_uploaded_file($fileTMPname, $fileDest);

                        //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);
                        try{
                            //Server settings
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'apikey';                     //SMTP username
                            $mail->Password   = $_ENV['SMTP_CONNECTION'];                               //SMTP password
                            $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
                            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                            //Recipients
                            $mail->setFrom('ebenvosloo2001@gmail.com', 'Develpment');
                            //$mail->addAddress('example@example.com', 'Receiver');     //Add a recipient
                            $mail->addAddress($_POST['email']);               //Name is optional
                            $mail->addReplyTo($_SESSION['email'], 'Sender');
                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');

                            //Attachments
                            $mail->addAttachment($fileDest);         //Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = $_POST['subject'];
                            $mail->Body    = $_POST['message'] . '<br>This message was sent from ' . $_SESSION['email'];
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send();
                            $response = 'Message has been sent';
                            header("Location: ../index.php?response=$response");
                        } catch (Exception $e) {
                            $response = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            header("Location: ../index.php?response=$response");
                        }
                    }
                    else{
                        header("Location: ../index.php?response=ERROR: File was too large");
                    }
                }
                else{
                    header("Location: ../index.php?response=ERROR: There was a error uploading file");
                }
            }
            else{
                header("Location: ../index.php?response=ERROR: File type mismatch");
            }
        }
        else{
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try{
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'apikey';                     //SMTP username
                $mail->Password   = $_ENV['SMTP_CONNECTION'];                               //SMTP password
                $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('ebenvosloo2001@gmail.com', 'Develpment');
                //$mail->addAddress('example@example.com', 'Receiver');     //Add a recipient
                $mail->addAddress($_POST['email']);               //Name is optional
                $mail->addReplyTo($_SESSION['email'], 'Sender');
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $_POST['subject'];
                $mail->Body    = $_POST['message'] . '<br>This message was sent from ' . $_SESSION['email'];
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $response = 'Message has been sent';
                header("Location: ../index.php?response=$response");
            } catch (Exception $e) {
                $response = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" . $_ENV['SMTP_CONNECTION'];
                header("Location: ../index.php?response=$response");
            }
        }
    }
    else{
        header("Location: ../index.php?response=error");
    }
