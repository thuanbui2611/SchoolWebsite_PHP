<?php
	require_once '../Login/logindb.php';

	$id = $_GET['id'];		
	$query = "Select * from subject where SubjectID = '$id'";
	$data = mysqli_fetch_array($conn->query($query));

	if(isset($_POST['update'])) 
    {
		$name = $_POST['subjectName'];
        
        $query = "Update subject set SubjectName='$name' where SubjectID = '$id'";
        $result = $conn->query($query);

        if(!$result)
        {
        echo "Update Failed: $query<br/>" . $conn->error . "<br/>";
        } else 
        {
            header("Location: ../Management/subjectManagement.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Edit Teacher</title>
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
<form method="post">
  <div class="form-group">
    <label for="name">Subject Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="subjectName" id="subjectName" value="<?php echo $data['SubjectName']?>">
  </div>
  <button type="submit" name="update" class="btn btn-primary submit">Update</button>
</form>
		</div>
</body>
</html>
