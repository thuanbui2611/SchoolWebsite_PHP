<?php 
    require_once '../Login/logindb.php';
   
    if(isset($_GET['id']))
    $id = $_GET['id'];
    $query = "delete from class where ClassID = '$id'";

    $result = $conn->query($query);
    if(!$result)
    {
        echo "Delete Failed: $query<br/>" . $conn->error . "<br/>";
    } else 
    {
        mysqli_close($conn);
        header("Location: ../Management/classManagement.php");
    }
?>