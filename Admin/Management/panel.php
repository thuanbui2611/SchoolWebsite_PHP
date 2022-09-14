<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="panel.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
</head>
<body>

<?php 
	session_start();
	include "../Function/permission.php";
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Panel Greenwich University</a>
 
	
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="studentManagement.php">Student Management</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="teacherManagement.php">Teacher Management</a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="gradeManagement.php">Grade Management</a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="subjectManagement.php">Subject Management</a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="classManagement.php">Class Management</a>
    </li>
	  <?php 
	  	if($_SESSION['permission'] == 1)
		{?>

	  <li class="nav-item">
      <a class="nav-link" href="newsManagement.php">News Management</a>
    </li>
	  <li class="nav-item">
      <a class="nav-link" href="adminAccountManagement.php">Admin Account</a>
    </li>
  			
	<?php }
	  ?>
	</ul>
	<ul class="navbar-nav ml-auto">
		 		  <li class="nav-item">
			  <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#"> Hi, <?php echo $_SESSION["username"]; ?></a>
			  <div class="dropdown-menu"  style="margin-left: 1375px">
				    <a class="dropdown-item"  href="../../Web/Website.php">Go to Website</a>
                    <a class="dropdown-item" href="../Function/logout.php">Log out</a>
                </div>
		  </li>
				
	  </ul>
	  
</nav>


	
	  
</body>
</html>
 