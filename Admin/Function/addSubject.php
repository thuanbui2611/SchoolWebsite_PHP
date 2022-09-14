<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$subjectName = $_POST["subjectName"];
		
		$query = "insert into subject values(' ', '$subjectName')";
		$result = $conn->query($query);
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/subjectManagement.php");
		} 
		
	}

?>