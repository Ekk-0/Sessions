<section>
   <div class="row d-flex justify-content-center pt-5">
        <div class="col-md-6 text-center border rounded p-2">
            <label for="signup"><h1><strong>Sign Up!</strong></h1></label>
            <form action="../include/signup.inc.php" method="post" name="signup">
                <div class="form-group">
                    <?php
                    if(isset($_GET['first']))
                    {
                        $first = $_GET['first'];
                        echo '<div class="input-group">
                        <div class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 12">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      </svg>
                        </div>
                        <input class="form-control" type="text" name="first" placeholder="Firstname" value="'.$first.'"/>
                        </div><br>';
                    }
                    else
                    {
                        echo '
                        <div class="input-group">
                            <div class="input-group-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 12">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
                            </div>
                            <input class="form-control" type="text" name="first" placeholder="Firstname"/>
                            </div><br>';
                    }
                    if(isset($_GET['last']))
                    {
                        $last = $_GET['last'];
                        echo '<div class="input-group">
                        <div class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 12">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      </svg>
                        </div>
                        <input class="form-control" type="text" name="last" placeholder="Lastname" value="'.$last.'"/>
                        </div><br>';
                    }
                    else
                    {
                        echo '
                        <div class="input-group">
                            <div class="input-group-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 12">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
                            </div>
                            <input class="form-control" type="text" name="last" placeholder="Lastname"/><br>
                            </div><br>';
                    }
                    if(isset($_GET['email']))
                    {
                        $email = $_GET['email'];
                        echo '<div class="input-group">
                        <div class="input-group-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 17 12">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                      </svg>
                        </div>
                        <input class="form-control" type="text" name="email" placeholder="Email" value="'.$email.'"/><br>
                        </div><br>';
           
                    }
                    else
                    {
                        echo '
                        <div class="input-group">
                            <div class="input-group-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 17 12">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg>
                            </div>
                            <input class="form-control" type="text" name="email" placeholder="Email"/><br>
                            </div><br>';
              
                    }
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
                   
                    <button class="btn btn-primary" type="submit" name="submit">Sign Up</button><br>
                </div>
            </form>
            <?php
                if(isset($_GET['signup']))
                {
                    $response = $_GET['signup'];

                    switch($response)
                    {
                        case "empty":
                            echo "<br><p class='alert  alert-danger'>You did not fill in all the fields!<p>";
                            break;
                        case "char":
                            echo "<br><p class='alert  alert-danger'>You used invalid characters!<p>";
                            break;
                        case "invalidemail":
                            echo "<br><p class='alert  alert-danger'>You have entered an invalid email!<p>";
                            break;
                        case "emailexists":
                            echo "<br><p class='alert  alert-danger'>Email already exists!<p>";
                            break;
                        case "uidexists":
                            echo "<br><p class='alert  alert-danger'>Username already exists!<p>";
                            break;
                        case "success":
                            echo "<br><p class='alert  alert-success'>You have been signed up successfully!<p>";
                            break;
                        default:
                            break;
                    }
                }
            ?>
        </div>
    </div>
</section>