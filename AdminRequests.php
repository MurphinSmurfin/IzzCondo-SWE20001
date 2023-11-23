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
$query = "SELECT * FROM `requests` ORDER BY `requestId` DESC";
$result = $con->query($query);

$username = $_SESSION["username"];    
?>
<html lang="en">

<head>

    <head>
        <title>Parking List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/master.css" rel="stylesheet">
        
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
              <li><a href="AdminDashboard.php"><b>ANNOUNCEMENT</b></a></li>
              <li><a href="AdminList.php"><b>USERS</b></a></li>
              <li><a class="active"><b>REQUESTS</b></a></li>
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
    <div class="container-fluid" >
      <div class="bg-img">
          <div class="overlay"></div>
          <h1 class="h1-center">Requests</h1>
          <p class="p1-center"><a href="AdminDashboard.php" style="color: orange;">Dashboard</a> / Requests</p> 
      </div>
    </div>


    <body>
  <br>
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                            <div>
                                <div class="row p-4 no-gutters align-items-center">
                                    <div class="col-sm-12 col-md-6">
                                        <h3 class="font-light mb-0" style="color: black;"><i class="ti-email mr-2"></i>Email</h3>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <ul class="list-inline dl mb-0 float-left float-md-right">
                                            <li class="list-inline-item text-info mr-3">
                                                <a href="AdminAddParking.html">
                                                    <a href="AdminAddParking.html" button class="btn btn-circle btn-success text-white">
                                                        <i class="fa fa-plus"><span class="ml-2 font-normal text-dark">Add Parking</span></i>
                                                    </a>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <thead>
                                            <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 73px;"
                                                    aria-label=": activate to sort column ascending"></th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 122px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 122px;"
                                                    aria-label="Email: activate to sort column ascending">Request Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 122px;"
                                                    aria-label="Email: activate to sort column ascending">Problem</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 358px;"
                                                    aria-label="Type: activate to sort column ascending">Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 67px;"
                                                    aria-label="Status: activate to sort column ascending">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    
                                                        $requestId = $row["requestId"];
                                                        $userId = $row["userId"];
                                                        $requestType = $row["requestType"];
                                                        $problem = $row["problem"];
                                                        $description = $row["description"];
                                                        $userUnit = $row["unitId"];
                                            
                                                        $queryUnit = "SELECT * FROM `units` WHERE `unitId` = '$userUnit'";
                                                        $resultUnit = $con->query($queryUnit); // Use a different variable
                                            
                                                        if ($resultUnit && $resultUnit->num_rows > 0) {
                                                            $rowUnit = $resultUnit->fetch_assoc();
                                                            $unitBlock = $rowUnit["unitBlock"];
                                                            $unitFloor = $rowUnit["unitFloor"];
                                                            $unitNumber = $rowUnit["unitNumber"];
                                                        } else {
                                                            // Handle the case where the unit details are not found
                                                            $unitBlock = $unitFloor = $unitNumber = "N/A";
                                                        }

                                                        $queryUser = "SELECT * FROM `users` WHERE `userId` = '$userId'";
                                                        $resultUser = $con->query($queryUser); // Use a different variable
                                                        $rowUser = $resultUser->fetch_assoc();
                                                        $username = $rowUser["userName"];

                                                    echo"
                                                        <tr>
                                                            <form method='post' action='AdminReply.php'>
                                                            <input type='hidden' value='$requestId' name='requestId'></input>
                                                            <td class='pl-3'><button style='font-size:24px' class='fa'>&#xf112;</button></td>
                                                            </form>

                                                            <td>
                                                                <span class='mb-0 text-muted'>$username</span>
                                                            </td>

                                                            <td>
                                                                <span class='mb-0 text-muted'>$requestType</span>
                                                            </td>

                                                            <td>
                                                                <span class='mb-0 text-muted'>$problem</span>
                                                            </td>

                                                            <td>
                                                                <span class='mb-0 text-muted'>$description</span>
                                                            </td>

                                                            <td class='text-muted'>
                                                                $unitBlock-$unitFloor-$unitNumber
                                                            </td>
                                                        </tr>
                                                        ";
                                                    
                                                }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
