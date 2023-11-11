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

$username = $_SESSION["username"];
$password = $_SESSION["password"];
$problem = $_POST["problem"];
$description = $_POST["description"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "SELECT * FROM `users` WHERE `userName` = '$username' AND `userPass` = '$password'"; 
$result = $con->query($query);
$row = $result->fetch_assoc();
$userUnit = $row["unitId"];
$userId = $row["userId"];


if ($result) {
    // Fetch the data from the result object
    
    $querySent = "INSERT INTO `maintenance`(`userId`, `unitId`, `problem`, `description`) VALUES ('$userId','$userUnit','$problem','$description')"; 
    $resultSent = $con->query($querySent);  
    
    header("Location: TenantHome.php");
} 

// Close the connection
$con->close();
?>
