<?php

include "./config.php";

$conn = db();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user and product IDs from the POST data
    $userId = $_POST["userId"];
    $productId = $_POST["productId"];
    $decrement = isset($_POST["decrement"]) && $_POST["decrement"] === "true";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $updateQuery = "UPDATE panier SET quantity = quantity " . ($decrement ? "- 1" : "+ 1") . " WHERE id_user = ? AND id_product = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        if ($success) {
            // Update successful
            echo "Quantity updated successfully!";
        } else {
            // Update failed
            echo "Error updating quantity.";
        }
    } else {
        // Statement preparation failed
        echo "Error preparing statement.";
    }

    mysqli_close($conn);
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
