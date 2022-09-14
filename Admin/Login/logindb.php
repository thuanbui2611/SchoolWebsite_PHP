<?php 
    $host = 'localhost';
    $port = '3306';
    $database = 'schoolweb';
    $username = 'thuan';
    $password = '123456';

	$conn = new mysqli($host , $username, $password, $database, $port);
    if ($conn->connect_error)
        {
            die($conn->connect_error);
        }
?>