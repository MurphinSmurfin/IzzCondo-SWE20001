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


$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT * FROM `announcement` ORDER BY `announcementId` DESC";
$result = $con->query($query);

$username = $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                  <li><a class="active"><b>ANNOUNCEMENT</b></a></li>
                  <li><a href="AdminList.php"><b>USERS</b></a></li>
                  <li><a href="AdminRequests.php"><b>REQUESTS</b></a></li>
                </ul>
              </div>
              <div class="profile-container">
                <?php echo"<span class='profile-text'>Hello, $username</span>"?>
                <button class="avatar" onclick="myFunction()"><?php echo strtoupper(substr($username, 0, 1)); ?></button>
                <div class="dropdown-content" id="myDropdown" >
                  <a href="Login.php">Logout</a>
                </div>
              </div>
          </div>
        </div>
      </header> 
      <br>
  <div class="container-fluid">
    <div class="bg-img">
      <div class="overlay"></div>
      <h1 class="h1-center">Announcement</h1>
    </div>
  </div>

    <div class="page-content container note-has-grid">
        <ul class="nav nav-pills p-3  mb-3 rounded-pill align-items-center">
            <li class="nav-item ml-auto">
                <a href="AdminDashboardAddPage.html" class="nav-link btn-primary rounded-pill d-flex align-items-center px-3" id="add-notes">
                    <i class="icon-note m-1"></i>
                    <span class="d-none d-md-block font-14">Add Announcement</span>
                </a>
            </li>
        </ul>
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
                    $announcementId = $row["announcementId"];
                    
                    echo "
                      <div class='container'>
                      <div class='feed' style='border-radius: 15px; background-color: #fefefe; padding: 20px; border: 1px solid #888;'>
                        <h3>$header</h3><hr>
                        <h5>$title, $date</h5><hr>
                        <p>$description</p>
                        <form method='post' action='AdminAnnouncementDelete.php'>
                        <input type='hidden' name='announcementId' value='$announcementId'></input>
                        <div class='d-flex justify-content-end align-items-center'>
                          <button class='btn btn-primary' style='background-color: red;'>Delete</button>
                        </div>
                        </form>
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
    </div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50" style="bottom:0; width: 100%">
    <div class="container text-center">
      <small>Copyright &copy; Izz Condominium</small>
    </div>
  </footer>
</body>

</html>
