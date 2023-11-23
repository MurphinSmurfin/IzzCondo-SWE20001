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

$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT * FROM `announcement` ORDER BY `announcementId` DESC";
$result = $con->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <link rel="icon"  href="Image/IzzProperty.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="index.js"></script>
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .main-content {
      flex: 1;
    }

    #sticky-footer {
      flex-shrink: 0; /* Do not shrink the footer */
    }
  </style>
</head>
<body>

  <header>
    <div class="container-fluid" style="box-shadow: 0 4px 2px -2px rgb(158, 158, 158); background-color: white;">
      <div class="topnav">
          <div class="logo">
              <img src="Image/IzzProperty.png" style="height: 80px; width: 80px; margin: 12px;">
              <h3 class="nav-logo">IZZ CONDOMINIUM</h3>
          </div>
          <div class="nav-center">
            <ul>
              <li><a class="active"><b>HOME</b></a></li>
              <li><a href="Booking.php"><b>BOOKING</b></a></li>
              <li><a href="Maintenance.php"><b>MAINTENANCE</b></a></li>
              <li><a href="Parking.php"><b>PARKING</b></a></li>
              <li><a href="Payment.php"><b>PAYMENT</b></a></li>
          </ul>
          </div>
          <div class="profile-container">
          <?php echo"<span class='profile-text'>Hello, $username</span>"?>
            <button class="avatar" onclick="myFunction()"><?php echo strtoupper(substr($username, 0, 1)); ?></button>
            <div class="dropdown-content" id="myDropdown" >
              <a href="Inbox.php">Inbox</a>
              <a href="Login.php">Logout</a>
            </div>
          </div>
      </div>
    </div>
  </header> 
  <br>
<!-- Hero Section -->
<div class="container-fluid" >
  <div class="bg-img">
      <div class="overlay"></div>
      <h1 class="h1-center">Announcements</h1>
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

<div class="main-content">
  <div class="container mt-5">
    <div class="row">
      <?php
      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $header = $row["header"];
              $title = $row["title"];
              $date = $row["date"];
              $description = $row["description"];
              
              echo "
              <div class='container'>
                <div class='feed' style='border-radius: 15px; background-color: #fefefe; padding: 20px; border: 1px solid #888;'>
                  <h3>$header</h3><hr>
                  <h5>$title, $date</h5><hr>
                  <p>$description</p>
                </div>
              </div>
              ";
          }
      } else {
          echo "
          <div class='col-sm-8'>
            <h2>No announcements.</h2>
          </div>
          ";
      }
      ?>
    </div>
  </div>
</div>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; Izz Condominium</small>
  </div>
</footer>

</body>
</html>

<?php
mysqli_close($con);
?>
