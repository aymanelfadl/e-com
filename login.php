
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
    <title>Document</title>
</head>
<body>
    <div>
    <form action="login.php" method="POST">

<h1>Login</h1>
<div class="content">
  
  <div class="input-field">
    <input type="text" placeholder="Username" autocomplete="nope" name="username">
  </div>
  <div class="input-field">
    <input  name="password"  type="password" placeholder="Password" autocomplete="new-password">
  </div>
  <a href="#" class="link">Forgot Your Password?</a>
</div>
<div class="action">
  <button class="btn" type="submit">Log in</button>

</div>
</form>
        
 


</body>
</html>