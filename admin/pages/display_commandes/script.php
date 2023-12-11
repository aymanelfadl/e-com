<?php

require '../../../PHP/Functions.php';
 
if(isset($_POST['category']) && isset($_POST['id'])){
    $category = $_POST['category'];
    $id = $_POST['id'];
    $conn = connect();
    $updateQuery = "UPDATE orders SET STATUS = '$category' WHERE id = $id";

    if ($conn->query($updateQuery) === TRUE) {
        $icon = executeSingleValueQuery("SELECT icon FROM icon_order WHERE status='$category'");
        echo json_encode(array("icon" => $icon)); // Send only JSON data
    } else {
        echo json_encode(array("error" => "Error updating record: " . $conn->error)); // Send only JSON data
    }

    // Close the connection
    $conn->close();
}
?>
