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

$_SESSION["username"] = $_POST["username"];
$username = $_SESSION["username"];

$_SESSION["password"] = $_POST["password"];
$password = $_SESSION["password"];

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "SELECT `userRole` FROM `users` WHERE `userName` = '$username' AND `userpass` = '$password'"; 
$result = $con->query($query);

// Check if the query executed successfully
if ($result) {
    // Fetch data from the result object
    while ($row = $result->fetch_assoc()) {
        if ($row["userRole"] == "admin"){
            header("Location: AdminDashboard.html");
        } elseif($row["userRole"] == "user"){
            header("Location: TenantHome.html");
        }
    }

    // Free the result set
    $result->free();
} else {
    // Handle the error if the query fails
    echo "Error: " . $con->error;
}

// Close the connection
$con->close();
?>
