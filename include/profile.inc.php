<?php
    session_start();

    if(!isset($_POST['submit'])){
        include_once 'db.inc.php';

        $file = $_FILES['profileImage'];
        if(isset($file))
        {
            $fileName = $_FILES['profileImage']['name'];
            $fileTMPname = $_FILES['profileImage']['tmp_name'];
            $fileSize = $_FILES['profileImage']['size'];
            $fileError = $_FILES['profileImage']['error'];
            $fileType = $_FILES['profileImage']['type'];
    
            $fileExt = explode('.', $fileName);
            $fileExtR = strtolower(end($fileExt));
    
            $allow = array('jpg', 'jpeg', 'png');
    
            if(in_array($fileExtR, $allow))
            {
                if($fileError === 0)
                {
                    if($fileSize < 1000000)
                    {
                        $fileNameN =  $_SESSION['username'] . "." . $fileExtR;
                        $fileDest = '../profileImages/'.$fileNameN;
    
                        move_uploaded_file($fileTMPname, $fileDest);

                        $_SESSION['imageName'] = $fileDest;
                        $sql = "UPDATE users SET user_img = ? WHERE user_uid = ?";
        
                        $stmt = mysqli_stmt_init($conn);
                        
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "20: SQL ERROR:" . mysqli_error($conn);
                        }else {
                            mysqli_stmt_bind_param($stmt, 'ss', $fileDest, $_SESSION['username']);
                            mysqli_stmt_execute($stmt);
                        }
                        header("Location: ../profile.php?response=success");
                    }
                    else{
                        header("Location: ../profile.php?response=File was too large");
                    }
                }
                else{
                    header("Location: ../profile.php?response=There was a error uploading file");
                }
            }
            else{
                header("Location: ../profile.php?response=File type mismatch");
            }
        }
        else{
           exit();
        }
    }
    else{
        header("Location: ../profile.php?response=error");
    }
