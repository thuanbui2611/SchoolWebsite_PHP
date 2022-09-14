<?php
if (isset($_SESSION['username']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: ../Login/loginAdmin.php');
}else {
	if (isset($_SESSION['permission']) == false) {

			echo "You do not have permission to access this page <br>";
			echo "<a href='panel.php'> Click here to go to Panel <br></a>";
			echo "<a href='../../Web/Website.php'> Click here to go to Website</a>";
			exit();
			}
}		
?>