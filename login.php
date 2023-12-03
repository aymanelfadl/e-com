
<?php
// Your PHP code goes here

function db() {
    $host = "localhost:3306";
    $username = "root";
    $password = "";
    $db = "store";

    // Create connection
    $conn = new mysqli($host, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
$conn=db();


    //*********************************************/

    if (isset($_POST['username']) && isset($_POST['password'])) {
    

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
    
        
        $sql = "SELECT * FROM users WHERE username = '$username' AND password_user = '$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //
            
            $is_admin = $row['IS_ADMIN'];
            session_start(); 
            

        if($is_admin==0){

           
        
                $_SESSION['username'] = $username;

          header("Location: index.php");

            }
            else{

                $_SESSION['username'] = $username;


                header("Location: admin\dash.php");

            }

    
    
    
        
         
         
         
           
        } 
        
    }
    
    // Close the database connection
    $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProFitFuel</title>
    <script src="https://kit.fontawesome.com/aafa25b911.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS (including Popper.js) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./css/login.css">

</head>
<body>
<div style="color: white; padding: 30px; border-radius: 5px; width:100%; height:40px;">
                  <h1 style="text-align: center; margin-right:10px;">
                  Welcome To ProFitFuel 
                  </h1>
          </div>
<div class="container" >
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fs-5">Sign In</h3>
            <form action="login.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username" style="padding:10px;">
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password"  style="padding:10px;">
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" style="width: 340px;margin-bottom:15px">
                  Sign in
                </button>
              </div>
            </form>
            <a href="signup.php">
    <button class="btn btn-primary btn-login text-uppercase fw-bold" style="width: 340px;"> Sign up </button>
</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
        
 


</body>
</html>