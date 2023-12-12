<?php
include "config.php";
session_start();
$conn = db();

if (!isset($_SESSION['username'])) {
    echo "Error: User not logged in";
    exit();
}

$username = $_SESSION['username'];
$userQuery = "SELECT id FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
} else {
    echo "Error: User ID not found";
    exit();
}

    $newFirstName = mysqli_real_escape_string($conn, $_POST['newFirstName']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['newLastName']);
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

    $updateQuery = "UPDATE users SET FN = '$newFirstName', LN = '$newLastName', USERNAME = '$newUsername', EMAIL = '$newEmail', PASSWORD_USER = '$newPassword' WHERE id = '$userId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $_SESSION['username'] = $newUsername;

        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

?>
