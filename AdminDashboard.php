<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Home Page</title>
    
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Add custom CSS if needed -->
    <!-- <link rel="stylesheet" href="custom.css"> -->
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h2>Admin Dashboard</h2>
    <a href="#">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Products</a>
    <a href="#">Settings</a>
</div>

<!-- Content -->

<div class="content">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Update/Edit Tenant Information</p>
</div>

<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Name</th>
        <th>Unit</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $con = mysqli_connect("localhost","root","","izzcondo");

      $query = "SELECT * FROM `users` WHERE `userRole` = 'user'";
      $result = $con->query($query);

      if ($result->num_rows > 0){      
        while($row = $result->fetch_assoc()){
          $unitId = $row["unitId"];
          $unitQuery = "SELECT * FROM `units` WHERE `unitID` = '$unitId'";
          $unitResult = $con->query($unitQuery);
          $unitRow = $unitResult->fetch_assoc();

          echo "
          <tr>
            <td>
              <div class='d-flex align-items-center'>
                
                <div class='ms-3'>
                  <p class='fw-bold mb-1'>" . $row["userName"] . "</p>
                  <p class='text-muted mb-0'>". $row["userEmail"] ."</p>
                </div>
              </div>
            </td>
            <td>
              <p class='fw-normal mb-1'>Block ". $unitRow["unitBlock"] ."</p>
              <p class='text-muted mb-0'>" . $unitRow["unitBlock"] . "-" . $unitRow["unitFloor"] . "-" . $unitRow["unitNumber"] ."</p>
            </td>";
            if ($row["paymentStatus"] == "paid"){
              echo "
              <td>
                <span class='badge badge-primary rounded-pill d-inline' style='background-color:green;'>Paid</span>
              </td>";
            } elseif ($row["paymentStatus"] == "unpaid"){
              echo "
              <td>
                <span class='badge badge-primary rounded-pill d-inline' style='background-color:orange;'>Unpaid</span>
              </td>";
            } elseif ($row["paymentStatus"] == "pending"){
              echo "
              <td>
                <span class='badge badge-primary rounded-pill d-inline' style='background-color:darkblue;'>Pending</span>
              </td>";
            } elseif ($row["paymentStatus"] == "overdue"){
              echo "
              <td>
                <span class='badge badge-primary rounded-pill d-inline' style='background-color:red;'>Overdue</span>
              </td>";
            }
            echo "<td>
              <button type='button' class='btn btn-link btn-rounded btn-sm fw-bold' data-mdb-ripple-color='dark'>
                Edit
              </button>
            </td>
          </tr>
          ";
        }
      } // 107.5.32.0/19
      ?>
    </tbody>
  </table>

<footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50" style="position: fixed; bottom: 0; width: 100%;">
    <div class="container text-center">
      <small>Copyright &copy; Your Website</small>
    </div>
</footer>
<!-- Add Bootstrap JavaScript and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).mousemove(function (e) {
            // Define the left boundary for showing the sidebar (e.g., 50px from the left edge)
            const leftBoundary = 50;

            // Check if the mouse cursor is within the defined left boundary
            if (e.pageX <= leftBoundary) {
                // Show the sidebar
                $("#sidebar").addClass("active");
                $(".content").addClass("active");
            } else {
                // Hide the sidebar
                $("#sidebar").removeClass("active");
                $(".content").removeClass("active");
            }
        });
    });
</script>
</body>
</html>
