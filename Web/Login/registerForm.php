<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register_Form</title>
	<link rel="stylesheet" href="registerFormStyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
		<?php 
	if(isset($_GET['error'])==true){ ?>
		<div class="alert alert-danger">
      <strong class="alert-link">Error!</strong> <br/> Can not find StudentID or Email.
    	</div>
	<?php }
	if(isset($_GET['success'])==true){?>
		<div class="alert alert-success">
  			<strong>Success!</strong> You have created an account.
		</div>
	<?php }
	if(isset($_GET['username'])==true){ ?>
		<div class="alert alert-danger">
      <strong class="alert-link">Error!</strong> <br/> Username has existed. Please choose another username
    	</div>
	<?php }
	?>
	<h1> REGISTER </h1>
		<form method="post" id="registerForm"  action="dataRegister.php">
			
			<label for="studentID"> Student ID: </label><br>
			<input type="number" id="studentID" name="studentID" placeholder="ID number" required><br>
			<label for="studentID"> Email: </label><br>
			<input type="text" id="email" name="email" placeholder="email provided from school" required><br>
			<label for="username"> Username: </label><br>
			<input type="text" id="username" name="username" placeholder="6-20 letters" required><br>
			<label for="password"> Password: </label><br>
			<input type="password" id="password" name="password" placeholder="6-50 letters" required><br>	
			<div> <a href="loginForm.php">Already have an account?</a> </div>			
			<div>
				<input class = "submit" type = "submit" name="registerSubmit" value="Submit"/>
				<a href="../Website.php">Back to homepage</a>
			</div>
			
		</form>

	
</body>
</html>
