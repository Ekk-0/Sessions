<section>
   <div class="row d-flex justify-content-center pt-5">
        <div class="col-md-6 text-center border rounded p-2">
            <label for="signup"><h1><strong>Login!</strong></h1></label>
            <form action="../include/login.inc.php" method="POST" name="login">
                <?php
                    if(isset($_GET['uid']))
                    {
                        $uid = $_GET['uid'];
                        echo '<div class="input-group">
                        <div class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 12">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                        </div>
                        <input class="form-control" type="text" name="uid" placeholder="Username" value="'.$uid.'"/><br>
                        </div><br>';
                    }
                    else
                    {
                        echo '
                        <div class="input-group">
                            <div class="input-group-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 12">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
                            </div>
                            <input class="form-control" type="text" name="uid" placeholder="Username"/><br>
                            </div><br>';
                    }
                ?>
                 <div class="input-group">
                            <div class="input-group-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-key" viewBox="0 0 16 12">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                            </div>
                            <input class="form-control" type="password" name="pwd" placeholder="Password"/><br>
                            </div><br>
                <button class="btn btn-primary" type="submit" name="submit">Login</button><br>
            </form>
            <?php
                if(isset($_GET['login'])){
                    $response = $_GET['login'];
                    switch($response)
                    {
                        case "empty":
                            echo "<br><p class='alert  alert-danger'>You did not fill in all the fields!<p>";
                            break;
                        case "uid":
                            echo "<br><p class='alert  alert-danger'>Your username is incorrect!<p>";
                            break;
                        case "pwd":
                            echo "<br><p class='alert  alert-danger'>Your password is incorrect!<p>";
                            break;
                        case "success":
                            echo "<br><p class='alert  alert-success'>You logged in successfully!<p>";
                            break;
                        default:
                            break;
                    }
                }
            ?>
        </div>
    </div>
</section>
