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

$userId = $_POST["userId"];
$subject = $_POST["subject"];
$content = $_POST["content"];

echo "$userId, $subject, $content";

$con = mysqli_connect("localhost", "root", "", "izzcondo");

// Use prepared statement to avoid SQL injection
$query = "INSERT INTO `inbox`(`userId`, `subject`, `content`) VALUES (?, ?, ?)";
$stmt = $con->prepare($query);

// Bind parameters
$stmt->bind_param("iss", $userId, $subject, $content);

// Execute the statement
$result = $stmt->execute();

if ($result) {
    echo "Record inserted successfully.";
    header("Location: AdminRequests.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$con->close();
?>
