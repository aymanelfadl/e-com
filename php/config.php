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
function executeSingleValueQuery($query) {
   $conn = db();
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return reset($row); // Return the first (and only) value in the row
    } else {
        // Handle the case where the query didn't return exactly one row
        return null;
    }
}

?>