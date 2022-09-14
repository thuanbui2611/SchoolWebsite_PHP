<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$query = "insert into admin values(' ','$username', '$password', '1')";
		$Username = "SELECT * FROM admin WHERE username='$username' limit 1";
		$checkUsername = $conn->query($Username); //
		$result = $conn->query($query);
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} 	
		if(mysqli_num_rows($checkUsername)>0)
		{
		echo '<script>alert("Username existed. Please choose another username!")</script>';
		}
		
		else { 
			$_SESSION["permission"] = 1;
			header("Location: ../Management/adminAccountManagement.php");
		} 
		
	}

?>