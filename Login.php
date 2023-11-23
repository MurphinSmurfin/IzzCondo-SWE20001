<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <link rel="icon"  href="Image/IzzProperty.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="condominium">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem; opacity: 70%;">
                <div class="card-body p-4 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-2">

                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" src="Image\IzzProperty.png" data-holder-rendered="true" style="width: 100px">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>

                    <?php 
                    session_start();

                    // Check if the key "loginfail" exists in the $_SESSION array
                    if (isset($_SESSION["loginfail"]) && $_SESSION["loginfail"] == true) {
                        echo "<p style='color: red;'>Wrong username or password!</p>";
                    }
                    ?>
                    
                    <form method="post" action="Loading.php">
                    <div class="form-outline form-white mb-4">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="U S E R N A M E" style="text-align: center;" required/>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="P A S S W O R D" style="text-align: center;" required/>
                    </div>

                    <br><br>
      
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
      
                    <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div> -->
                    </form>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
