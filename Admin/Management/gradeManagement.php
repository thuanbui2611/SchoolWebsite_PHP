<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Grade Management</title>
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
	<?php 
	if(isset($_GET['error'])==true){ ?>
		<div class="alert alert-danger">
      <strong class="alert-link">Error!</strong> <br/> Cannot add grade. The subject of student was existed.
    	</div>
	<?php } 
	?>
	<b>Grade Management</b>
	
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
    Add grade
  </button>
	</div>
	
<!-- Table + Search-->
	<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">Grade ID</th>
      <th scope="col">Student ID</th>
	  <th scope="col">Student </th>
      <th scope="col">Subject </th>
      <th scope="col">Grade</th>
      <th scope="col">Teacher </th>
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
		$addQuery = ' and StudentID LIKE "%'.$searchValue.'%" ' ;	
	}
	$query = 'SELECT grade.GradeID, grade.StudentID, student.Full_name, grade.Grade, subject.SubjectName, teacher.TeacherName FROM grade, student, subject, teacher WHERE grade.StudentID = student.StudentID and grade.SubjectID = subject.SubjectID and grade.TeacherID = teacher.TeacherID '.$addQuery.'';
	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error;
	}

	while($row = mysqli_fetch_array($result))
    { 
?>	
		
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['GradeID']?></th>
		<td><?php echo $row['StudentID']?></td>
		<td><?php echo $row['Full_name']?></td>
		<td><?php echo $row['SubjectName']?></td>
		<td><?php echo $row['Grade']?></td>
		<td><?php echo $row['TeacherName']?></td>
		<td><a href="../Function/editGrade.php?id=<?php echo $row['GradeID']; ?>">Edit</a></td>
    	<td><a href="../Function/deleteGrade.php?id=<?php echo $row['GradeID']; ?>">Delete</a></td>
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
          <h4>Add Grade</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="post" action="../Function/addGrade.php">
            <div class="form-group">
				<label> Student</label>
               <select class="form-control form-control-sm" id="studentID" name="studentID"> 
				   <option disabled selected> Choose a Student</option>
					<?php 
				   		$getStudent = "select student.StudentID, student.Full_name from student";
				   		$result = $conn->query($getStudent);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($result))
						 {
							 echo '<option value=" '.$row['StudentID'].' "> '.$row['Full_name'].' </option>';
							 
						 }
				   ?>
				</select>
            </div>
            <div class="form-group">
				<label> Subject</label>
               <select class="form-control form-control-sm" id="subjectID" name="subjectID"> 
				   <option disabled selected> Choose a Subject</option>
					<?php 
				   		$getStudent = "select * from subject";
				   		$result = $conn->query($getStudent);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($result))
						 {
							 echo '<option value=" '.$row['SubjectID'].' "> '.$row['SubjectName'].' </option>';
							 
						 }
				   ?>
				</select>
			  </div>
			  
			   <div class="form-group">
				<label> Grade</label>
              <input type="text" class="form-control" name="grade" placeholder="grade">
            </div>
			   <div class="form-group">
					<label> Teacher</label>
               <select class="form-control form-control-sm" id="teacherID" name="teacherID"> 
				   <option disabled selected> Choose a Teacher</option>
					<?php 
				   		$getTeacher = "select * from teacher";
				   		$result = $conn->query($getTeacher);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($result))
						 {
							 echo '<option value=" '.$row['TeacherID'].' "> '.$row['TeacherName'].' </option>';
							 
						 }
				   ?>
				   </select>
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