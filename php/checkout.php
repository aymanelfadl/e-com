<?php
require "config.php"; // Include your database connection file
session_start();

// Ensure that this script is accessed via a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the POST data
    $userId = $_POST['user_id'];

    // Create a new order
    $orderStatus = 'Pending';
    $orderDate = date('Y-m-d'); // Today's date
    $deliveryDate = date('Y-m-d', strtotime('+5 days')); // Today's date + 5 days

    $conn = db(); // Assuming db() is a function that returns the database connection

    // Insert order into the orders table
    $insertOrderQuery = "INSERT INTO orders (id_user, STATUS, ordate, diliverdate) VALUES
     ('$userId', '$orderStatus', '$orderDate', '$deliveryDate')";
    mysqli_query($conn, $insertOrderQuery);

    // Get the ID of the newly inserted order
    $orderId = mysqli_insert_id($conn);

    // Move items from panier to order_products
    $moveItemsQuery = "INSERT INTO order_product (id_order, id_product, quantity) SELECT '$orderId', id_product, quantity FROM panier WHERE id_user = '$userId'";
    mysqli_query($conn, $moveItemsQuery);

    // Clear the panier for the user
    $clearPanierQuery = "DELETE FROM panier WHERE id_user = '$userId'";
    mysqli_query($conn, $clearPanierQuery);

    // Return a response (optional)
    echo json_encode(['message' => 'Checkout successful']);

} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
