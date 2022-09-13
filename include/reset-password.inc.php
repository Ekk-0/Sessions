<?php

if(isset($_POST['reset-passord-submit']))
{
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $repeat = $_POST['pwd-repeat'];

    if(empty($pwd) || empty($repeat)){
        header("Location: ../create-new-password?response=empty&selector=".$selector."&validator=".$validator);
        exit();
    }else if($pwd != $repeat){
        header("Location: ../create-new-password?response=notmatch&selector=".$selector."&validator=".$validator);
        exit();
    }

    $currentDate = date("U");

    require 'db.inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo 'err';
        exit();
    }else
    {
        mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
            echo 'You need to re-submit your reset request';
            exit();
        }else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);
            if($tokenCheck === false){
                echo 'You need to re-submit your reset request';
                exit();
            }else if($tokenCheck === true){
                $tokenEmail = $row['pwdResetEmail'];

                $sql = 'SELECT * FROM users WHERE user_email=?;';
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo 'err';
                    exit();
                }else
                {
                    mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
                        echo 'There was a ERROR:';
                        exit();
                    }else{
                        $sql = 'UPDATE users SET user_pwd=? WHERE user_email=?;';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql))
                        {
                            echo 'There was a ERROR:';
                            exit();
                        }else
                        {
                            $newPwdHash = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss', $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = 'DELETE FROM pwdReset WHERE pwdResetEmail=?;';
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql))
                            {
                                echo 'There was a ERROR:';
                                exit();
                            }else
                            {
                                mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?login=updated");
                            }
                        }
                    }
                }
            }
        }
    }

}else{
    header("Location: ../index.php");
}