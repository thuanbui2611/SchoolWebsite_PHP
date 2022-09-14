<?php
	require_once '../Login/logindb.php';

	$id = $_GET['id'];		
	$query = "Select * from student where StudentID = '$id'";
	$data = mysqli_fetch_array($conn->query($query));
	$checkclassID = $data['ClassID'];
	if(isset($_POST['update'])) 
    {
		$name = $_POST['Full_name'];
		$birthday = $_POST['Date_of_birth'];
		$classID = $_POST['ClassID'];
		$schoolYear = $_POST['schoolYear'];
		$email = $_POST['Email'];
		$contactNumber = $_POST['ContactNumber'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
        
        $query = "Update student set Full_name='$name', Date_of_birth='$birthday', ClassID='$classID', schoolYear='$schoolYear', Email='$email', ContactNumber='$contactNumber', Username='$username', Password='$password'  where StudentID = '$id'";
        $result = $conn->query($query);

        if(!$result)
        {
        echo "Update Failed: $query<br/>" . $conn->error . "<br/>";
        } else 
        {
            header("Location: ../Management/studentManagement.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Edit Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../panel.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
	<style> 
		.size{
			width: 50%;
		}
		h2{
			text-align: center;
			margin-bottom: 30px;
			font-size: 50px;
			font-weight: bold;
		}
		label{
			font-weight: bold;
		}
		.submit{
			padding: 10px;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container size">
  <h2>Edit form</h2>
<form method="post">
  <div class="form-group">
    <label for="name">Full name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="Full_name" id="Full_name" value="<?php echo $data['Full_name']?>">
  </div>
  <div class="form-group">
    <label for="birthday">Date of birth</label>
    <input type="date" class="form-control" placeholder="" id="Date_of_birth" name="Date_of_birth" value="<?php echo $data['Date_of_birth']?>">
  </div>
<div class="form-group">
				<label> Class</label>
               <select class="form-control form-control-sm" id="ClassID" name="ClassID"> 
				   
					<?php 
				   		$getStudent = "select * from class";
				   		$result = $conn->query($getStudent);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
		   				
				   		 while($row = mysqli_fetch_array($result))
						 {
							
							  if($checkclassID == $row['ClassID'])
							  {
								  echo '<option selected value="'.$row['ClassID'].'">'.$row['ClassName'].'</option>';
                        		  continue;
							  }
							 echo '<option value=" '.$row['ClassID'].' "> '.$row['ClassName'].' </option>';
							 
						 }
				   ?>
				</select>
			  </div>
  <div class="form-group">
    <label for="schoolYear">School Year</label>
    <input type="text" class="form-control" placeholder="" id="schoolYear" name="schoolYear" value="<?php echo $data['SchoolYear']?>">
  </div>
	<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" placeholder="Enter email" id="Email" name="Email" value="<?php echo $data['Email']?>">
  </div>
  <div class="form-group">
    <label for="contactNumber">Contact Number:</label>
    <input type="text" class="form-control" placeholder="" id="ContactNumber" name="ContactNumber" value="<?php echo $data['ContactNumber']?>">
  </div>
	<div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" placeholder="Enter username" id="Username" name="Username" value="<?php echo $data['Username']?>">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" class="form-control" placeholder="Enter password" id="Password" name="Password" value="<?php echo $data['Password']?>">
  </div>
  <button type="submit" name="update" class="btn btn-primary submit">Update</button>
</form>
		</div>
</body>
</html>
