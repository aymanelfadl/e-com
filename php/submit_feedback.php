<?php
require '../vendor/autoload.php';
require "config.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = db();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

$userQuery = "SELECT id, EMAIL FROM users WHERE USERNAME = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $userRow = $result->fetch_assoc();
    $userId = $userRow['id'];
    $email = $userRow['EMAIL'];
} else {
    echo json_encode(['error' => 'User ID not found']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = isset($_POST["feedback"]) ? htmlspecialchars($_POST["feedback"]) : '';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'irooonside@gmail.com';
        $mail->Password   = 'dqnv wuqd jtxf faxm';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('irooonside@gmail.com', 'ProFitFuel');
        $mail->addAddress('irooonside@gmail.com', 'ProFitFuel');

        $mail->isHTML(true);
        $mail->Subject = 'Feedback From ' . $username;
        $mail->Body    = $feedback;
        $mail->send();

        echo json_encode(['success' => 'Email sent successfully']);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
