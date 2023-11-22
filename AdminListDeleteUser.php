<?php
session_start();
$i = 0;
while(true){
    if (!empty($_SESSION['id'][$i])){
        $i = $i + 1;
    } else {
        break;
    }
} 

$userId = $_POST["userId"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "DELETE FROM `users` WHERE `userId`='$userId'"; 
$result = $con->query($query);
header("Location: AdminList.php");

// Close the connection
$con->close();
?>
