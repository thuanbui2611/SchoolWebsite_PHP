<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["permission"]);
header("Location:../Login/loginAdmin.php");
?>