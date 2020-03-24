<?php

//error_reporting(1);
session_start();
if(isset($_SESSION['id'])){
    header('Location:advertise.php');
}

require_once  "vendor/autoload.php";

use App\Classes\Database;


?>

<?php
$msg= "";
if(isset($_POST['btn'])){
    $user = new Database();
    $msg = $user->adminLogin($_POST);
}
?>

<!-- Form -->
<!DOCTYPE html>
<html>
<?php require 'inc/header.php'; ?>

<div class="container" style="margin-top: 150px ">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card mb-5">
                <div class="card-title">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                <?php echo $msg; ?>
                    <form method="post" action="">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="email">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="password">Password</label>
                            <div class="col-md-9">
                                <input type="Password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary btn-block" name="btn">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include 'inc/footer.php'; ?>

</html>