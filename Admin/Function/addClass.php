<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$className = $_POST["className"];

		
		$query = "insert into class values(' ', '$className')";
		$result = $conn->query($query);
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/classManagement.php");
		} 
		
	}

?>