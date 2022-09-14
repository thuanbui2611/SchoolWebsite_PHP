<?php 
	require_once './logindb.php';

	if(isset($_POST["student_id"]))  
 {  
      $query = "SELECT * FROM student WHERE StudentID = '".$_POST["student_id"]."'";  
 
	  	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error . "<br/>";
	}
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }
?>