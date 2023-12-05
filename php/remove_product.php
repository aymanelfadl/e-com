<?php
require "config.php"; // Include your database connection file
session_start();
$conn = db(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $userId = $_POST['user_id'];

    // Use prepared statements to prevent SQL injection
    $removeProductQuery = "DELETE FROM panier WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $removeProductQuery);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
    
    // Perform the removal from the panier
    if (mysqli_stmt_execute($stmt)) {
        // You can also perform additional logic here if needed

        // Return a response (optional)
        echo json_encode(['success' => true]);
    } else {
        // Handle database error
        echo json_encode(['error' => 'Database error']);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
