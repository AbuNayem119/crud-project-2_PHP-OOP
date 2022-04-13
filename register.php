<?php

	use App\Controllers\Admin;
	include_once "vendor/autoload.php";
	$admin = new Admin;

?>
<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		

    </head>
    <body>
	

	<?php
	
	
		if (isset($_POST['submit'])) {
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$cell = $_POST['cell'];
			$pass = $_POST['pass'];
			$hash_pass = password_hash($pass, PASSWORD_DEFAULT);

			//File Management........
			$image = $_FILES['image']['name'];
			$expo = explode(".",$image);
			$end = end($expo);
			$img_f_name = md5(time().rand()).".". strtolower($end);
			$image_tmp_name = $_FILES['image']['tmp_name'];


			if (empty($name)||empty($email)||empty($cell)||empty($pass)||empty($image)) {
				$mess = "<p class='alert alert-danger'> Field Must not be Empty !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

			}else{

				$data = $admin -> admin_registration($name,$email,$cell,$hash_pass,$img_f_name);
				move_uploaded_file($image_tmp_name, "img/admin/".$img_f_name);

				if ($data == false) {
					$mess = "<p class='alert alert-danger'> Data not sent !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

				}else{
					$mess = "<p class='alert alert-success'> Data sent Successful !<button style='float:right;' class='close' data-dismiss='alert' >&times;</button></p>";

				}

			}













		}
	
	
	?>


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
						<h1>Register</h1>
						<p class="account-subtitle">Access to our dashboard</p>
						
						<!-- Form -->
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input name="name" class="form-control" type="text" placeholder="Name">
							</div>
							<div class="form-group">
								<input name="email" class="form-control" type="text" placeholder="Email">
							</div>
							<div class="form-group">
								<input name="cell" class="form-control" type="text" placeholder="Cell">
							</div>
							<div class="form-group">
								<input name="pass" class="form-control" type="text" placeholder="Password">
							</div>
							<div class="form-group">
								<input name="image" class="form-control" type="file" >
							</div>
							<div class="form-group mb-0">
								<input name="submit" class="btn btn-primary btn-block" type="submit" value="Register">
							</div>
						</form>
						<!-- /Form -->
						
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						
						<!-- Social Login -->
						
						<!-- /Social Login -->
						
						<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
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