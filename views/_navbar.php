<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><i class="bi bi-globe"></i> Send Mail</a>
            <ul class="navbar-nav navbar-right">
                <?php
                if(!isset($_SESSION['username'])){
                    echo '<li class="nav-item"><a href="signup.php" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Sign Up</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Login</a></li>';
                }else{
                    echo '<li class="nav-item"><a href="../profile.php" class="nav-link"><i class="bi bi-person-circle"></i> Welcome ' . $_SESSION['username'] . '</a></li>';
                    echo '<li class="nav-item"><a href="../include/logout.inc.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</section>