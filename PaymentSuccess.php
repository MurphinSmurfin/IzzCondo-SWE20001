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


$query = "SELECT COUNT(`parkingId`) AS parkingCount FROM `parking` WHERE `userId` = '$userId'";
$result = $con->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $parkingCount = $row["parkingCount"];
} else {
    $parkingCount = 0;
}

$parkingTotal = 15 * $parkingCount;
$total = 1500 + $parkingTotal;
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
              <li><a href="Parking.php"><b>PARKING</b></a></li>
              <li><a class="active"><b>PAYMENT</b></a></li>
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
<div class="container-fluid" >
    <div class="bg-img">
        <div class="overlay"></div>
        <h1 class="h1-center">Payment Success</h1>
        <p class="p1-center"><a href="TenantHome.php" style="color: orange;">Home</a> / Payment</p> 
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

<script>
    function formatCardNumber() {
    var cardNumber = document.getElementById("cardNumber");
    var value = cardNumber.value.replace(/\D/g, '');
    var formattedValue = "";
    for (var i = 0; i < value.length; i++) {
        if (i % 4 == 0 && i > 0) {
            formattedValue += " ";
        }
        formattedValue += value[i];
    }

    // Check if it's a Mastercard or Visa based on the starting digits
    var cardType = getCardType(value);

    // You can use the cardType variable to perform further actions or styling
    console.log("Card Type:", cardType);

    cardNumber.value = formattedValue;
    };

    function getCardType(cardNumber) {
    // Define the patterns for Mastercard and Visa
    var mastercardPattern = /^(5[1-5]|2[2-7])/;
    var visaPattern = /^4/;

    // Get the reference to the image elements
    var visaImage = document.getElementById("visa");
    var masterImage = document.getElementById("master");

    // Check the starting digits to determine the card type
    if (cardNumber.match(mastercardPattern)) {
        // Change opacity for Mastercard
        masterImage.style.opacity = 1.0;
        visaImage.style.opacity = 0.2;
    } else if (cardNumber.match(visaPattern)) {
        // Change opacity for Visa
        masterImage.style.opacity = 0.2;
        visaImage.style.opacity = 1.0;
    } else {
        visaImage.style.opacity = 1.0;
        masterImage.style.opacity = 1.0;
    }
}
    function formatCardMonth() {
    var cardMonth = document.getElementById("cardMonth");
    var valueMonth = cardMonth.value.replace(/\D/g, '');
    var formattedValueMonth = "";
      for (var i = 0; i < valueMonth.length; i++) {
        if (i % 2 == 0 && i > 0) {
            formattedValueMonth += "/";
        }
        formattedValueMonth += valueMonth[i];
      }
      cardMonth.value = formattedValueMonth;
    };
    function formatCardCVV() {
    var cardCVV = document.getElementById("cardCVV");
    var valueCVV = cardCVV.value.replace(/\D/g, '');
    var formattedValueCVV = "";
      for (var i = 0; i < valueCVV.length; i++) {
        
        formattedValueCVV += valueCVV[i];
      }
      cardCVV.value = formattedValueCVV;
    };
</script>

<div class="container d-flex justify-content-center mt-5 mb-5">
    <div class="row g-3">
      <div class="col md-6">
        <span>Payment Method</span>
        <div class="payment-body">
  
        <div class="payment-card" style="height: 350px;">
          <div class="card-header p-0">
            <h2 class="mb-0">
              <button class="btn btn-light btn-block text-left p-3 rounded-0">
                <div class="d-flex align-items-center justify-content-between">
                  <span>Credit Card</span>
                  <div class="icons">
                    <img id="master" src="https://i.imgur.com/2ISgYja.png" width="50">
                    <img id="visa" src="https://i.imgur.com/W1vtnOV.png" width="50">
                  </div>
                </div>
              </button>
            </h2>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body payment-card-body">
              <span class="font-weight-normal card-text">Card Number</span>
              <div class="input">
                <i class="fa fa-credit-card"></i>
                <input type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19" oninput="formatCardNumber()">
              </div> 
              <div class="row mt-3 mb-3">
                <div class="col-md-6">
                  <span class="font-weight-normal card-text">Expiry Date</span>
                  <div class="input">
                    <i class="fa fa-calendar"></i>
                    <input type="text" class="form-control" name="cardMonth" id="cardMonth" placeholder="MM/YY" maxlength="5" oninput="formatCardMonth()">
                  </div> 
                </div>
                <div class="col-md-6">
                  <span class="font-weight-normal card-text">CVC/CVV</span>
                  <div class="input">
                    <i class="fa fa-lock"></i>
                    <input type="text" name="cardCVV" id="cardCVV" class="form-control" placeholder="000" maxlength="3" oninput="formatCardCVV()">
                  </div> 
                </div>
              </div>
              <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
            </div>
          </div>
        </div>
      </div>
      </div>
      
      <div class="col md-6">
        <span>Summary</span>
        <div class="payment-body">
          <div class="payment-card" style="height: 350px;">
            <div class="d-flex justify-content-between p-3">
  
              <div class="d-flex flex-column">
                <span>Monthly Rental <i class="fa fa-caret-down"></i></span>
              </div>
  
              <div class="mt-1">
                <sup class="super-price">RM1500.00</sup>
                <span class="super-month">/Month</span>
              </div>
            </div>
  
            <hr class="mt-0 line">
  
            <div class="p-3">
              <div class="d-flex justify-content-between mb-2">
                <span>Parking</span>
                <span class="super-month"><sup>RM15.00 </sup>/Month</span>
              </div>
  
              <div class="d-flex justify-content-between">
                <span>Total<i class="fa fa-clock-o"></i></span>
                <?php
                echo "<span>$parkingCount</span>";
                ?>
              </div>
            </div>
  
            <hr class="mt-0 line">
  
            <div class="p-3 d-flex justify-content-between">
              <div class="d-flex flex-column">
                <span>Parking and Rental</span>
                <span>Total : </span>
              </div>
              <div class="d-flex flex-column">
                <span>RM1500 + RM<?php echo"$parkingTotal"?></span>
                <span><b>RM<?php echo"$total"; ?></b></span>
              </div>
            </div>
  
            <div class="p-3">
              <button class="btn btn-primary btn-block free-button">Confirm Payment</button> 
            </div>
          </div>
        </div>
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
