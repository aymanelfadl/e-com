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
            echo "Data inserted successfully!";
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
    <title>Document</title>
</head>
<body>
    <div>
    <form action="signup.php" method="POST">

<h1>SIGN UP</h1>
<input type="text" placeholder="YOU FIRST NAME" autocomplete="nope" name="FN">
<input type="text" placeholder="last name" autocomplete="nope" name="LN">
<input type="text" placeholder="username" autocomplete="nope" name="username">
<input type="EMAIL" placeholder="Uemail" autocomplete="nope" name="EMAIL">


  
    <input  name="password"  type="password" placeholder="Password" autocomplete="new-password">
  
  <a href="login.php" class="link">YOU HAVE ALREADY AN ACCOUNT</a>


  <button class="btn" type="submit">Sign up </button>


</form>
        
 

    
</body>
</html>
