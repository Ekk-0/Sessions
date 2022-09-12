<section>
    <div class="container pt-5">
        <div class="row border rounded p-2 text-white bg-dark">
            <div class="col-md-3 text-center">
                <img src="<?php echo '../profileImages/' . ($_SESSION['imageName'] ?? 'Default.png'); ?>" width="150px" height="150px" alt="img"/>
                <form method="POST" action="../include/profile.inc.php" enctype="multipart/form-data">
                    <input class="form-control" type="file" name="profileImage"/>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-3">
                Firstname: <?php echo $_SESSION['firstname']; ?>
            </div>
            <div class="col-md-3">
                Lastname: <?php echo $_SESSION['lastname']; ?>
            </div>
            <div class="col-md-3">
                Email: <?php echo $_SESSION['email']; ?>
            </div>
        </div>
    </div>
</section>