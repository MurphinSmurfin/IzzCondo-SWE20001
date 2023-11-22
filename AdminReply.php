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

$requestId = $_POST["requestId"];


$con = mysqli_connect("localhost", "root", "", "izzcondo");
$query = "SELECT * FROM `requests` WHERE `requestId` = '$requestId'";
$result = $con->query($query);

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $userId = $row["userId"];
  }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body >
    
<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <div class="card-body p-4 p-md-5">
    
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Reply</p>
    
                <form class="mx-1 mx-md-4" method="post" action="AdminReplied.php">
                    <div class="row mb-4">
                        <div class="row">
                          <div class="form-outline">
                            <?php
                              echo "<input type='hidden' value='$userId' name='userId'></input>";
                            ?>
                            <input type="text" id="form3Example1" class="form-control" name="subject"/>
                            <label class="form-label" for="form3Example1">Subject</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-outline">
                            <textarea id="w3review" name="content" rows="4" cols="56"></textarea>
                            <label class="form-label" for="form3Example1">Content</label>
                          </div>
                        </div>
                      </div>
  
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg">Send</button>
                  </div>
  
                </form>
                <div class="text-end text-muted" style="font-size: 12px;">
                  <p> Request Form <?php echo"#$requestId";?> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

</body>
</html>
