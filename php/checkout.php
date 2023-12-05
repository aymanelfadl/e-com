<?php
require "config.php"; // Include your database connection file
require '../vendor/autoload.php'; // Include PHPMailer autoload
session_start();
$conn = db();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure that this script is accessed via a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the POST data
    $userId = $_POST['user_id'];

    // Create a new order
    $orderStatus = 'Pending';
    $orderDate = date('Y-m-d'); // Today's date
    $deliveryDate = date('Y-m-d', strtotime('+5 days')); // Today's date + 5 days

    // Insert order into the orders table
    $insertOrderQuery = "INSERT INTO orders (id_user, STATUS, ordate, diliverdate) VALUES ('$userId', '$orderStatus', '$orderDate', '$deliveryDate')";
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

    // Send email
    $mail = new PHPMailer(true);

    try {
        $stmt = $conn->prepare("SELECT EMAIL, USERNAME FROM users WHERE id = '$userId'");
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'irooonside@gmail.com';
            $mail->Password   = 'dqnv wuqd jtxf faxm';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('irooonside@gmail.com', 'ProFitFuel');
            $mail->addAddress($user['EMAIL'], 'Recipient Name');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Order Confirmation';

            // Customize the email body for a more detailed order confirmation
            $orderConfirmation = "
                <p><strong>Dear {$user['USERNAME']},</strong></p>
                
                <p>Thank you for your order with ProFitFuel! Your order (ID: {$orderId}) has been successfully placed and processed.</p>
                <p>Best regards,<b><br>ProFitFuel Team</b></p>
            ";

            $mail->Body    = $orderConfirmation;
            // Send the email
            $mail->send();
            echo 'Email sent successfully to ' . $user['EMAIL'];
        } else {
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
