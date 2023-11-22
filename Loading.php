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
$query = "SELECT * FROM `users` WHERE `userName` = '$username' AND `userpass` = '$password'"; 
$result = $con->query($query);

// Flag to indicate whether a user was found
$userFound = false;

// Check if the query executed successfully
if ($result) {
    // Fetch data from the result object
    while ($row = $result->fetch_assoc()) {
        $userFound = true;
        $_SESSION["loginfail"] == false;

        if ($row["userRole"] == "admin"){
            header("Location: AdminDashboard.php");
        } elseif($row["userRole" ] == "user"){
            header("Location: TenantHome.php");
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

// Redirect back to login page if user was not found
if (!$userFound) {
    $_SESSION["loginfail"] == true;
    header("Location: Login.php");
}
?>
