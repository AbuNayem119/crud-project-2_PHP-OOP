<?php

	session_start();

	use App\Controllers\Admin;
	include_once "vendor/autoload.php";
	$admin = new Admin;


	if (isset($_POST['submit'])) {
		
		$ema_usa = $_POST['ema_usa'];
		$pass = $_POST['pass'];

		if (empty($ema_usa)||empty($pass)) {
			$mess = "<p class='alert alert-danger'> Field Must not be Empty !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

		}else{

			$data = $admin -> admin_login($ema_usa, $pass);

			$select_data = $admin -> select_data($ema_usa);
			

			if ($data == true) {

				if (password_verify($pass, $select_data -> pass) == true) {

					$_SESSION['name'] = $select_data -> name;
					$_SESSION['email'] = $select_data -> email;
					$_SESSION['cell'] = $select_data -> cell;
					$_SESSION['image'] = $select_data -> image;

					header("location:dashboard.php");

				}else{
					$mess = "<p class='alert alert-danger'> Password is Incorrect !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

				}


			}else{
				$mess = "<p class='alert alert-danger'> Email is Incorrect !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

			}
			

		}












	}








?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->

	<div class="mt-2 w-50 mx-auto mess">
		<?php
			if (isset($mess)) {
			echo $mess;
			}
		?>
	</div>
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to your dashboard</p>
								
								<!-- Form -->
								<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
									<div class="form-group">
										<input name="ema_usa" class="form-control" type="text" placeholder="Email / User Name">
									</div>
									<div class="form-group">
										<input name="pass" class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<input name="submit" class="btn btn-primary btn-block" type="submit" value="Login">
									</div>
								</form>	

								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don't have an account?<a href="register.php">Register</a></div>


							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>