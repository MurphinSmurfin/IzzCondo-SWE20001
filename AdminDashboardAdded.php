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

$header = $_POST["header"];
$title = $_POST["title"];
$description = $_POST["description"];
$date = date("d/m/Y");

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "INSERT INTO `announcement`(`header`, `title`, `date`, `description`) VALUES ('$header','$title','$date','$description')"; 
$result = $con->query($query);
header("Location: AdminDashboard.php");

// Close the connection
$con->close();
?>
