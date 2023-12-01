<?php
function db() {
    $host = "localhost:3306";
    $username = "root";
    $password = "";
    $db = "store";

    $conn = new mysqli($host, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

$searchTerm = $_GET['term'] ?? '';

$search_query = "SELECT * FROM products WHERE title LIKE '%$searchTerm%'";
$result = mysqli_query(db(), $search_query);

$products = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

echo json_encode($products);
?>
