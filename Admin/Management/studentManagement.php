<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Management</title>
	<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
	<style> 
	b{
	font-size: 40px;
	justify-content: center;
	margin-left: 560px;
}
	.search{
	justify-content: center;
	margin-top: 40px;
	margin-bottom: -30px;
}
	.search_bar{
	width: 30%;		
}
	.add{
	margin-bottom: 10px;
	margin-top: -10px;
}
	</style>
</head>

<body>
	<?php include 'panel.php' ?>
	
	<b>Student Management</b>
	
	<form action="" method="post"> 
	<div class="input-group search">
 		<div class="form-outline search_bar">
    	<input type="text" name="search" placeholder="Search name" class="form-control" />
    	
  		</div>
  		<button type="submit"  name="submit" class="btn btn-primary">
    	<i class="fas fa-search"></i>
  		</button>
	</div> 
	</form>
	
	<div class="container add" style="margin-top: 30px;">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#add">
    Add a student
  </button>
	</div>
	

	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Full name</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Class</th>
	  <th scope="col">School Year</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Username</th>
	  <th scope="col">Password</th>
    </tr>
  </thead>
	<?php
	require_once '../Login/logindb.php';
	$searchValue="";
	if (isset($_POST['submit'])) 
	{
    	$searchValue = $_POST['search'];
	}
	$addQuery='';
	if(!empty($searchValue))
	{
		$addQuery = ' and Full_name LIKE "%'.$searchValue.'%" ' ;	
	}
	$query = 'SELECT student.StudentID, student.Full_name, student.Date_of_birth, student.SchoolYear, student.Email, student.ContactNumber, student.Username, student.Password, class.ClassName FROM student, class WHERE student.ClassID = class.ClassID '.$addQuery.'';
	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error;
	}

	while($row = mysqli_fetch_array($result))
    { 
?>	
		
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['StudentID']?></th>
      <td><?php echo $row['Full_name']?></td>
      <td><?php echo $row['Date_of_birth']?></td>
      <td><?php echo $row['ClassName']?></td>
		<td><?php echo $row['SchoolYear']?></td>
		<td><?php echo $row['Email']?></td>
		<td><?php echo $row['ContactNumber']?></td>
		<td><?php echo $row['Username']?></td>
		<td><?php echo $row['Password']?></td>
		<td><a href="../Function/editStudent.php?id=<?php echo $row['StudentID']; ?>">Edit</a></td>
    	<td><a href="../Function/deleteStudent.php?id=<?php echo $row['StudentID']; ?>">Delete</a></td>
    </tr>
   
  </tbody>
		<?php
	}
	?>
</table>
	
	
	<!--Add Form pop-up -->
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Add Student</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="post" action="../Function/addStudent.php">
            <div class="form-group">
				<label> Full Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
            </div>
			<div class="form-group">
				<label> Date of birth</label>
              <input type="date" class="form-control" name="birthday"placeholder="y-m-d">
            </div>
			   <div class="form-group">
				<label> Class</label>
               <select class="form-control form-control-sm" id="classID" name="classID"> 
				   <option disabled selected> Choose a Class</option>
					<?php 
				   		$getStudent = "select * from class";
				   		$result = $conn->query($getStudent);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($result))
						 {
							 echo '<option value=" '.$row['ClassID'].' "> '.$row['ClassName'].' </option>';
							 
						 }
				   ?>
				</select>
			  </div>
			   <div class="form-group">
				<label> School Year</label>
              <input type="number" class="form-control" name="schoolYear" placeholder="school year">
            </div>
			   <div class="form-group">
				<label> Email</label>
              <input type="text" class="form-control" name="email" placeholder="email">
            </div>
			   <div class="form-group">
				<label> Contact Number</label>
              <input type="number" class="form-control" name="contactNumber" placeholder="phone number">
            </div>
			   <div class="form-group">
				<label> Username</label>
              <input type="text" class="form-control" name="username" placeholder="">
            </div>
			   <div class="form-group">
				<label> Password</label>
              <input type="text" class="form-control" name="password" placeholder="">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round" name="addSubmit" value="submit" >Add</button>
          </form>
          
          <div class="text-center text-muted delimiter"></div>
          
      </div>
    </div>
      
  </div>
</div>
</div>
	

</body>
</html>