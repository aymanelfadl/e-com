<?php
// Include the necessary configuration and database connection files
include "config.php";
session_start();
$conn = db();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Handle the case where the user is not logged in
    echo "Error: User not logged in";
    exit();
}

// Retrieve user ID from the database
$username = $_SESSION['username'];
$userQuery = "SELECT id FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
} else {
    // Handle the case where the user ID is not found
    echo "Error: User ID not found";
    exit();
}

// Check if the form was submitted

    // Retrieve form data
    $newFirstName = mysqli_real_escape_string($conn, $_POST['newFirstName']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['newLastName']);
    $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

    // Update user information in the database
    $updateQuery = "UPDATE users SET FN = '$newFirstName', LN = '$newLastName', USERNAME = '$newUsername', EMAIL = '$newEmail', PASSWORD_USER = '$newPassword' WHERE id = '$userId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $_SESSION['username'] = $newUsername;

        echo "Profile updated successfully!";
        // You can redirect the user to another page if needed
        // header("Location: index.php");
    } else {
        // Handle the case where the update fails
        echo "Error updating profile: " . mysqli_error($conn);
    }

?>
