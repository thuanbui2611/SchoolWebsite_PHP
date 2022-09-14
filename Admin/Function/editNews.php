<?php
	require_once '../Login/logindb.php';

	$id = $_GET['id'];		
	$query = "Select * from news where NewsID = '$id'";
	$data = mysqli_fetch_array($conn->query($query));

	if(isset($_POST['update'])) 
    {

		$title = $_POST['title'];
		$description = $_POST['description'];
		$status = $_POST['status'];
		$createDate = $_POST['createDate'];
		$image = $_FILES['image']['name'];
        $target = "Upload/".basename($image);
        

        if($image == "")
        {
            $image = $_POST['image'];
        }        
		
        $query = "Update news set Title='$title', Description='$description', image='$image', Status='$status', CreateDate='$createDate' where NewsID = '$id'";
        $result = $conn->query($query);
		
		  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
		
        if(!$result)
        {
        echo "Update Failed: $query<br/>" . $conn->error . "<br/>";
        } else 
        {
            header("Location: ../Management/NewsManagement.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Edit News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../panel.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
    <label for="title">Title</label>
	  <textarea id="title" name="title" ><?php echo $data['Title']?></textarea>
  </div>
  <div class="form-group">
    <label for="title">Description</label>
	  <textarea id="summernote" name="description"><?php echo $data['Description']?></textarea>
  </div>
		  
	<div class="custom-file" style="margin-top:20px; margin-bottom:20px">
    	<label for="image"></label>
		<input type="text" id="image" name="image" value="<?php echo $data['image']?>" hidden>
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
    <label for="title">Create Date</label>
    <input type="date" class="form-control" name="createDate" id="createDate" value="<?php echo $data['CreateDate']?>">
  </div>
  <button type="submit" name="update" class="btn btn-primary submit">Update</button>
</form>
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
