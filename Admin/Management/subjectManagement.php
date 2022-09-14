<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Subject Management</title>
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
	
	<b>Subject Management</b>
	
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
    Add Subject
  </button>
	</div>
	
<!-- Table + Search-->
	<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">SubjectID</th>
      <th scope="col">SubjectName</th>

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
		$addQuery = ' WHERE SubjectName LIKE "%'.$searchValue.'%" ' ;	
	}
	$query = 'SELECT * FROM subject '.$addQuery.'';
	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error;
	}

	while($row = mysqli_fetch_array($result))
    { 
?>	
		
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['SubjectID']?></th>
		<td><?php echo $row['SubjectName']?></td>
		<td><a href="../Function/editSubject.php?id=<?php echo $row['SubjectID']; ?>">Edit</a></td>
    	<td><a href="../Function/deleteSubject.php?id=<?php echo $row['SubjectID']; ?>">Delete</a></td>
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
          <h4>Add Subject</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="post" action="../Function/addSubject.php">
            <div class="form-group">
				<label> Subject Name</label>
              <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Subject Name">
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