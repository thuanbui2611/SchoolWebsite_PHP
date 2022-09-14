<?php
	session_start();
	require_once './logindb.php';
	
	//Check button submit
	if (isset($_POST["loginSubmit"])) 
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		// Restrist hack by SQL injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		
		$sql="Select * from student where username='$username' and password='$password'";
		$query = $conn->query($sql);
		if(!$query){
			echo "Error select: " . $conn->error . "<br/>";
		}
		if (mysqli_num_rows($query)==0) {
			header("Location: loginForm.php?error=1");
		} else{
			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["userID"] = $data["ID"];
				$_SESSION["username"] = $data["Username"];
				$_SESSION["permision"] = $data["permission"];
	    	}
		header('Location: ../Website.php'); 
		}
	}
?>