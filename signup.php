<?php
require_once  "vendor/autoload.php";
use App\Classes\Database;

//include 'header.php';

?>
	<!-- Slider Section Start Here -->
<!-- Jumbotron -->

<?php 
	$msg = "";
	if(isset($_POST['btn'])){
		$user = new Database();
		$msg = $user->saveUserData($_POST);
	}
?>

<!DOCTYPE html>
<html>
<?php require 'inc/header.php'; ?>


    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card mb-4">
                    <div class="card-title">
                        <h3 class="text-center">Sign Up</h3>
                        <h4 style="text-align: center; color: green;"><?php  echo $msg; ?><h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3" for="name">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3" for="email">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3" for="phone">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone" id="phone">
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
                                    <button type="submit" class="btn btn-success btn-block" name="btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<form action="" method="post" class="col-md-6 mt-3">
				
				<table>
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" value=""></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" value=""></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" value=""></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" value=""></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="password" value=""></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="btn" value="Submit"></td>
					</tr>
				</table>
			</form>	
		</div>

		</div>-->

	<!-- Form -->
	<div class="container">
	
</div>
  
</body>

<?php include 'inc/footer.php'; ?>

</html>