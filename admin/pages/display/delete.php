<?php
require '../../../PHP/Functions.php';

$connection = connect();
// Retrieve the variable sent via POST
if(isset($_POST['id'])) {
    $id = $_POST['id']; // Ensure variable name matches what you're sending

    $deleteQuery = "DELETE FROM products  WHERE id = '$id'"; // Use $id here, not $pid

    // Execute the delete query
    if (mysqli_query($connection, $deleteQuery)) {
        echo "Delete successful!";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    echo "No variable passed";
}

?>
