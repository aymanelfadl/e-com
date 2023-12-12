<?php
require "config.php"; // Include your database connection file
session_start();
$conn = db(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $userId = $_POST['user_id'];

    $removeProductQuery = "DELETE FROM panier WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $removeProductQuery);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Database error']);
    }

    mysqli_stmt_close($stmt);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
