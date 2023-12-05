<?php
require "config.php";

session_start();

$conn = db();


$username = isset($_SESSION['username']) ? $_SESSION['username'] : 0;

$userQuery = "SELECT id FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];

    $subtotal = executeSingleValueQuery("SELECT SUM(p.quantity * pr.PRIX) AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id WHERE p.id_user = $userId GROUP BY p.id_user");
    echo number_format($subtotal, 2) . " MAD";
} else {
    echo "Error: User ID not found";
}

mysqli_close($conn);
?>
