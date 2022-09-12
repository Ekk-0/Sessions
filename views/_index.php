<section>
    <?php 
        if(isset($_SESSION['username']))
        {
            if(isset($_GET['login']))
            {
               /* This is checking if the user has logged in successfully. If they have, it will
               display a message saying so. */
                $response = $_GET['login'];
                if ($response == "success") {
                    echo "<br><p class='alert  alert-success'>You logged in successfully!<p>";
                }
            }
            echo '<div class="container pt-5"><div class="row p-2"><div class="col-md-12 border border-primary rounded p-2">
                <form method="POST" action="../include/email.inc.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject: </label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message: </label>
                        <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachments" class="form-label">Attachments: </label>
                        <input type="file" class="form-control" id="attachments" name="attachments">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit" value="Send">Send</button>
                </form>
                <br>' . $response = $_GET["response"] ?? "" . '</div></div></div>';
        }else{
            echo '<div class="alert alert-primary">Please Log In or Sign Up!</div>';
        }
    ?>
</section>
