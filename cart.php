
 
 <?php 
 require "./php/config.php";
    session_start(); 
$conn = db();
  if(isset( $_SESSION['username'])){
    $username= $_SESSION['username'];}
  else{ $username=0;}

  $userQuery = "SELECT id FROM users WHERE FN = '$username'";
  $userResult = mysqli_query($conn, $userQuery);

  if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
  } else {
    // Handle the case where the user ID is not found
    echo "Error: User ID not found";

  }




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

        <script src="js/index.js" defer></script>
        

</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+212 64-277-6368</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:ProFitFuel@gmail.com">ProFitFuel@gamil.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
              <?php if($username==0){ ?>
								<div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
								<div><a href="#">Register</a></div>
								<div><a href="#">Sign in</a></div>
                <?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

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
              <div class="cart">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                      <div class="cart_icon">
                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                          <div class="cart_count"><span id="cartCount"><?php echo executeSingleValueQuery("SELECT COUNT(id_product) AS total_products FROM panier WHERE id_user = '$userId'"); ?></span></div>
                      </div>
                      <div class="cart_content">
                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                       
                      </div>
                    </div>
                  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->
        <div id="intro"><p>At <b>ProFitFuel</b>, we're dedicated to fueling your fitness journey with excellence. </p></div>
	
  </header>
  <body>
  

  
<section class="h-100 h-custom">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
            
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
            <?php
$query = "SELECT pr.* FROM panier p JOIN products pr ON p.id_product = pr.id ORDER BY `pr`.`id` ASC";
$cartResult = mysqli_query($conn, $query);
foreach ($cartResult as $row) {
?>
    <tr>
        <th scope="row">
            <div class="d-flex align-items-center">
                <img src="./product_images/<?php echo $row['image_file']; ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                <div class="flex-column ms-4">
                    <p class="mb-2" style="margin-left: 8px;"><?php echo $row['DESCREPTION']; ?></p>
                </div>
            </div>
        </th>
        <td class="align-middle">
            <p class="mb-0" style="font-weight: 500;"><?php echo $row['title']; ?></p>
        </td>
        <td class="align-middle">
            <div class="d-flex flex-row">
                <button class="btn btn-link px-2" data-product-id="<?php echo $row['id']; ?>" data-user-id="<?php echo $userId; ?>" >
                    <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="<?php echo getQuantity($userId, $row['id']); ?>" type="number" class="form-control form-control-sm" style="width: 50px;" data-product-id="<?php echo $row['id']; ?>"
                      data-user-id="<?php echo $userId; ?>" data-price-id="<?php echo $row['PRIX'];?>">

                      <button class="btn btn-link px-2" data-product-id="<?php echo $row['id']; ?>" data-user-id="<?php echo $userId; ?>">
                        <i class="fas fa-plus"></i>
                      </button>
            </div>
        </td>
        <td class="align-middle">
            <p class="mb-0" style="font-weight: 500;"><?php echo $row['PRIX']; ?> MAD</p>
        </td>
      </tr>
<?php } ?>

            </tbody>
          </table>
        </div>


        <div class="card1 shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                <form>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v"
                        value="" aria-label="..." checked />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                        Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                      </p>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                        placeholder="John Smith" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY"
                        size="7" id="exp" minlength="7" maxlength="7" />
                      <label class="form-label" for="typeExp">Expiration</label>
                    </div>
                  </div>
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                        placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                      <label class="form-label" for="typeText">Card Number</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="password" id="typeText" class="form-control form-control-lg"
                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                      <label class="form-label" for="typeText">Cvv</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Subtotal</p>
                  <p class="mb-2" id="subtotalValue"><?php echo number_format(executeSingleValueQuery("SELECT  SUM(p.quantity * pr.PRIX) AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id GROUP BY p.id_user;
"),2) . "MAD"?></p>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <p class="mb-0">20 MAD</p>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Total (tax included)</p>
                  <p class="mb-2" id="totalTax" ><?php echo number_format(executeSingleValueQuery("SELECT SUM(p.quantity * pr.PRIX) + 20 AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id GROUP BY p.id_user"), 2) ?> MAD</p>

                </div>

                <button type="button" class="btn btn-primary btn-block btn-lg" id="checkoutButton" data-user-id="<?php echo $userId ?>">
                  <div class="d-flex justify-content-between">
                    <span>Checkout</span>
                    <span style="margin-left: 8px;" id="totalValue"> <?php echo number_format(executeSingleValueQuery("SELECT SUM(p.quantity * pr.PRIX) + 20 AS total_price FROM panier p JOIN products pr ON p.id_product = pr.id GROUP BY p.id_user"), 2) ?> MAD</span>
                  </div>
                </button>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>










  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div>
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
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fa-solid fa-dumbbell"></i> ProFitFuel   
          </h6>
          <p>
              ProFiFuel is dedicated to providing high-quality gym supplements to enhance your fitness journey
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
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
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
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
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Sidi Bennoure, Fathe-10012, MR</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            ProFitFuel@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 212 64-277-6368</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ProFitFuel.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    
</body>
</html>