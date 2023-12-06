<?php 
include "config.php";

$conn = db();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $orderID = isset($_POST['orderID']) ? intval($_POST['orderID']) : 0;

    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $orderID);

    if ($stmt->execute()) {
        echo "Order canceled successfully";
    } else {
        echo "Error canceling order: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}


?>