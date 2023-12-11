<?php
require '../../../PHP/Functions.php';

$connection = connect();
$query = "SELECT Category_name FROM category";
$result = mysqli_query($connection, $query);

// Fetch categories into an array
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

// Return categories as JSON
echo json_encode($categories);
?>
