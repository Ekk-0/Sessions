<?php 
session_start();

if(isset($_POST['submit']))
{
    include_once 'db.inc.php';

    $uid =  mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd =  mysqli_real_escape_string($conn, $_POST['pwd']);

    if(empty($uid) || empty($pwd)){
        header("Location: ../login.php?login=empty");
        exit();
    }else{
        
        $sql = "SELECT user_uid, user_pwd, user_email, user_first, user_last, user_img FROM users";
        
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "20: SQL ERROR:" . mysqli_error($conn);
        }else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $userExists = false;

            while($row = mysqli_fetch_array($result, MYSQLI_NUM))
            {
                if($row[0] == $uid)
                {
                    $userExists = true;
                    if(password_verify($pwd, $row[1]))
                    {
                            $_SESSION['username'] = $uid;
                            $_SESSION['email'] = $row[2];
                            $_SESSION['firstname'] = $row[3];
                            $_SESSION['lastname'] = $row[4];
                            $_SESSION['imageName'] = $row[5];
                            header("Location: ../index.php?login=success");        
                            exit();
                    }
                }
            }
            if($userExists)
            {
                header("Location: ../login.php?login=pwd&uid=$uid");   
                exit(); 
            }else{
                header("Location: ../login.php?login=uid");   
                exit();
            }
        }
    }
}else{
    header("Location: ../login.php");
}
