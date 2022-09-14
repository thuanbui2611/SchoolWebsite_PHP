<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{

		$name = $_POST["name"];
		$birthday = $_POST["birthday"];
		$classID = $_POST["classID"];
		$schoolYear = $_POST["schoolYear"];
		$email = $_POST["email"];
		$contactNumber = $_POST["contactNumber"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$query = "insert into student values(' ', '$name', '$birthday', '$classID', '$schoolYear', '$email', '$contactNumber', 
		'$username', '$password')";
		$result = $conn->query($query);
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/studentManagement.php");
		} 
		
	}

?>