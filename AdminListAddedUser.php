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

$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];
$role = $_POST["unitRole"];
$unit = $_POST["unitId"];
$status = $_POST["status"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "INSERT INTO `users`(`userName`, `userPass`, `userEmail`, `userRole`, `unitId`, `paymentStatus`) VALUES ('$name','$password','$email','$role','$unit','$status')"; 
$result = $con->query($query);
header("Location: AdminList.php");

// Close the connection
$con->close();
?>
