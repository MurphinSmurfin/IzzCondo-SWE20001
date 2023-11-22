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

$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT `userId` FROM `users` WHERE `userName` = '$username' AND `userPass` = '$password'";
$result = $con->query($query);
$row = $result->fetch_assoc();
$userId = $row["userId"];

// Initialize variables as arrays to store multiple messages
$subjects = array();
$contents = array();

if ($result && $result->num_rows > 0) {
    $queryReply = "SELECT * FROM `inbox` WHERE `userId` = '$userId' ORDER BY `inboxId` DESC";
    $resultReply = $con->query($queryReply);

    if ($resultReply && $resultReply->num_rows > 0) {
        // Loop through the result set and store messages in arrays
        while ($rowReply = $resultReply->fetch_assoc()) {
            $subjects[] = $rowReply["subject"];
            $contents[] = $rowReply["content"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="index.js"></script>
</head>
<body style="background-color: #eee;">
  <header>
    <div class="container-fluid" style="box-shadow: 0 4px 2px -2px rgb(158, 158, 158); background-color: white;">
    <div class="topnav">
        <div class="logo">
            <img src="Image/iZZpROPERTY.png" style="height: 80px; width: 80px; margin: 12px;">
            <h3 class="nav-logo">IZZ CONDOMINIUM</h3>
        </div>
        <div class="nav-center">
          <ul>
            <li><a href="TenantHome.php" ><b>HOME</b></a></li>
            <li><a href="Booking.php"><b>BOOKING</b></a></li>
            <li><a href="Maintenance.php"><b>MAINTENANCE</b></a></li>
            <li><a href="Parking.php"><b>PARKING</b></a></li>
            <li><a href="Payment.php"><b>PAYMENT</b></a></li>
        </ul>
        </div>
        <div class="profile-container">
          <button class="avatar" onclick="myFunction()">A</button>
          <div class="dropdown-content" id="myDropdown" >
              <a href="Login.php">Logout</a>
          </div>
        </div>
    </div>
</div>
</header> 
<br>

<div class="container-fluid" >
  <div class="bg-img">
      <div class="overlay"></div>
      <h1 class="h1-center">Inbox</h1>
      <p class="p1-center"><a href="" style="color: orange;">Home</a> / Inbox</p> 
  </div>
</div>

<br>

<div class="container-fluid" style="padding: 30px; margin: auto; padding: 20px;">
  <!-- Loop through the messages and display them -->
  <?php for ($i = 0; $i < count($subjects); $i++) { ?>
    <div class="inbox" style="background-color: #fefefe;">
        <img src="Image/admin.jpg" alt="Avatar" style="width:100%;">
        <?php
        echo 
          "<h4>{$subjects[$i]}</h4>
          <p>{$contents[$i]}</p>";
        ?>
    </div>
  <?php } ?>
</div>
  
</body>
</html>
