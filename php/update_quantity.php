<?php

include "config.php";

$userId = $_POST['userId'];
$productId = $_POST['productId'];


$conn = db();

$updateQuery = "UPDATE panier SET quantity = quantity + 1 WHERE id_user = ? AND id_product = ?";
$stmt = mysqli_prepare($conn, $updateQuery);
mysqli_stmt_bind_param($stmt, "iii", $newQuantity, $userId, $productId);

if (mysqli_stmt_execute($stmt)) {
    // The update was successful
    echo "Success";
} else {
    // The update failed
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
