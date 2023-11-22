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
$password = $_SESSION["password"];
$block = $_POST["block"];
$floor = $_POST["floor"];

$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT * FROM `users` WHERE `userName` = '$username' AND `userPass` = '$password'";
$result = $con->query($query);
$row = $result->fetch_assoc();
$userId = $row["userId"];
$userUnit = $row["unitId"];

$minValue = 1; // Minimum value in the sequence
$maxValue = 20; // Maximum value in the sequence

for ($i = $minValue; $i <= $maxValue; $i++) {
    if (!numberExists($con, $i)) {
        InsertNumberIntoDatabase($con, $userId, $block, $floor, $i, $userUnit);
        header("Location: Parking.php");
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

function InsertNumberIntoDatabase($con, $userId, $block, $floor, $number, $userUnit)
{
    $con->query("INSERT INTO `requests`(`userId`, `requestType`, `problem`, `description`, `unitId`) VALUES ('$userId','Parking Request','n/a','$block-$floor-$number','$userUnit')");
}
?>
