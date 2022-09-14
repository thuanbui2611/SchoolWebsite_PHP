<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Greenwich University</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body>
<?php
session_start();
require_once 'Login/logindb.php';
	$top3News = 'SELECT * FROM news WHERE Status="Active" ORDER BY NewsID DESC LIMIT 0, 3';
    $top3 = $conn->query($top3News);
    if(!$top3) {
        echo "Error select: " . $conn->error . "<br/>";
    };

?>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
       
	      	<img src="image/logo.png" width="300" height="123" alt=""/> </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Greenwich University</a>
          </div>
			
          <div class="col-4 d-flex justify-content-end align-items-center">
			  <ul class="navbar-nav ml-auto">
		  <?php
		  	if(isset($_SESSION["username"])) {
		  echo '
		  <li class="nav-item">
			  <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#"> Hi, '; echo $_SESSION["username"];'</a>';
		  echo '<div class="dropdown-menu" ">';
		  			if (isset($_SESSION["permission"]) == true)
					{
						echo '<a class="dropdown-item" href="../Admin/Management/panel.php">Go to Panel Admin</a>';
					}
				    echo '
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div> </li>';
		 
			} else echo '<a class="btn btn-sm btn-outline-secondary" href="Login/loginForm.php">Sign In</a>'						
		  ?>	  
	  </ul>
			  
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2" style="font-weight: bold;">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="Website.php">Home</a>
          <a class="p-2 text-muted" href="Website.php#about">About</a>
          <a class="p-2 text-muted" href="news.php">News</a>
			
			<?php
				if(isset($_SESSION["username"])){
					if(isset($_SESSION["permission"])==false)
					{
						echo '<a class="p-2 text-muted" href="" data-toggle="modal" data-target="#markModal">Mark Report</a>';
					}
				}
			?>
          <a class="p-2 text-muted" href="" data-toggle="modal" data-target="#contactModal">Contact us</a>
        </nav>
		  
      </div>
		<!-- The Modal Contact us -->
  <div class="modal" id="contactModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Contact us</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="content">
		<p style="font-weight: bold; font-size: 18px;">Contact number: </p> 
		<p style="font-size: 17px; text-align: center;">0933.108.554 | 0971.294.545</p>
		<p style="font-weight: bold; font-size: 18px;">You can find us on:</p>
		<p font-size: 17px; text-align: center;> Cộng Hòa Garden, số 20 đường Cộng Hòa, phường 12, quận Tân Bình, TP.HCM</p>
		<div class="map-container"> <img src="image/map.PNG" alt=""/></div>
		<div style="text-align: center; ">
			<p> Social media:</p>
			  <span class="material-icons">
				<a href="https://www.facebook.com/GreenwichVietnam">facebook</a>
			</span>
		</div>  
    </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
		
		<!-- The Modal Mark Report -->
  <div class="modal" id="markModal" style="text-align: center;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin-left: 162px;" >Mark Report</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="content">
		<p style="font-weight: bold; font-size: 18px;">Student information: </p>
			  
			  <?php 
			  	require_once 'Login/logindb.php';
			  
			  	$username = $_SESSION["username"];
			  	$query="SELECT student.StudentID, student.Full_name, student.Date_of_birth, student.SchoolYear, student.Email, student.ContactNumber, class.ClassName FROM student, class WHERE username='$username' and student.ClassID = class.ClassID"; 
				$result = $conn->query($query);
				if(!$result){
					echo "Error select: " . $conn->error;
							}

				while($row = mysqli_fetch_array($result))
    			{ 
			  
			  ?>
		<p style="font-size: 17px; text-align: left;">StudentID: <?php echo $row['StudentID'];?></p>
		<p style="font-size: 17px; text-align: left;">Full name: <?php echo $row['Full_name'];?></p>
		<p style="font-size: 17px; text-align: left;">Birthday: <?php echo $row['Date_of_birth'];?></p>
		<p style="font-size: 17px; text-align: left;">ClassID: <?php echo $row['ClassName'];?></p>
		<p style="font-size: 17px; text-align: left;">School Year: <?php echo $row['SchoolYear'];?></p>
		<p style="font-size: 17px; text-align: left;">Email: <?php echo $row['Email'];?></p>
		<p style="font-size: 17px; text-align: left;">Contact Number: <?php echo $row['ContactNumber'];?></p>
			  <?php $studentID = $row['StudentID'];}?>
		<p style="font-weight: bold; font-size: 18px;">Your Grade:</p>
			  <?php 
			  	
			  	$queryGrade="SELECT grade.Grade, subject.SubjectName, teacher.TeacherName FROM grade, subject, teacher WHERE grade.StudentID='$studentID' and grade.SubjectID =subject.SubjectID and grade.TeacherID = teacher.TeacherID";
			  	$resultGrade = $conn->query($queryGrade);
					if(!$resultGrade){
					echo "Error select: " . $conn->error;
					}

				while($data = mysqli_fetch_array($resultGrade))
    			{ 
			  
			  ?>
		<?php echo '<p style= "font-size: 17px; text-align: left;"> Subject: '; echo $data['SubjectName']; '</p>';
			  echo '<p style= "font-size: 17px; text-align: left;"> Grade: '; echo $data['Grade']; '</p>';
			  echo '<p style= "font-size: 17px; text-align: left;"> Teacher: '; echo $data['TeacherName']; '</p>';
			  echo ' <br/> --';
				} ?>
		
			  
    </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
		<hr>
		<main role="main" class="container">
      <div class="row">
        <div class="">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Top 3 News
          </h3>
			 <div class="row" style="margin-top: 30px; margin-bottom:30px">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <a href=" "></a>
