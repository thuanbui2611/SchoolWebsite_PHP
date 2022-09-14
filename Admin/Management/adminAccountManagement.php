<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Account Management</title>
	<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
	<style> 
	h1{
	font-size: 40px;
	justify-content: center;
	margin-left: 500px;


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
	
	<h1 style="	font-weight: bold; 	margin-top: 10px;">Admin Account Management</h1>
	
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
    Add admin account
  </button>
	</div>
	
<!-- Table + Search-->
	<table class="table table-striped">
  <thead>
    <tr>
	  <th scope="col">ID</th>
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
		$addQuery = ' WHERE ID LIKE "%'.$searchValue.'%" ' ;	
	}
	$query = 'SELECT * FROM admin '.$addQuery.'';
	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error;
	}

	while($row = mysqli_fetch_array($result))
    { 
?>	
		
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['ID']?></th>
		<td><?php echo $row['Username']?></td>
		<td><?php echo $row['Password']?></td>
		<td><a href="../Function/editAdminAccount.php?id=<?php echo $row['ID']; ?>">Edit</a></td>
    	<td><a href="../Function/deleteAdminAccount.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
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
          <h4>Add Admin Account</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form method="post" action="../Function/addAdminAccount.php">
            <div class="form-group">
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