<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"  href="Image/IzzProperty.png">

    <title>Amenity Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
              <li><a href="TenantHome.html"><b>HOME</b></a></li>
              <li><a class="Active"><b>BOOKING</b></a></li>
              <li><a href="Maintenance.html"><b>MAINTENANCE</b></a></li>
              <li><a href="Parking.html"><b>PARKING</b></a></li>
              <li><a href="Rental.html"><b>RENTAL</b></a></li>
          </ul>
          </div>
          <div class="profile-container">
            <button class="avatar" onclick="myFunction()">A</button>
            <div class="dropdown-content" id="myDropdown" >
              <a href="#Inbox">Inbox</a>
              <a href="#logout">Logout</a>
            </div>
          </div>
      </div>
    </div>
  </header> 
  <br>
  </header> 

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <?php
          $where = $_SERVER['HTTP_REFERER'];
            if ($_SERVER['HTTP_REFERER'] == "http://localhost/IzzCondo-SWE20001-main/BookingForm.php"){
              echo "<h1 class='jumbotron-heading'>Booking Request Success</h1>";
            } else {
              echo "<h1 class='jumbotron-heading'>Amenity Booking</h1>";
            }
          ?>
          <p class="lead text-muted">Discover our exclusive amenities available for booking. From fitness centers to spa retreats, find your perfect escape. Dive into a world of convenience and relaxation tailored just for you. Start your journey today.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>

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
                  <p class="card-text">Elevate your fitness journey in our cutting-edge gym room. Equipped with state-of-the-art facilities, it's your space for strength, cardio, and wellness. Get ready to sweat and achieve your fitness goals. Book your workout time now!</p>
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
                  <p class="card-text">Find serenity in our tranquil yoga room. Unwind, stretch, and meditate in a peaceful ambiance. Embrace mindfulness and inner peace. Reserve your spot for a rejuvenating yoga session now!</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <input type="submit" value="Booking" class="btn btn-sm btn-outline-secondary" name="btnYoga"></input>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18b14afb781%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18b14afb781%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
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
