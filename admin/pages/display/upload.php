<?php
require '../../../PHP/Functions.php';

$connection = connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Sanitize and retrieve form inputs
    $title = $_POST['title'];
    $des =  $_POST['descreption'];
    $price = (float)$_POST['price'];
    $qt = (int)$_POST['quantity'];
    $pid = (int)$_POST['pid'];
    $selectedCategory = $_POST['category'];

    // Validate and retrieve category ID
    $id_category = getidbycate($selectedCategory);

    // Update product information query
    $updateProductQuery = "UPDATE products 
                            SET title = '$title', 
                                DESCREPTION = '$des',
                                PRIX = $price, 
                                id_category = $id_category, 
                                Quantity = $qt 
                            WHERE id = '$pid'";

    // Execute the product information update query
    if (mysqli_query($connection, $updateProductQuery)) {
        echo "Product information update successful!";
    } else {
        echo "Error updating product information: " . mysqli_error($connection);
    }

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];

        // Check file type and size before moving
        if ($_FILES['image']['size'] > 5000000) { // 5MB limit
            echo "File is too large. Please choose a smaller file.";
        } else {
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            if (!in_array(strtolower($fileExtension), $allowedTypes)) {
                echo "Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.";
            } else {
                $imagePath = '../../../product_images/' . $image; // Set the path where you want to store the uploaded image

                // Move the uploaded image to the specified directory
                if (move_uploaded_file($tempImage, $imagePath)) {
                    $updateQuery = "UPDATE products SET image_file = '$image' WHERE id = '$pid'";

                    // Execute the update query
                    if (mysqli_query($connection, $updateQuery)) {
                        echo "Update successful!";
                    } else {
                        echo "Error updating record: " . mysqli_error($connection);
                    }
                } else {
                    echo "Failed to upload image.";
                }
            }
        }
    } else {
        echo "Please select an image file.";
    }
}
?>
