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
$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];
$role = $_POST["unitRole"];
$unit = $_POST["unitId"];
$status = $_POST["status"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "UPDATE `users` SET `userName`='$name',`userPass`='$password',`userEmail`='$email',`userRole`='$role',`unitId`='$unit',`paymentStatus`='$status' WHERE `userId`='$userId'"; 
$result = $con->query($query);
header("Location: AdminList.php");

// Close the connection
$con->close();
?>
