<?php 

if(isset($_POST['submit']))
{
    include_once 'db.inc.php';

    $first =  mysqli_real_escape_string($conn, $_POST['first']);
    $last =  mysqli_real_escape_string($conn, $_POST['last']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $uid =  mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd =  mysqli_real_escape_string($conn, $_POST['pwd']);

    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
        if(!preg_match('/^[a-zA-Z]*$/', $first) || !preg_match('/^[a-zA-Z]*$/', $last) ){
            header("Location: ../signup.php?signup=char&email=$email&uid=$uid");
            exit();
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                header("Location: ../signup.php?signup=invalidemail&first=$first&last=$last&uid=$uid");
                exit();
            }
            else
            {
                $sql = "SELECT user_email, user_uid FROM users";
        
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "33: SQL ERROR: ". mysqli_error($conn);
                }else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                    {
                        if($row[0] == $email)
                        {
                            header("Location: ../signup.php?signup=emailexists&first=$first&last=$last&uid=$uid");
                            exit();
                        } elseif($row[1] == $uid)
                        {
                            header("Location: ../signup.php?signup=uidexists&first=$first&last=$last&email=$email");
                            exit();
                        }
                    }
                    mysqli_stmt_close($stmt);

                    $sql = "INSERT INTO `users` (user_first, user_last, user_email, user_uid, user_pwd)
                    VALUES (?, ?, ?, ?, ?);";
                    
                    $stmt = mysqli_stmt_init($conn);
                    
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "57: SQL ERROR: " . mysqli_error();
                    }else {
                        $pass = password_hash($pwd, PASSWORD_DEFAULT);    
                        mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $pass);
                        mysqli_stmt_execute($stmt);

                        header("Location: ../signup.php?signup=success");
                    }
                    echo "65: SQL ERROR: " . mysqli_error($stmt);
                }
            }
        }
    }
}else{
    header("Location: ../signup.php");
}
