<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$studentID = $_POST["studentID"];
		$subjectID = $_POST["subjectID"];
		$grade = $_POST["grade"];
		$teacherID = $_POST["teacherID"];
		
		$queryCheck = "Select * from grade WHERE StudentID='$studentID' and SubjectID='$subjectID'";
		$check = $conn->query($queryCheck);
		if (mysqli_num_rows($check)>0) {
			header("Location: ../Management/gradeManagement.php?error=1");
		} else {
			$query = "insert into grade values(' ', '$studentID', '$subjectID', '$grade', '$teacherID')";
			$result = $conn->query($query);
		}
		
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/gradeManagement.php");
		} 
		
	}

?>