<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login_Admin</title>
	<link rel="stylesheet" href="loginStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style> 
		.login4Student{
			margin-top: 200px;
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
	
		<h1> Login for Teacher</h1>
	<form method="post" id="loginForm" action="dataLogin_teacher.php">
			
			<label for="username"> Username: </label><br>
			<input type="text" id="username" name="username" placeholder="6-20 letters" required><br>
		
			<label for="password"> Password: </label><br>
			<input type="password" id="password" name="password" placeholder="6-50 letters" required><br>	
			<a href="loginAdmin.php">Are you an Admin?</a>
			
			<div>
				<input class = "submit" type = "submit" name="loginSubmit" value="Submit"/>
			</div>
			<div class="login4Student"><a href="../../Web/Login/loginForm.php">Back to Login for student</a></div
			
		</form>
	
								
</body>
</html>