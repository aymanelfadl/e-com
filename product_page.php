 
<?php
require "./php/config.php";
session_start();
$conn = db();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

// Retrieve user ID from the database
$userQuery = "SELECT id, EMAIL FROM users WHERE FN = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
    $email = $userRow['EMAIL'];
} else {
    // Handle the case where the user ID is not found
    echo "Error: User ID not found";
    exit();
}

// Handle logout if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();

    // Optionally, redirect the user to another page after logout
    header("Location: login.php"); // Change "index.php" to the desired page
    exit();
}
if (isset($_GET['id'])) {
    $productId = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to retrieve product details based on the product ID
    $productQuery ="SELECT p.*, c.Category_Name as category_name 
    FROM products p JOIN category c 
    ON p.id_category = c.id WHERE p.id = '$productId'";
    $productResult = mysqli_query($conn, $productQuery);

    // Check if the query was successful and if a product was found
    if ($productResult && mysqli_num_rows($productResult) > 0) {
        $product = mysqli_fetch_assoc($productResult);



?>





<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ProFitFuel</title>

          <script src="https://kit.fontawesome.com/aafa25b911.js" crossorigin="anonymous"></script>

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

          <!-- Font Awesome CSS -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

          <!-- jQuery -->
          
          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

          <!-- Bootstrap JS (including Popper.js) -->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>


          <link rel="stylesheet" href="css/index.css">
          <link rel="stylesheet" href="css/edit_profile.css">
          <link rel="stylesheet" href="css/cart.css">
          <link rel="stylesheet" href="css/product_page.css">

          <script src="js/index.js" defer></script>
          

  </head>
<body>
<div class="container my-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-img">
                        <img class="img-fluid" src="../product_images/<?php echo $product['image_file']; ?>" alt="<?php echo $product['title']; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="main-description px-2">
                        <div class="category text-bold">
                            Category:  <?php echo $product['category_name']; ?>
                        </div>
                        <div class="product-title text-bold my-3">
                            <?php echo $product['title']; ?>
                        </div>

                        <div class="price-area my-4">
                            <p class="new-price text-bold mb-1">Price<?php echo $product['PRIX']; ?>MAD</p>
                        </div>

                        <!-- Add more details here if needed -->
                        <div class="product-details my-4">
                            <p class="details-title text-color mb-1">Product Details</p>
                            <p class="description"><?php echo $product['DESCREPTION']; ?></p>
                        </div>
                        <!-- ... -->

                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        // Handle the case where no product was found
        echo "Product not found";
    }
} else {
    // Handle the case where the 'id' parameter is not set
    echo "Product ID not provided";
}
?>
                    <div class="buttons d-flex my-5">
                        <div class="block">
                            <button class="shadow btn custom-btn">Add to cart</button>
                        </div>
                        <div class="block quantity">
                            <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                        </div>
                        </div>
                </div>

                <div class="product-details my-4">
                    <p class="details-title text-color mb-1">Product Details</p>
                    <p class="description"><?php echo $product['DESCREPTION']; ?> </p>
                </div>
                <div class="delivery my-4">
                    <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-truck"></i></span> <b>Delivery done in 5 days from date of purchase</b> </p>
                    <p class="text-secondary">Order now to get this product delivery</p>
                </div>
                
             
            </div>
        </div>
    </div>
    </div>
    
</body>
</html>