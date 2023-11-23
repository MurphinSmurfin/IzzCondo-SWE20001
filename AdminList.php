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
$query = "SELECT * FROM `users` ORDER BY `userId` ASC";
$result = $con->query($query);

$username = $_SESSION["username"];    
?>

<html lang="en">

<head>

    <head>
        <title>User List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style type="text/css">
            svg:not(:root).svg-inline--fa {
                overflow: visible
            }

            .svg-inline--fa {
                display: inline-block;
                font-size: inherit;
                height: 1em;
                overflow: visible;
                vertical-align: -.125em
            }

            .svg-inline--fa.fa-lg {
                vertical-align: -.225em
            }

            .svg-inline--fa.fa-w-1 {
                width: .0625em
            }

            .svg-inline--fa.fa-w-2 {
                width: .125em
            }

            .svg-inline--fa.fa-w-3 {
                width: .1875em
            }

            .svg-inline--fa.fa-w-4 {
                width: .25em
            }

            .svg-inline--fa.fa-w-5 {
                width: .3125em
            }

            .svg-inline--fa.fa-w-6 {
                width: .375em
            }

            .svg-inline--fa.fa-w-7 {
                width: .4375em
            }

            .svg-inline--fa.fa-w-8 {
                width: .5em
            }

            .svg-inline--fa.fa-w-9 {
                width: .5625em
            }

            .svg-inline--fa.fa-w-10 {
                width: .625em
            }

            .svg-inline--fa.fa-w-11 {
                width: .6875em
            }

            .svg-inline--fa.fa-w-12 {
                width: .75em
            }

            .svg-inline--fa.fa-w-13 {
                width: .8125em
            }

            .svg-inline--fa.fa-w-14 {
                width: .875em
            }

            .svg-inline--fa.fa-w-15 {
                width: .9375em
            }

            .svg-inline--fa.fa-w-16 {
                width: 1em
            }

            .svg-inline--fa.fa-w-17 {
                width: 1.0625em
            }

            .svg-inline--fa.fa-w-18 {
                width: 1.125em
            }

            .svg-inline--fa.fa-w-19 {
                width: 1.1875em
            }

            .svg-inline--fa.fa-w-20 {
                width: 1.25em
            }

            .svg-inline--fa.fa-pull-left {
                margin-right: .3em;
                width: auto
            }

            .svg-inline--fa.fa-pull-right {
                margin-left: .3em;
                width: auto
            }

            .svg-inline--fa.fa-border {
                height: 1.5em
            }

            .svg-inline--fa.fa-li {
                width: 2em
            }

            .svg-inline--fa.fa-fw {
                width: 1.25em
            }

        </style>
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
              <li><a class="active"><b>USERS</b></a></li>
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
    <div class="container-fluid" >
      <div class="bg-img">
          <div class="overlay"></div>
          <h1 class="h1-center">User List</h1>
          <p class="p1-center"><a href="AdminDashboard.php" style="color: orange;">Dashboard</a> / List</p> 
      </div>
    </div>


<body>
    <div class="wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="box box-primary">
                    <div class="box-body">
                        <ul class="nav nav-pills p-3 mb-3 rounded-pill align-items-center">
                            <li class="nav-item ml-auto">
                              <a href="AdminListAddUser.html" class="nav-link btn-primary rounded-pill d-flex align-items-center px-3" id="add-notes"> <i class="icon-note m-1"></i><span class="d-none d-md-block font-14">Add User</span></a>
                            </li>
                          </ul>
                        <div id="dataTables-example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dataTables-example_filter" class="dataTables_filter"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table width="100%" class="table table-hover dataTable no-footer dtr-inline"
                                        id="dataTables-example" role="grid" aria-describedby="dataTables-example_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 122px;" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 236px;"
                                                    aria-label="Email: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 55px;"
                                                    aria-label="Type: activate to sort column ascending">Unit</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 67px;"
                                                    aria-label="Status: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-example"
                                                    rowspan="1" colspan="1" style="width: 73px;"
                                                    aria-label=": activate to sort column ascending"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $userRole = $row["userRole"];
                                                    if ($userRole == "admin") {
                                                        continue;
                                                    } else {
                                                        $userId = $row["userId"];
                                                        $name = $row["userName"];
                                                        $email = $row["userEmail"];
                                                        $status = $row["paymentStatus"];
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
                                            
                                                        echo "
                                                            <tr role='row' class='odd'>
                                                                <td tabindex='0' class='sorting_1'>$name</td>
                                                                <td>$email</td>
                                                                <td>$unitBlock-$unitFloor-$unitNumber</td>
                                                                <td>$status</td>
                                                                <td class='text-right'>
                                                                <form method='post' action='AdminListEditUserStatus.php'>
                                                                    <input type='hidden' name='userId' value='$userId'></input>
                                                                    <button class='btn btn-outline-info btn-rounded'><svg
                                                                            class='svg-inline--fa fa-pen fa-w-16' aria-hidden='true'
                                                                            focusable='false' data-prefix='fas' data-icon='pen'
                                                                            role='img' xmlns='http://www.w3.org/2000/svg'
                                                                            viewBox='0 0 512 512' data-fa-i2svg=''>
                                                                            <path fill='currentColor'
                                                                                d='M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z'>
                                                                            </path>
                                                                        </svg><!-- <i class='fas fa-pen'></i> -->
                                                                    </button>
                                                                </form>
                                                                <form method='post' action='AdminListDeleteUser.php'>
                                                                    <input type='hidden' name='userId' value='$userId'></input>
                                                                    <button class='btn btn-outline-danger btn-rounded'><svg
                                                                            class='svg-inline--fa fa-trash fa-w-14' aria-hidden='true'
                                                                            focusable='false' data-prefix='fas' data-icon='trash'
                                                                            role='img' xmlns='http://www.w3.org/2000/svg'
                                                                            viewBox='0 0 448 512' data-fa-i2svg=''>
                                                                            <path fill='currentColor'
                                                                                d='M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z'>
                                                                            </path>
                                                                        </svg><!-- <i class='fas fa-trash'></i> -->
                                                                    </button>
                                                                </form>
                                                                </td>
                                                            </tr>";
                                                    }
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
    </div>
    <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50" style="bottom:0; width: 100%">
      <div class="container text-center">
        <small>Copyright &copy; Izz Condominium</small>
      </div>
    </footer>
</body>

</html>
