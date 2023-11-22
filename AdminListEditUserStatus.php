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

$userId = $_POST["userId"];

$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT * FROM `users` WHERE `userId` = '$userId'";
$result = $con->query($query);

while ($row = $result->fetch_assoc()) {
  $userName = $row["userName"];
  $userPass = $row["userPass"];
  $userEmail = $row["userEmail"];
  $userRole = $row["userRole"];
  $unitId = $row["unitId"];
  $paymentStatus = $row["paymentStatus"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <script src="index.js"></script>
</head>

<body style="background-color: #eee;">

<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <div class="card-body p-4 p-md-5">
                <?php
                echo "<p class='text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4'>Edit User : $userName</p>";
                ?>

                <form class="mx-1 mx-md-4" method="post" action="AdminListEdittedUserStatus.php" onsubmit="return validateForm()">
                    <div class="row mb-4">
                        <div class="row">
                          <div class="form-outline">
                            <p>Name</p>
                            <?php
                            echo "<input type='text' id='form3Example1' class='form-control' name='name' value='$userName'/>
                            <input type='hidden' name='userId' value='$userId'></input>"
                            ?>
                            <br>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-outline">
                            <p>Password</p>
                            <?php
                            echo "<input type='text' id='form3Example1' class='form-control' name='password' value='$userPass'/>"
                            ?>
                            <br>
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-outline">
                              <p>Email</p>
                              <?php
                              echo "<input type='text' id='form3Example1' class='form-control' name='email' value='$userEmail'/>"
                              ?>
                              <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-outline">
                                <p>Role</p>
                                <?php 
                                echo"
                                <select class='form-control' id='form3Example2selectRole' name='unitRole'>";
                                    if ($userRole == "user"){
                                      echo "<option selected>user</option>
                                      <option>admin</option>";
                                    } else if ($userRole == "admin"){
                                      echo "<option selected>admin</option>
                                      <option>user</option>";
                                    }
                                echo "</select>";
                                ?>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-outline">
                                <p>Unit</p>
                                <?php 
                                echo"
                                <select class='form-control' id='form3Example2selectRole' name='unitId'>";
                                    if ($unitId == "1"){
                                      echo "
                                      <option value='1' selected>B-10-25</option>
                                      <option value='2'>A-4-18</option>
                                      <option value='3'>B-6-14</option>
                                      <option value='4'>B-13-27</option>
                                      <option value='5'>A-15-12</option>";
                                    } else if ($unitId == "2"){
                                      echo "
                                      <option value='1'>B-10-25</option>
                                      <option value='2' selected>A-4-18</option>
                                      <option value='3'>B-6-14</option>
                                      <option value='4'>B-13-27</option>
                                      <option value='5'>A-15-12</option>";
                                    } else if ($unitId == "3"){
                                      echo "
                                      <option value='1'>B-10-25</option>
                                      <option value='2'>A-4-18</option>
                                      <option value='3' selected>B-6-14</option>
                                      <option value='4'>B-13-27</option>
                                      <option value='5'>A-15-12</option>";
                                    } else if ($unitId == "4"){
                                      echo "
                                      <option value='1'>B-10-25</option>
                                      <option value='2'>A-4-18</option>
                                      <option value='3'>B-6-14</option>
                                      <option value='4' selected>B-13-27</option>
                                      <option value='5'>A-15-12</option>";
                                    } else if ($unitId == "5"){
                                      echo "
                                      <option value='1'>B-10-25</option>
                                      <option value='2'>A-4-18</option>
                                      <option value='3'>B-6-14</option>
                                      <option value='4'>B-13-27</option>
                                      <option value='5' selected>A-15-12</option>";
                                    }
                                echo "</select>";
                                ?>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-outline">
                                <p>Status</p>
                                <?php 
                                echo"
                                <select class='form-control' id='form3Example2selectRole' name='status'>";
                                    if ($paymentStatus == "paid"){
                                      echo "
                                      <option selected>paid</option>
                                      <option>unpaid</option>
                                      <option>pending</option>
                                      <option>overdue</option>
                                      ";
                                    } else if ($paymentStatus == "unpaid"){
                                      echo "
                                      <option>paid</option>
                                      <option selected>unpaid</option>
                                      <option>pending</option>
                                      <option>overdue</option>
                                      ";
                                    } else if ($paymentStatus == "pending"){
                                      echo "
                                      <option>paid</option>
                                      <option>unpaid</option>
                                      <option selected>pending</option>
                                      <option>overdue</option>
                                      ";
                                    } else if ($paymentStatus == "overdue"){
                                      echo "
                                      <option>paid</option>
                                      <option>unpaid</option>
                                      <option>pending</option>
                                      <option selected>overdue</option>
                                      ";
                                    }
                                echo "</select>";
                                ?>
                              
                            </div>
                        </div>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button class="btn btn-primary btn-lg" type="submit">Edit</button>
                      </div>


                  
  
                </form>
                
                <script>
                    function validateForm() {
                        var selectedRole = document.getElementById("form3Example2selectRole").value;
                        var selectedStatus = document.getElementById("form3Example2selectStatus").value;
                        var selectedUnit = document.getElementById("form3Example2selectUnit").value;

                        // Check if the selected role is the default value
                        if (selectedRole === "- - -") {
                            alert("Please select a valid role.");
                            return false; // Prevent form submission
                        } else if (selectedStatus === "- - -") {
                            alert("Please select a valid status.");
                            return false; // Prevent form submission
                        } else if (selectedUnit === "- - -") {
                            alert("Please select a valid unit.");
                            return false; // Prevent form submission
                        }

                        // Continue with form submission if a valid role is selected
                        return true;
                    }
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>

</html>
