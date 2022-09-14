<?php 
    require_once '../Login/logindb.php';
   
    if(isset($_GET['id']))
    $id = $_GET['id'];
    $query = "delete from admin where ID = '$id'";

    $result = $conn->query($query);
    if(!$result)
    {
        echo "Delete Failed: $query<br/>" . $conn->error . "<br/>";
    } else 
    {
        mysqli_close($conn);
        header("Location: ../Management/adminAccountManagement.php");
    }
?>