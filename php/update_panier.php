<?php
// Assuming you have a database connection
include 'config.php';
$conn = db();
// Get values from AJAX request
$userId = $_POST['userId'];
$action = $_POST['action'];
$productId = $_POST['productId'];
$quantity = intval($_POST['quantity']);

// Your logic to update the "panier" table
if ($action === 'add') {
    // Insert into "panier" table
    $query = "INSERT INTO panier (id_product, quantity) VALUES ('$productId', '$quantity')";
    mysqli_query($conn, $query);
} elseif ($action === 'remove') {
    // Delete from "panier" table
    $query = "DELETE FROM panier WHERE id_product = '$productId' AND id_user = '$userId'";
    mysqli_query($conn, $query);
}

// Close the database connection if needed
mysqli_close($conn);
?>
