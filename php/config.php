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

function getQuantity($userId, $productId) {
    $conn = db();

    $selectQuery = "SELECT quantity FROM panier WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultQuantity);

    if (mysqli_stmt_fetch($stmt)) {
        // The combination of id_user and id_product exists, return the quantity
        return $resultQuantity;
    } else {
        // The combination does not exist, return a default value or leave it empty
        return "";
    }

    mysqli_stmt_close($stmt);
}

function addQuantity($userId, $productId) {
    $conn = db();

    $selectQuery = "UPDATE TABLE panier SET quantity = quantity + 1 WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultQuantity);

    mysqli_stmt_close($stmt);
}



?>