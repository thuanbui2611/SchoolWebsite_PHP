<?php
	require_once '../Login/logindb.php';
	if (isset($_POST["addSubmit"])) 
	{
		$image = $_FILES['image']['name'];
		$target = "Upload/".basename($image);
		$title = $_POST["title"];
		$description = $_POST["description"];
		$status= $_POST["status"];
		$createDate = $_POST["createDate"];
		$query = "insert into news values(' ', '$title', '$description', '$image', '$status','$createDate')";
		$result = $conn->query($query);
		
		  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
		
		if(!$result){
			echo "Error add: " . $conn->error . "<br/>";
		} else { 
			
			header("Location: ../Management/newsManagement.php");
		} 
		
	}

?>