<?php
  if ($news = mysqli_fetch_assoc($top3)) {
    $firstRow = $news;
    echo '<div class="carousel-item active">
            <a href="news.php?id='.$firstRow['NewsID'].'"><img class="d-block w-100" style="width: 300px; height:400px; object-fit:cover;" src="../Admin/Function/Upload/'.$firstRow['image'].'"></a>
            <div class="carousel-caption d-none d-md-block" style="background: rgba(255,255,255,0.7);">
                <a style="color: black;" href="news.php?id='.$firstRow['NewsID'].'"><h5>'.$firstRow['Title'].'</h5></a>
                <a style="color: black;" href="news.php?id='.$firstRow['NewsID'].'"><p></p></a>
            </div>
        </div>';
 
    while ($news = mysqli_fetch_assoc($top3)) {
        echo '<div class="carousel-item ">
        <a href="news.php?id='.$news['NewsID'].'"><img class="d-block w-100" style="width: 300px; height:400px; object-fit:cover;" src="../Admin/Function/Upload/'.$news['image'].'"></a>
                <div class="carousel-caption d-none d-md-block" style="background: rgba(255,255,255,0.7);">
                    <a style="color: black;" href="news.php?id='.$news['NewsID'].'"><h5>'.$news['Title'].'</h5></a>
                    <a style="color: black;" href="news.php?id='.$news['NewsID'].'"><p></p></a>
                </div>
            </div>';
    }
 }
?>                            
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
              </div>
          </div>
			<hr>
          <div class="blog-post">
            <h2 class="blog-post-title" id="">All News</h2>
             <hr>
			  <div class="row mb-2">
			 <?php 
			  	$QueryallNews = 'SELECT NewsID, Description, image, Status, SUBSTRING(Title, 1, 70) as ShortTitle FROM news WHERE Status="Active"';
				$allNews = $conn->query($QueryallNews);
				if(!$allNews) {
					echo "Error select: " . $conn->error . "<br/>";
    			};
			  	while($dataNews = mysqli_fetch_array($allNews)){
			  	echo '<div class="col-md-6">
          			<div class="card flex-md-row mb-4 box-shadow h-md-250">
            			<div class="card-body d-flex flex-column align-items-start">
          	    			<strong class="d-inline-block mb-2 text-primary">News</strong>
             				 <h3 class="mb-0">
               				 <a class="text-dark" href="news.php?id='.$dataNews['NewsID'].'">'.$dataNews['ShortTitle'].'...</a>
             				 </h3>         				
           				 </div>
           			 <img class="card-img-right flex-auto d-none d-md-block"  src="../Admin/Function/Upload/'.$dataNews['image'].'" width="300" height="50" alt="Card image cap">
          			</div>
        		</div> ';
       			 
       			};
			?>
      </div>
			  
			  
			 
			<hr>
			
			<?php 
			  if(isset($_GET['id'])==true){
					$IDNewsItem = $_GET['id'];
	
					$query = "SELECT * FROM news WHERE Status='Active' and NewsID='$IDNewsItem'";
					$newsItem = $conn->query($query);
					if(!$newsItem) {
						echo "Error select: " . $conn->error . "<br/>";
    				}
				 while ($aNews = mysqli_fetch_assoc($newsItem)) { 
				echo '
				<h2 class="blog-post-title" style="color: blue;" id="'.$IDNewsItem.'">'.$aNews['Title'].'</h2>
				<div class="row" style="margin-top: 20px;">
  			<div class="col-sm-4" id="'.$IDNewsItem.'">
				
				<p>'.$aNews['Description'].'</p>
			</div>
				
  			<div class="col-sm-8" id="'.$IDNewsItem.' style="text-align: right;" >
				<img src="../Admin/Function/Upload/'.$aNews['image'].'" width="613" height="595" alt="" />
				</div> </div> 
				' ;
				echo '<hr> <br>';
				}; };
				?>			
        </div><!-- /.blog-main -->
      </div><!-- /.row -->
    </main><!-- /.container -->

    <footer class="blog-footer">
      <p>Design by Thuan</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

		    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	  
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>