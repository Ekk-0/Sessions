<section>
    <div class="container pt-5">
        <div class="row p-2">
            <div class="col-md-12 border border-primary rounded p-2">
                <form method="POST" action="../include/forgot.inc.php">
                    <div class="mb3 text-center">
                        <h1>Reset your Password</h1>
                        <p>An email will be sent to your email address with instructions to reset your password.</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address: </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit" value="Send">Send</button>
                </form>
                <br>
                <?php 
                    if(isset($_GET["response"])){
                        $response = $_GET["response"];
                        switch($response){
                            case "success":
                                echo '<p class="alert alert-success">Check your Email!</p>';
                                break;
                            case "ERROR":
                                echo '<p class="alert alert-warning">No Account was Found with that email!</p>';
                                break;
                            default:
                                echo $response;
                                break;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>