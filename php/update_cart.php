<?php
include "config.php";
   
$conn=db();
    
    $userId = $_POST['user_id'];
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    



    // Perform the SQL INSERT operation (using prepared statements)
    $insertQuery = "INSERT INTO panier (id_user, id_product, quantity) VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "iii", $userId, $productId, $quantity);
    $insertResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);




    if ($insertResult) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conn);
    }

   

?>


    

