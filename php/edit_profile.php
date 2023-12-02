<?php 
require "config.php";
session_start();
$conn = db();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

// Retrieve user ID from the database
$userQuery = "SELECT id FROM users WHERE FN = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
} else {
    // Handle the case where the user ID is not found
    echo "Error: User ID not found";
    exit();
}

    // Get new information from the form
    $newFirstName = mysqli_real_escape_string($conn, $_POST['newFirstName']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['newLastName']);
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

    // Update user information in the database
    $updateQuery = "UPDATE users SET FN = '$newFirstName', LN = '$newLastName', USERNAME = '$newUsername', EMAIL = '$newEmail', PASSWORD_USER = '$newPassword' WHERE id = '$userId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Update successful
        echo "Profile updated successfully!";
        header("Location: index.php");
    } else {
        // Handle the case where the update fails
        echo "Error updating profile: " . mysqli_error($conn);
    }





?>