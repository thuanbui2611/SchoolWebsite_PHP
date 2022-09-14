<?php 
    require_once '../Login/logindb.php';
   
    if(isset($_GET['id']))
    $id = $_GET['id'];
    $query = "delete from news where NewsID = '$id'";

    $result = $conn->query($query);
    if(!$result)
    {
        echo "Delete Failed: $query<br/>" . $conn->error . "<br/>";
    } else 
    {
        mysqli_close($conn);
        header("Location: ../Management/newsManagement.php");
    }
?>