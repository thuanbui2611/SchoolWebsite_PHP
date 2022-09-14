<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$teacherID = $_POST["teacherID"];
		$teacherName = $_POST["teacherName"];
		$contactNumber = $_POST["contactNumber"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$query = "insert into teacher values('$teacherID', '$teacherName', '$contactNumber', '$username', '$password', '0')";
		$result = $conn->query($query);
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/teacherManagement.php");
		} 
		
	}

?>