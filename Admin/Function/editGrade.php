<?php
	require_once '../Login/logindb.php';

	$id = $_GET['id'];		
	$query = "Select * from grade where GradeID = '$id'";
	$data = mysqli_fetch_array($conn->query($query));
	$studentID = $data['StudentID'];
	$getSubjectID = $data['SubjectID'];
	$getTeacherID = $data['TeacherID'];
	if(isset($_POST['update'])) 
    {
		
		$subjectID = $_POST['subjectID'];
		$grade = $_POST['grade'];
		$teacherID = $_POST['teacherID'];
		
		$queryCheck = "Select * from grade WHERE StudentID='$studentID' and SubjectID='$subjectID'";
		$check = $conn->query($queryCheck);
		if (mysqli_num_rows($check)>0) {
			header("Location: ../Management/gradeManagement.php?error=1");
		} else {
        $query = "UPDATE grade SET SubjectID='$subjectID', Grade='$grade', TeacherID='$teacherID' WHERE GradeID = '$id'";
        $result = $conn->query($query);
		};

        if(!$result)
        {
        echo "Update Failed: $query<br/>" . $conn->error . "<br/>";
        } else 
        {
            header("Location: ../Management/gradeManagement.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Edit Grade</title>
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
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Student</label>
    <input type="text" class="form-control" name="studentID" id="studentID" value=" 
			
					<?php 													  
				   		$getStudent = "select * from student WHERE StudentID ='$studentID'";
				   		$result = $conn->query($getStudent);
				   		if(!$result){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($result))
						 {
								echo $row['Full_name']; 
						 }
				   ?> " disabled>
				   </select>
  </div>
		
		<div class="form-group">
    <label for="subjectID">Subject</label>
    <select class="form-control form-control-sm" id="subjectID" name="subjectID"> 
				   <option disabled selected> Choose a Subject</option>
					<?php 
				   		$getSubject = "select * from subject";
				   		$resultSubject = $conn->query($getSubject);
				   		if(!$resultSubject){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($resultSubject))
						 {
							 if($getSubjectID == $row['SubjectID'])
							 {
								 echo '<option selected value="'.$row['SubjectID'].'">'.$row['SubjectName'].'</option>';
								 continue;
							 }
							 echo '<option value=" '.$row['SubjectID'].' "> '.$row['SubjectName'].' </option>';
						 }
				   ?>
				</select>
  </div>
		
  <div class="form-group">
    <label for="title">Grade</label>
    <input type="text" class="form-control" placeholder="Enter grade" name="grade" id="grade" value="<?php echo $data['Grade']?>">
  </div>
		
	<div class="form-group">
    <label for="teacherID">Teacher</label>
    <select class="form-control form-control-sm" id="teacherID" name="teacherID"> 
				   <option disabled selected> Choose a Teacher</option>
					<?php 
				   		$getTeacher = "select * from teacher";
				   		$resultTeacher = $conn->query($getTeacher);
				   		if(!$resultTeacher){
							echo "Error select: " . $conn->error . "<br/>";
						}
				   		 while($row = mysqli_fetch_array($resultTeacher))
						 {
							 if($getTeacherID == $row['TeacherID'])
							 {
								 echo '<option selected value="'.$row['TeacherID'].'">'.$row['TeacherName'].'</option>';
								 continue;
							 }
							 echo '<option value=" '.$row['TeacherID'].' "> '.$row['TeacherName'].' </option>';
						 }
				   ?>
				</select>
  </div>	  

  <button type="submit" name="update" class="btn btn-primary submit">Update</button>
</form>
		</div>
</body>
</html>
