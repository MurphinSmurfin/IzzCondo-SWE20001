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
$venue = $_SESSION["booking"];
$time = $_POST["time"];
$date = $_POST["date"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "SELECT `userId` FROM `users` WHERE `userName` = '$username'"; 
$result = $con->query($query);

if ($result) {
    // Fetch the data from the result object
    $row = $result->fetch_assoc();
    $userId = $row["userId"];
    
    $queryBooked = "INSERT INTO `booking`(`bookingVenue`, `bookingDate`, `bookingTime`, `userId`) VALUES ('$venue','$date','$time','$userId')"; 
    $resultBooked = $con->query($queryBooked);  
    
    header("Location: Booking.php");
} 

// Close the connection
$con->close();
?>
