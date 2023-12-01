<?php


// Assuming you have the username stored in the session
$username = $_SESSION['username'];

// Retrieve the user ID based on the username
$userQuery = "SELECT id FROM users WHERE FN = '$username'";
$userResult = mysqli_query(db(), $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
} else {
    // Handle the case where the user ID is not found
    echo "Error: User ID not found";
    exit();
}


$all_products_query = "SELECT * FROM products";
$result = mysqli_query(db(), $all_products_query);

$count = 0;
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each product in a table cell
        ?>
   <td>
    <div class="card" data-price="<?php echo $row['PRIX']; ?>" data-product-id="<?php echo $row['id']?>">
        <img src="../product_images/<?php echo $row['image_file']; ?>" alt="<?php echo $row['image_file']; ?>" style="width:100%">
        <h2><?php echo $row['title']; ?></h2>
        <p class="PRIX"><b><?php echo $row['PRIX']; ?> MAD</b></p>
        <p><?php echo $row['DESCREPTION']; ?></p>
        <p>
            <button class="addToCartButton" 
                    data-product-id="<?php echo $row['id']; ?>"
                    data-user-id="<?php echo $userId; ?>">Add to Cart</button>
        </p>
    </div>
</td>

        <?php
        $count++;

        // Start a new row after every fourth product
        if ($count % 4 === 0) {
            echo '</tr><tr>';
        }
    }
} else {
    echo "<td colspan='4'>No products found</td>";
}
?>
