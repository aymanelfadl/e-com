<?php
require '../../../PHP/Functions.php';

$connection = connect();

if(isset($_POST['cate'])) {
    $cate = $_POST['cate'];

    // Prepared statement to insert category safely
    $insertQuery = "INSERT INTO category (Category_name) VALUES (?)";
    $stmt = mysqli_prepare($connection, $insertQuery);

    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, 's', $cate);

    if (mysqli_stmt_execute($stmt)) {
        echo "Inserted successfully!";
    } else {
        echo "Error inserting record: " . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "No variable passed";
}

// Close the connection
mysqli_close($connection);
?>
