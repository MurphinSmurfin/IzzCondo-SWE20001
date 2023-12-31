<?php
session_start();
$i = 0;
while (true) {
    if (!empty($_SESSION['id'][$i])) {
        $i = $i + 1;
    } else {
        break;
    }
}

$username = $_SESSION["username"];
$block = $_POST["block"];
$floor = $_POST["floor"];
$userParkingId = $_POST["userId"];

$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT `userId` FROM `users` WHERE `userId` = '$userParkingId'";
$result = $con->query($query);
$row = $result->fetch_assoc();
$userId = $row["userId"];

$minValue = 1; // Minimum value in the sequence
$maxValue = 20; // Maximum value in the sequence

for ($i = $minValue; $i <= $maxValue; $i++) {
    if (!numberExists($con, $i)) {
        InsertNumberIntoDatabase($con, $userId, $block, $floor, $i);
        header("Location: AdminRequests.php");
        break; // Break after inserting the first available number
    }
}

$con->close();

function numberExists($con, $number)
{
    $result = $con->query("SELECT COUNT(*) as count FROM parking WHERE unit = $number");
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

function InsertNumberIntoDatabase($con, $userId, $block, $floor, $number)
{
    $con->query("INSERT INTO `parking`(`userId`, `block`, `floor`, `unit`) VALUES ('$userId','$block','$floor','$number')");
}
?>
