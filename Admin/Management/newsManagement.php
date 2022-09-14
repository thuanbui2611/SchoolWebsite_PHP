<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>News Management</title>
	<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<!-- Bootstrap JS -->
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
	
	 <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
	
	<b>News Management</b>
	
	<form action="" method="post"> 
	<div class="input-group search">
 		<div class="form-outline search_bar">
    	<input type="text" name="search" placeholder="Search title" class="form-control" />
    	
  		</div>
  		<button type="submit"  name="submit" class="btn btn-primary">
    	<i class="fas fa-search"></i>
  		</button>
	</div> 
	</form>
	
	<div class="container add" style="margin-top: 30px;">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#add">
    Add a news
  </button>
	</div>
	
<!-- Table + Search-->
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">NewsID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">image</th>
	  <th scope="col">CreateDate</th>
	  <th scope="col">Status</th>
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
		$addQuery = ' WHERE Title LIKE "%'.$searchValue.'%" ' ;	
	}
	$query = 'SELECT * FROM news '.$addQuery.'';
	$result = $conn->query($query);
	if(!$result){
		echo "Error select: " . $conn->error;
	}

	while($row = mysqli_fetch_array($result))
    { 
?>	
		
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['NewsID']?></th>
		<td><?php echo $row['Title']?></td>
		<td><?php echo $row['Description']?></td>
		<td><?php echo '<img src="../Function/Upload/'.$row['image'].'" style="width: 20%;">';?></td>
		<td><?php echo $row['CreateDate']?></td>
		<td><?php echo $row['Status']?></td>
		<td><a href="../Function/editNews.php?id=<?php echo $row['NewsID']; ?>">Edit</a></td>
    	<td><a href="../Function/deleteNews.php?id=<?php echo $row['NewsID']; ?>">Delete</a></td>
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
          <h4>Add a news</h4>
        </div>
        <div class="d-flex flex-column text-center" >
			
          <form method="post" action="../Function/addNews.php" enctype="multipart/form-data">
			  
			  	 <div class="form-group">
				<label> Title</label>
					 	<textarea name="title"></textarea>
			  </div>

			  
           
			   <div class="form-group">
				<label> Description</label>
				   <textarea id="summernote" name="description"></textarea>
            </div>
			  
			   <div class="custom-file" style="margin-top:20px; margin-bottom:20px">
                    <label for="image"></label>
                    <input type="file" class="custom-file-input" id="customFileInput" name="image" aria-describedby="customFileInput">
                    <label class="custom-file-label" for="customFileInput">Select image</label>

                <script> //show name of img
                document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                    var name = document.getElementById("customFileInput").files[0].name;
                    var nextSibling = e.target.nextElementSibling
                    nextSibling.innerText = name
                })
                </script>
                </div>
			  
			  <div class="form-group">
				<label> Status</label>
              <select class="form-control" name="status" > 
				  <option> Active </option>
				  <option> Disable </option>
				  </select>
            </div>
			  <div class="form-group">
				<label> Create Date</label>
              <input type="date" class="form-control" name="createDate" placeholder="">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round" name="addSubmit" value="submit" >Add</button>
          </form>
          
          <div class="text-center text-muted delimiter"></div>
          
      </div>
    </div>
      
  </div>
</div>
</div>
<script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100,
		  
      });
</script>		

</body>
</html>