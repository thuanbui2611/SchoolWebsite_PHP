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
          <a class="p-2 text-muted" href="#">Home</a>
          <a class="p-2 text-muted" href="#about">About</a>
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
          <h4 class="modal-title" style="margin-left: 174px;">Contact us</h4>
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
			  	require_once '../Admin/Login/logindb.php';
			  
			  	$username = $_SESSION["username"];
			  	$query="SELECT student.StudentID, student.Full_name, student.Date_of_birth, student.SchoolYear, student.Email, student.ContactNumber, class.ClassName FROM student, class WHERE username='$username' and student.ClassID = class.ClassID"; 
				$result = $conn->query($query);
				if(!$result){
					echo "Error select: " . $conn->error;
							}

				while($row = mysqli_fetch_array($result))
    			{ 
			  
			  ?>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">StudentID: <?php echo $row['StudentID'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">Full name: <?php echo $row['Full_name'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">Birthday: <?php echo $row['Date_of_birth'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">ClassID: <?php echo $row['ClassName'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">School Year: <?php echo $row['SchoolYear'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">Email: <?php echo $row['Email'];?></p>
		<p style="font-size: 17px; text-align: left; margin-left: 80px;">Contact Number: <?php echo $row['ContactNumber'];?></p>
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
		<?php echo '<p style= "font-size: 17px; text-align: left; margin-left: 80px;"> Subject: '; echo $data['SubjectName']; '</p>';
			  echo '<p style= "font-size: 17px; text-align: left; margin-left: 80px;"> Grade: '; echo $data['Grade']; '</p>';
			  echo '<p style= "font-size: 17px; text-align: left; margin-left: 80px;"> Teacher: '; echo $data['TeacherName']; '</p>';
			  echo ' <br/> <br/>';
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
      <div class="jumbotron p-3 p-md-5 text-white rounded bg-info">
        <div class="">
          <h1 class="display-4 font-italic" style="text-align: center;">Welcome to Greenwich University</h1>
          <p class="lead my-3">Students studying at the University of Greenwich are studying in a study abroad-like environment with an international curriculum, faculty and students from many countries around the world.</p>
			<div style="margin-top: 20px;">
           <p style="font-size: 20px; color: #F0F794; text-align: left;"> <span class="material-icons" style="color: yellow;">
				emoji_events 
			</span> The University of Greenwich (UK) is in the top 7% of 20,000 higher education institutions globally </p>
		  <p style="font-size: 20px; color: #F0F794; text-align: left;"> <span class="material-icons" style="color: yellow;">
				emoji_events 
			</span> Silver Rating of the Teaching Excellence Framework (TEF)</p>
		  <p style="font-size: 20px; color: #F0F794; text-align: left;"> <span class="material-icons" style="color: yellow;">
				emoji_events 
			</span> Top 100 UK Universities by The Complete University Guide & The Guardian</p>
			</div>
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Introduce</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Introduce</a>
              </h3>
              <p class="card-text mb-auto">With more than 130 years of training experience and excellent teaching staff, today, the school has more than 38,000 international students around the world.</p>

            </div>
            <img class="card-img-right flex-auto d-none d-md-block"  src="image/student.jpg" width="300" height="50" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">News</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="news.php">New facility</a>
              </h3>
              <div class="mb-1 text-muted">Jul 2</div>
              <p class="card-text mb-auto">Cong Hoa new facility with an area of more than 6000m2 was put into operation.</p>
              <a href="news.php">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="image/newSchool.jpg" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            From Greenwich University
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title" id="about">About</h2>
            
			<div class="main"> 
		  	  <p>In Vietnam, the University of Greenwich was formed on the basis of the link between the University of Greenwich (United Kingdom) and FPT University since 2009 with more than 14,000 students from 12 countries around the world studying.</p>
           	  <p>The training content, lecturers and facilities are appraised and recognized for quality by experts from the University of Greenwich (United Kingdom).</p>
			  </div>
            
		    <img src="image/school.jpg" width="1172" height="736" alt
				 <p> </p>
			
			<h2 class="blog-post-title" style="margin-top: 50px;">Certificate Of Recognition</h2>
			<div class="row" style="margin-top: 20px;">
  			<div class="col-sm-4">
				<p>Study in Vietnam - Get a University Degree from the UK. UK education is famous around the world for its rigorous standards to ensure professionalism and practicality, meeting the evolving needs of the job.</p>
				<p>Studying at the University of Greenwich, students have access to the quintessence of a British education at only 1/10th the cost of studying abroad in the UK.</p>
				<p>Graduates will receive a Bachelor's degree (University Degree) from the University of Greenwich (United Kingdom), which is globally valid. With this degree, students can continue their studies to Master's and Doctoral degrees in many countries around the world.</p>
				<p>After graduation, students are welcome to work at FPT Corporation (with 8 member companies and more than 30,000 employees), and hundreds of large enterprises and partner corporations in Vietnam as well as around the world. gender.</p>
			</div>
				
  			<div class="col-sm-8" style="text-align: right;">
				<img src="image/certify.jpg" width="613" height="595" alt="" />
				</div>
			</div>
            
	        <img src="image/about.PNG" width="1172" height="332" alt=""/>         
			
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
