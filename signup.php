<?php

function db() {
    $host = "localhost:3306";
    $username = "root";
    $password = "";
    $db = "store";

    
    $conn = new mysqli($host, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
$conn = db();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['FN']) && isset($_POST['LN']) && isset($_POST['EMAIL'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['FN'];
    $lastName = $_POST['LN'];
    $email = $_POST['EMAIL'];

    $sql = "INSERT INTO users (FN, LN, USERNAME, EMAIL, PASSWORD_USER) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssss", $firstName, $lastName, $username, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
          header("Location: login.php");
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Statement preparation error: " . $conn->error;
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProFitFuel</title>
    <script src="https://kit.fontawesome.com/aafa25b911.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./css/login.css">

</head>
<body>
<div style="color: white; padding: 30px; border-radius: 5px; width:100%; height:40px;">
                  <h1 style="text-align: center; margin-right:10px;">
                  Welcome To ProFitFuel 
                  </h1>
          </div>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h3>
            <form action="signup.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="FN" id="floatingInput" placeholder="First Name" style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="LN" id="floatingPassword" placeholder="Last Name"  style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingPassword" placeholder="Username"  style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="EMAIL" id="floatingPassword" placeholder="Email"  style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control"  name="password" placeholder="Password" id="floatingPassword" style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                    <a href="login.php" class="link" style="text-decoration: none;text-align: center; color:royalblue">YOU HAVE ALREADY AN ACCOUNT</a>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" style="width: 340px;">
                  Sign up
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 

    
</body>
</html>
