<section>
    <div class="container pt-5">
        <div class="row p-2">
            <div class="col-md-12 border border-primary rounded p-2">
                <?php 
                    $selector = $_GET['selector'];
                    $validator = $_GET['validator'];

                    if(empty($selector) || empty($validator)){
                        echo 'could not validate your request';
                    }else{
                        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                            ?>
                            <form method="POST" action="include/reset-password.inc.php">
                                <?php 
                                   if(isset($_GET['selector'])){
                                        $selector = $_GET['selector'];
                                        echo '<input type="hidden" name="selector" value=' .$selector. '>';
                                    }else{
                                        echo '<input type="hidden" name="selector" value=' .$selector. '>';
                                    }
                                    if(isset($_GET['validator'])){
                                        $validator = $_GET['validator'];
                                        echo '<input type="hidden" name="validator" value=' .$validator. '>';
                                    }else{
                                        echo '<input type="hidden" name="validator" value=' .$validator. '>';
                                    }
                                ?>
                                <input class="form-control" type="password" name="pwd" placeholder="Enter a new password..">
                                <input  class="form-control" type="password" name="pwd-repeat" placeholder="Repeat new password..">
                                <button class="btn btn-primary" type="submit" name="reset-passord-submit">Reset Password</button>
                            </form>                 
                            <?php
                        }
                    }
                    if(isset($_GET['response'])){
                        $response = $_GET['response'];
                        switch($response)
                        {
                            case "empty":
                                echo "<br><p class='alert  alert-danger'>You did not fill in all the fields!<p>";
                                break;
                            case "notmatch":
                                echo "<br><p class='alert  alert-danger'>Your username is incorrect!<p>";
                                echo $forgot;
                                break;
                            default:
                                break;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>