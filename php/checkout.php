<?php
require "config.php"; 
require '../vendor/autoload.php'; 
session_start();
$conn = db();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];

    
    $orderStatus = 'Pending';
    $orderDate = date('Y-m-d'); 
    $deliveryDate = date('Y-m-d', strtotime('+5 days')); 

    
    $insertOrderQuery = "INSERT INTO orders (id_user, STATUS, ordate, dilivredate) VALUES ('$userId', '$orderStatus', '$orderDate', '$deliveryDate')";
    mysqli_query($conn, $insertOrderQuery);

    
    $orderId = mysqli_insert_id($conn);

    $moveItemsQuery = "INSERT INTO order_product (id_order, id_product, quantity) SELECT '$orderId', id_product, quantity FROM panier WHERE id_user = '$userId'";
    mysqli_query($conn, $moveItemsQuery);

    $panierItemsQuery = "SELECT id_product, quantity FROM panier WHERE id_user = '$userId'";
    $panierItemsResult = mysqli_query($conn, $panierItemsQuery);

    while ($panierItem = mysqli_fetch_assoc($panierItemsResult)) {
        $productId = $panierItem['id_product'];
        $quantity = $panierItem['quantity'];

        $updateProductQuery = "UPDATE products SET Quantity = Quantity - $quantity WHERE id = $productId";
        mysqli_query($conn, $updateProductQuery);
    }

    
    $clearPanierQuery = "DELETE FROM panier WHERE id_user = '$userId'";
    mysqli_query($conn, $clearPanierQuery);

  
    echo json_encode(['message' => 'Checkout successful']);

    
    $mail = new PHPMailer(true);

    try {
        $stmt = $conn->prepare("SELECT EMAIL, USERNAME FROM users WHERE id = ?");
        $stmt->bind_param('i', $userId);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $orderProductsQuery = "SELECT op.*, p.title, p.PRIX FROM order_product op
            INNER JOIN products p ON op.id_product = p.id
            WHERE op.id_order = ?";
            $orderProductsStatement = $conn->prepare($orderProductsQuery);
            $orderProductsStatement->bind_param('i', $orderId);
            $orderProductsStatement->execute();
            $orderProductsResult = $orderProductsStatement->get_result();

            if ($orderProductsResult) {
                $totalBill = 0;
                $orderProducts = $orderProductsResult->fetch_all(MYSQLI_ASSOC);
                foreach ($orderProducts as $product) {
                    $totalBill += $product['quantity'] * $product['PRIX'];
                }
            
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'irooonside@gmail.com';
            $mail->Password   = 'dqnv wuqd jtxf faxm';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            
            $mail->setFrom('irooonside@gmail.com', 'ProFitFuel');
            $mail->addAddress($user['EMAIL'], 'Recipient Name');

            
            $mail->isHTML(true);
            $mail->Subject = 'Order Confirmation';


            $orderConfirmation = "
            <p><strong>Dear {$user['USERNAME']},</strong></p>
            
            <p>Thank you for your order with ProFitFuel! Your order (ID: {$orderId}) has been successfully placed and processed.</p>
            
            <p><strong>Order Details:</strong></p>
            <ul>";
        
        foreach ($orderProducts as $product) {
            $orderConfirmation .= "<li><b>{$product['title']}</b> - <b>Quantity:</b> {$product['quantity']} - <b>Price: </b>{$product['PRIX']}</li>";
        }
        $totalBill += 20;
        $orderConfirmation .= "</ul>
                              <p><strong>Total Bill: {$totalBill}</strong></p>
                              <p>Best regards,<b><br>ProFitFuel Team</b></p>
        ";

        $mail->Body = $orderConfirmation;

        $mail->send();
        echo 'Email sent successfully to ' . $user['EMAIL'];
    }
        }
        else {
            echo 'User not found.';
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } catch (mysqli_sql_exception $e) {
        echo "Database Error: " . $e->getMessage();
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
