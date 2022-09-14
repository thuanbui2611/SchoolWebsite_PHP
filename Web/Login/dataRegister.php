<?php
	require_once './logindb.php';
	

	$studentID = $_POST['studentID'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Restrist hack by SQL injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	
	

	$checkID = "select StudentID from student WHERE StudentID ='$studentID' and Email='$email'";
	$Username = "SELECT * FROM student WHERE Username='$username' limit 1";
	$checkUsername = $conn->query($Username); //
	$check = $conn->query($checkID);
	if(!$check){
		echo "Error select: " . $conn->error . "<br/>";
	}
	if(mysqli_num_rows($checkUsername)>0)
	{
		echo '<script>alert("Username existed. Please choose another username!")</script>';
		header("Location: registerForm.php?username=1");
		die;
	} 
	if(mysqli_num_rows($check)==0)
	{
		header("Location: registerForm.php?error=1");
		
	}
		else{
		header("Location: registerForm.php?success=1");
		$query="update student set username='$username', password='$password' where StudentID ='$studentID'";

		$result = $conn->query($query);
    	if (!$result)
    	{
        echo "Insert failed: $query<br/>" . $conn->error . "<br/><br/>";
    	} else 
			{
				//header("Location:loginForm.php");
			}
	}
	
?>