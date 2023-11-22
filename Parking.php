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

$con = mysqli_connect("localhost","root","","izzcondo");
$query = "SELECT `userId` FROM `users` WHERE `userName` = '$username' AND `userPass` = '$password'"; 
$result = $con->query($query);
$row = $result->fetch_assoc();
$userId = $row["userId"];

$query = "SELECT * FROM `parking` WHERE `userId` = '$userId'"; 
$result = $con->query($query);
$row = $result->fetch_assoc();
$parkingBlock = $row["block"];
$parkingFloor = $row["floor"];
$parkingUnit = $row["unit"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="index.js"></script>
</head>
<body style="background-color: #eee;">
    <header>
        <div class="container-fluid" style="box-shadow: 0 4px 2px -2px rgb(158, 158, 158); background-color: white;">
          <div class="topnav">
              <div class="logo">
                  <img src="Image/IzzProperty.png" style="height: 80px; width: 80px; margin: 12px;">
                  <h3 class="nav-logo">IZZ CONDOMINIUM</h3>
              </div>
              <div class="nav-center">
                <ul>
                  <li><a href="TenantHome.php"><b>HOME</b></a></li>
                  <li><a href="Booking.php"><b>BOOKING</b></a></li>
                  <li><a href="Maintenance.php"><b>MAINTENANCE</b></a></li>
                  <li><a class="active"><b>PARKING</b></a></li>
                  <li><a href="Payment.php"><b>PAYMENT</b></a></li>
              </ul>
              </div>
              <div class="profile-container">
                <button class="avatar" onclick="myFunction()">A</button>
                <div class="dropdown-content" id="myDropdown" >
                  <a href="Inbox.php">Inbox</a>
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
        <h1 class="h1-center">Parking</h1>
        <p class="p1-center"><a href="TenantHome.php" style="color: orange;">Home</a> / Parking</p> 
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal" style="display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 20%; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">

    <!-- Modal content -->
    <div class="modal-content" style="
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;">
      <div style="
      display: flex; 
      justify-content: space-between;">
        <h3>Inbox</h3>
        <span class="close" style="color: #aaaaaa;font-size: 28px;font-weight: bold;">&times;</span>
      </div>
      <hr>
      <div class="inbox" style="
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
      ">
      <img src="Image/admin.jpg" alt="Avatar" style="width:100%;float: left;max-width: 60px;width: 100%;margin-right: 20px;border-radius: 50%;">
        <p>Hello. How are you today?</p>
        <span class="time-right">11:00</span>
      </div>
    </div>
  
</div>
  
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

<div class="container" style="background-color: white; min-width: 90%; padding: 40px; display: flex; border-radius: 25px; box-shadow: 4px 4px 4px 4px rgb(158, 158, 158);">
  <div class="col-md-4">
    <h2>Parking Request</h2>
    <p>Select your unit to request for parking slot</p>
    <br>
    <form class="mx-1 mx-md-4" method="post" action="ParkingCompleted.php">
      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label for="parkingUnit">Block</label>
          <select class="form-control" id="block" name="block">
              <option>A</option>
              <option>B</option>
              <option selected="selected">None</option>
          </select>
        </div>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <label for="parkingUnit">Floor</label>
          <select class="form-control" id="floor" name="floor">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option selected="selected">None</option>
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        <button type="submit" class="btn btn-primary btn-lg">Request</button>
      </div>
    </form>
  </div>

  <div class="col-md-4">
    <h2>Current Owned Parking</h2>
    <div class="currentParking" style="width: 100%; border: 2px solid #dedede; background-color: #f1f1f1; padding: 10px;">
      <?php
      
      $query = "SELECT * FROM `parking` WHERE `userId` = '$userId'"; 
      $result = $con->query($query);
      
      
      
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $parkingBlock = $row["block"];
              $parkingFloor = $row["floor"];
              $parkingUnit = $row["unit"];

              echo "<p> - $parkingBlock-$parkingFloor-$parkingUnit</p>";
          }
      } else {
          echo "<p>No parking units owned.</p>";
      }

      ?>
    </div>
  </div>

  <div class="col-md-4" style="background-image: url('Image/parking.jpg'); background-position: center; background-size: cover;">
    
  </div>

</div>

  <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; Izz Condominium</small>
    </div>
</footer>
  
</body>
</html>
