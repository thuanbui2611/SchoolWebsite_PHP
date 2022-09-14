<?php
	require_once '../Login/logindb.php';

	$id = $_GET['id'];		
	$query = "Select * from admin where ID = '$id'";
	$data = mysqli_fetch_array($conn->query($query));

	if(isset($_POST['update'])) 
    {
		$username = $_POST['Username'];
		$password = $_POST['Password'];
        
        $query = "Update admin set Username='$username', Password='$password'  where ID = '$id'";
        $result = $conn->query($query);

        if(!$result)
        {
        echo "Update Failed: $query<br/>" . $conn->error . "<br/>";
        } else 
        {
            header("Location: ../Management/adminAccountManagement.php");
        }
    }
?>

<html lang="en">
<head>
  <title>Edit Admin Account</title>
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
    <label for="username">Username:</label>
    <input type="text" class="form-control" placeholder="Enter username" id="Username" name="Username" value="<?php echo $data['Username']?>">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" class="form-control" placeholder="Enter password" id="Password" name="Password" value="<?php echo $data['Password']?>">
  </div>
  <button type="submit" name="update" class="btn btn-primary submit">Update</button>
</form>
		</div>
</body>
</html>
