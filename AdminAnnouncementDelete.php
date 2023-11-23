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

$announcementId = $_POST["announcementId"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "DELETE FROM `announcement` WHERE `announcementId`='$announcementId'"; 
$result = $con->query($query);
header("Location: AdminDashboard.php");

// Close the connection
$con->close();
?>
