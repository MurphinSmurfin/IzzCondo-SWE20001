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

?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"  href="Image/IzzProperty.png">

    <title>Amenity Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
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
              <li><a href="TenantHome.php"><b>HOME</b></a></li>
              <li><a class="Active"><b>BOOKING</b></a></li>
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
  </header> 

    <main role="main">

      <div class="container-fluid" >
      <div class="bg-img">
          <div class="overlay"></div>
          <h1 class="h1-center">Booking Request</h1>
          <p class="p1-center"><a href="TenantHome.php" style="color: orange;">Home</a> / Booking</p> 
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

      <form method="POST" action="BookingForm.php">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="Image\basketball.jpg" data-holder-rendered="true">
                <div class="card-body">
                  <h4 class="card-title basketball">Basketball Court</h4>
                  <p class="card-text">Score big on our premium basketball court. Perfect your slam dunk or enjoy friendly matches with friends. Book your court time now and shoot some hoops!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnBasketball"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="Image\badminton.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <h4 class="card-title badminton">Badminton Court</h4>
                  <p class="card-text">Ace your game on our top-notch badminton court. Smash, rally, and enjoy competitive matches. Reserve your court for a thrilling badminton experience today!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnBadminton"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="Image\gym.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <h4 class="card-title gym">Gym Room</h4>
                  <p class="card-text">Elevate your fitness journey in our cutting-edge gym room. Equipped with state-of-the-art facilities, it's your space for strength, cardio, and wellness. Get ...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnGym"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="Image\tennis.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <h4 class="card-title tennis">Tennis Court</h4>
                  <p class="card-text">Serve, volley, and smash on our pristine tennis court. Experience the thrill of the game in a perfect setting. Book your court, grab your racket, and let the match begin!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnTennis"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="Image\yoga.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <h4 class="card-title yoga">Yoga Studio</h4>
                  <p class="card-text">Find serenity in our tranquil yoga room. Unwind, stretch, and meditate in a peaceful ambiance. Embrace mindfulness and inner peace. Reserve your spot for a ...</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnYoga"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      </form>

    </main>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; Izz Condominium</small>
  </div>
</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  

<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg>
</body>
</html>
