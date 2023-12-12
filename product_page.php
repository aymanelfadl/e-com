 
<?php
require "./php/config.php";
session_start();
$conn = db();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

$userQuery = "SELECT id, EMAIL FROM users WHERE USERNAME     = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
    $email = $userRow['EMAIL'];
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();

    header("Location: login.php");
    exit();
}
if (isset($_GET['id'])) {
    $productId = mysqli_real_escape_string($conn, $_GET['id']);

    $productQuery ="SELECT p.*, c.Category_Name as category_name 
    FROM products p JOIN category c 
    ON p.id_category = c.id WHERE p.id = '$productId'";
    $productResult = mysqli_query($conn, $productQuery);

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

          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

          
          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>


          <link rel="stylesheet" href="css/index.css">
          <link rel="stylesheet" href="css/edit_profile.css">
          <link rel="stylesheet" href="css/cart.css">
          <link rel="stylesheet" href="css/product_page.css">

          <script src="js/index.js" defer></script>
          

  </head>
<body>

<header class="header" >


<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+212 64-277-6368</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:ProFitFuel@gmail.com">ProFitFuel@gamil.com</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_user">
      <?php if($username == 0) { ?>
<div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
<div style="display: inline-block; margin-top: 10px;"><a href="signup.php">Register</a></div>
<div style="display: inline-block; margin-top: 10px;"><a href="login.php">Sign in</a></div>
<?php } else { ?>
<div style="display: inline-block;">
<button type="button" id="editProfileBtn" class="btn btn-light" style="margin-top: 10px;">Edit Profile</button>
</div>
<form method="post" style="display: inline-block;">
<button type="submit" class="btn btn-light" style="margin-top: 10px;" name="logout">Log-Out</button>
</form>
<script>
document.getElementById('editProfileBtn').addEventListener('click', function() {
var editProfileSection = document.getElementById('editProfileSection');
editProfileSection.style.display = 'block';
});
</script>

<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>


<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="index.php">ProFitFuel</a></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
        <form action="#" class="header_search_form clearfix" id="searchForm">
<input type="search" required="required" class="header_search_input" id="searchInput" placeholder="Search for products...">
<button type="button" class="header_search_button trans_300" id="searchButton">
<img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt="">
</button>
</form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <!-- Cart -->
                <?php if($username!=0){ ?>

                  <div class="cart">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                      <div class="cart_icon">
                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                          <div class="cart_count"><span id="cartCount"><?php echo executeSingleValueQuery("SELECT COUNT(id_product) AS total_products FROM panier WHERE id_user = '$userId'"); ?></span></div>
                      </div>
                      <div class="cart_content">
                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                        <div class="cart_price"><span id="cartPrice"><?php echo executeSingleValueQuery("SELECT  SUM(p.quantity * pr.PRIX) AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id GROUP BY p.id_user;
"); ?></span> MAD</div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

              </div>
            </div>
        </div>
    </div>
</div>

<div id="intro"><p>At <b>ProFitFuel</b>, we're dedicated to fueling your fitness journey with excellence. </p></div>
<?php if ($username == 0): ?>
        <div id="signupAlert" class="alert alert-warning" role="alert" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 10px; border-radius: 5px; width: 600px; text-align: center; z-index: 1000;">
            You need to sign up to add items to your cart. Please <b>sign up first.</b>
        </div>
    <?php endif; ?>
</header>







<!-- =============================================================================================================== -->
<div class="container my-5" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);padding:20px;">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-img">
                        <img class="img-fluid" src="./product_images/<?php echo $product['image_file']; ?>" alt="<?php echo $product['title']; ?>">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="main-description px-2">
                        <div class="category text-bold" style="margin-top: 10px;">
                          <b>  Category: </b> <p><?php echo $product['category_name']; ?></p>
                        </div>
                        <div class="product-title text-bold my-3">
                            <h2><?php echo $product['title']; ?></h2>
                        </div>

                        <div class="price-area my-4">
                            <p class="new-price text-bold mb-1"><b>Price:</b> <h5><?php echo $product['PRIX']; ?><b> MAD</b> </h5></p>
                        </div>
                        <div class="product-details my-4">
                            <p class="details-title text-color mb-1"><b>Product Details :</b></p>
                            <p class="description"><?php echo $product['DESCREPTION']; ?></p>
                        </div>
                        <div class="buttons d-flex my-5">
      <button class="buyNowButton btn btn-primary" style="padding: 16px; width:300px;"
                data-product-id="<?php echo $product['id']; ?>"
                data-price="<?php echo $product['PRIX'];?>"
                data-user-id="<?php echo $userId; ?>"
                <?php if ($username == 0) { echo 'onclick="showSignUpMessage();"'; } ?>>
            Add to Cart
        </button>
</div>

                        </div>
                </div>
                <div class="delivery my-4" >
                    <h4 class="font-weight-bold mb-0"  style=" max-width: 50%; text-align: justify; margin-left:25%;color:#3498db"><span>
                    <i class="fa-solid fa-truck"></i></span>
                     Rapid Arrival Guarantee : </h4>
                    <p class="text-secondary" style=" max-width: 50%; text-align: justify; margin-left:25%;margin-top:10px"> Order now and experience the thrill of swift delivery! Purchase today, and 
                        your product will be at your doorstep within just 5 days from the date of purchase. Don't miss out on this
                         opportunity – secure your order now to enjoy the convenience of speedy delivery!
                    </p>
                </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

<?php
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID not provided";
}
?>
        


    <!-- ================================footer========================================================================== -->
    
    <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <div >
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </section>
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
            <i class="fa-solid fa-dumbbell"></i> ProFitFuel   
            </h6>
            <p>
                ProFiFuel is dedicated to providing high-quality gym supplements to enhance your fitness journey
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Protein Supplements</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Pre-Workout Boosters</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Hydration and Electrolytes</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vitamins and Minerals</a>
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Sidi Bennoure, Fathe-10012, MR</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              ProFitFuel@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 212 64-277-6368</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ProFitFuel.com</a>
    </div>
  </footer>
      
</body>
</html>