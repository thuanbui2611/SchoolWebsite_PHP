<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login_Form</title>
	<link rel="stylesheet" href="loginFormStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style> 
	.loginAdmin{
	margin-top: 200px;
	margin-right: 300px;
	font-size: 16px;
}
		.loginTeacher{
			margin-top: 10px;
			margin-right: 300px;
			font-size: 16px;
		}
	</style>
	
</head>

<body>
		<?php 
	if(isset($_GET['error'])==true){ ?>
		<div class="alert alert-danger">
      <strong class="alert-link">Error!</strong> <br/> Username or password is incorrect.
    	</div>
	<?php }
	?>
		<h1> LOGIN</h1>
	<form method="post" id="loginForm"  action="dataLogin.php">
			
			<label for="username"> Username: </label><br>
			<input type="text" id="username" name="username" placeholder="6-20 letters" required><br>
			<label for="password"> Password: </label><br>
			<input type="password" id="password" name="password" placeholder="6-50 letters" required><br>	
				
			<div> <a href="registerForm.php">Don't have an account yet?</a> </div>
			<div>
				<input class = "submit" type = "submit" name="loginSubmit" value="Submit"/>
			</div>
			<a href="../Website.php">Back to homepage</a>
			
		</form>
	<div class="loginAdmin" ><a href="../../Admin/Login/loginAdmin.php">You are an admin?</a></div>
	<div class="loginTeacher" ><a href="../../Admin/Login/loginTeacher.php">You are a teacher?</a></div>
	
								
</body>
</html>