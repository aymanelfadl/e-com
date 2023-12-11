<?php

require '../../../PHP/Functions.php';
 

session_start();
if (isset($_SESSION['username'])) {
    // Redirect to another page
	$user=$_SESSION['username'];
}






 

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/jpeg" href="../../../gym.jpeg"/>

    <meta charset="UTF-8">
    <title>All Products </title>
	<link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../../style.css"> <!-- Link to your CSS file -->
     <!-- Link to your CSS file -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


</head>
<body>
  
  <div class="dashboard">
	<aside class="search-wrap">
		<div class="search">
		<label for="search">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input type="text" id="search">
			</label>
		
		</div>
		
		<div class="user-actions">
			
			<button>
			<a href="../../../index.php">
				
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 21c4.411 0 8-3.589 8-8 0-3.35-2.072-6.221-5-7.411v2.223A6 6 0 0 1 18 13c0 3.309-2.691 6-6 6s-6-2.691-6-6a5.999 5.999 0 0 1 3-5.188V5.589C6.072 6.779 4 9.65 4 13c0 4.411 3.589 8 8 8z"/><path d="M11 2h2v10h-2z"/></svg>
	</a>				</button>
		</div>
	</aside>
	
	<header class="menu-wrap">
		<figure class="user">
			<div class="user-avatar">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
			</div>
			<figcaption>
				<?php  echo $user ?>
			</figcaption>
		</figure>
	
        <nav>
			<section class="dicover">
				<h3>Discover</h3>
				
				<ul>
				<li>
						<a href="../../dash.php">
						<svg width="24" height="24"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a,.b{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.a{fill-rule:evenodd;}</style></defs><path class="a" d="M2,2V20a2,2,0,0,0,2,2H22"></path><rect class="b" height="6" rx="1.5" width="3" x="6" y="12"></rect><rect class="b" height="6" rx="1.5" width="3" x="12" y="7"></rect><rect class="b" height="6" rx="1.5" width="3" x="18" y="3"></rect></g></svg>
						Dashboard
						</a>
					</li>
					<li>
						<a href="..\add-number\add.php">
						<svg width="24" height="24" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.0009 21.3201H8.43094C7.33237 21.2923 6.27951 20.8746 5.4606 20.1418C4.64169 19.409 4.11011 18.4088 3.96094 17.3201L2.96094 9.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9992 9.32007L20.6992 11.8201" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M3 9.32004C8.81444 7.20973 15.1856 7.20973 21 9.32004" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.42969 8.34006L9.07969 3.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.5699 8.34006L14.9199 3.32007" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 22.8201V14.8201" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15 18.8201H23" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>	Add a new Product
						</a>
					</li>
					
					<li>
						<a href="..\display\display.php">
						<svg width="24" height="24" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="0" fill="none" width="20" height="20"></rect> <g> <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5 .71 0 1.39.15 2 .42.61-.27 1.29-.42 2-.42 2.76 0 5 2.24 5 5v2zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6zm10 2V6c0-1.65-1.35-3-3-3h-.02c.63.84 1.02 1.87 1.02 3v2h2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22z"></path> </g> </g></svg>
                       	All Products</a>
					</li>
					<li>
						<a href="..\display_commandes\display.php">
						<svg  width="24" height="24" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>shipping</title> <path d="M16.722 21.863c-0.456-0.432-0.988-0.764-1.569-0.971l-1.218-4.743 14.506-4.058 1.554 6.056-13.273 3.716zM12.104 9.019l9.671-2.705 1.555 6.058-9.67 2.705-1.556-6.058zM12.538 20.801c-0.27 0.076-0.521 0.184-0.765 0.303l-4.264-16.615h-1.604c-0.161 0.351-0.498 0.598-0.896 0.598h-2.002c-0.553 0-1.001-0.469-1.001-1.046s0.448-1.045 1.001-1.045h2.002c0.336 0 0.618 0.184 0.8 0.447h3.080v0.051l0.046-0.014 4.41 17.183c-0.269 0.025-0.538 0.064-0.807 0.138zM12.797 21.811c1.869-0.523 3.79 0.635 4.291 2.588 0.501 1.951-0.608 3.957-2.478 4.48-1.869 0.521-3.79-0.637-4.291-2.588s0.609-3.957 2.478-4.48zM12.27 25.814c0.214 0.836 1.038 1.332 1.839 1.107s1.276-1.084 1.062-1.92c-0.214-0.836-1.038-1.332-1.839-1.109-0.802 0.225-1.277 1.085-1.062 1.922zM29.87 21.701l-11.684 3.268c-0.021-0.279-0.060-0.561-0.132-0.842-0.071-0.281-0.174-0.545-0.289-0.799l11.623-3.25 0.482 1.623z"></path> </g></svg>
							All Commands
						</a>
					</li>
					<li>
						<a href="..\display_users\display.php">
							<svg  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.5 21C21.8807 21 23 19.8807 23 18.5C23 16.1726 21.0482 15.1988 19 14.7917M15 11C17.2091 11 19 9.20914 19 7C19 4.79086 17.2091 3 15 3M3.5 21.0001H14.5C15.8807 21.0001 17 19.8808 17 18.5001C17 14.4194 11 14.5001 9 14.5001C7 14.5001 1 14.4194 1 18.5001C1 19.8808 2.11929 21.0001 3.5 21.0001ZM13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
							All Users
						</a>
					</li>
					
					
				
				</ul>
			</section>
		
			
			
			
		</nav>
	</header>
    <div class="display">


    
	
 
  <div class="product-wrapper">
  <div class="display">
	<div class="before_table">
		
	
	<section class="main">
      
      <div class="main-skills">
	
	
       
        <div class="card">
          <i ><svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .feather_een{fill:#111918;} </style> <path class="feather_een" d="M9,2C7.346,2,6,3.346,6,5s1.346,3,3,3l1.001,0l0-6L9,2z M9,7C7.895,7,7,6.105,7,5c0-1.105,0.895-2,2-2 V7z M11,24v3c0,0.552,0.448,1,1,1h8c0.552,0,1-0.448,1-1v-3c0-0.552-0.448-1-1-1h-8C11.448,23,11,23.448,11,24z M20,27h-8v-3h8V27z M17,17c3.311,0,5.996-2.682,6-5.993L23.001,10c2.924,0,5.261-2.509,4.976-5.491C27.729,1.909,25.397,0,22.786,0H9.215 C6.604,0,4.271,1.909,4.023,4.509C3.739,7.491,6.076,10,9,10l0.001,1.006c0.004,3.311,2.689,5.993,6,5.993h0.5v0H15.5v1.999H14 c-0.552,0-1,0.448-1,1V21h-1c-1.657,0-3,1.343-3,3v5H8c-0.552,0-1,0.448-1,1v1c0,0.552,0.448,1,1,1h16c0.552,0,1-0.448,1-1v-1 c0-0.552-0.448-1-1-1h-1v-5c0-1.657-1.343-3-3-3h-1v-1.001c0-0.552-0.448-1-1-1h-1.5v-2H17z M24,30v1H8v-1H24z M20,22 c1.105,0,2,0.895,2,2v5H10v-5c0-1.105,0.895-2,2-2H20z M18,19.999v1H14v-1H18z M15.001,16c-2.757,0-5-2.243-5-5V9L8.949,9 C6.766,8.972,5,7.189,5,5c0-2.206,1.794-4,4-4h14.001c2.206,0,4,1.794,4,4c0,2.189-1.766,3.972-3.949,4L22,9v2c0,2.757-2.243,5-5,5 H15.001z M26.001,5c0-1.654-1.346-3-3-3L22,2l0,6l1.001,0C24.655,8,26.001,6.654,26.001,5z M23.001,3c1.105,0,2,0.895,2,2 c0,1.105-0.895,2-2,2V3z"></path> </g></svg></i>
          <h3>best product </h3>
		  <p> <?php echo executeSingleValueQuery("SELECT 
    p.title,
    COUNT(op.id_order) AS total_sales
FROM 
    products p
LEFT JOIN 
    order_product op ON op.id_product = p.id
GROUP BY 
    p.id, 
    p.title
ORDER BY 
    total_sales DESC
LIMIT 1"); ?></p> 
        </div>
       
        <div class="card">
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5" stroke="#33363F" stroke-width="2" stroke-linecap="round"></path> <path d="M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667" stroke="#33363F" stroke-width="2" stroke-linecap="round"></path> </g></svg></i>
          <h3>all the quantity sold</h3>
		  <p> <?php echo executeSingleValueQuery("SELECT SUM(quantity) AS total_products_sold
FROM order_product;
"); ?></p>         
        </div>
		<div class="card">
          <i ><svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <path d="M10.771 8.518c-1.144 0.215-2.83 2.171-2.086 2.915l4.573 4.571-4.573 4.571c-0.915 0.915 1.829 3.656 2.744 2.742l4.573-4.571 4.573 4.571c0.915 0.915 3.658-1.829 2.744-2.742l-4.573-4.571 4.573-4.571c0.915-0.915-1.829-3.656-2.744-2.742l-4.573 4.571-4.573-4.571c-0.173-0.171-0.394-0.223-0.657-0.173v0zM16 1c-8.285 0-15 6.716-15 15s6.715 15 15 15 15-6.716 15-15-6.715-15-15-15zM16 4.75c6.213 0 11.25 5.037 11.25 11.25s-5.037 11.25-11.25 11.25-11.25-5.037-11.25-11.25c0.001-6.213 5.037-11.25 11.25-11.25z"></path> </g></svg></i>
          <h3>Lowest Selling Product </h3>
		  <p> <?php echo executeSingleValueQuery("SELECT 
    p.title,
    COUNT(op.id_order) AS total_sales
FROM 
    products p
LEFT JOIN 
    order_product op ON op.id_product = p.id
GROUP BY 
    p.id, 
    p.title
ORDER BY 
    total_sales ASC
LIMIT 1
"); ?></p>
        </div>
      </div>

     
     
    </section>
	
	<center>
		
	<select name="category" class="classic" name="chooses" id="products">
	<option  value="">All Products</option>

	<?php
  
  $cates=  get_all_cate();
  foreach ($cates as $cate) {



   ?>
<option  value="<?php echo $cate['Category_Name'] ?>"><?php echo $cate['Category_Name']  ?></option><?php }?>

</select>
</center>
	</div>

<div id="showdata" class="content_users">



  <table>
 

	    

	<thead>
	<tr>
		<td>Image Product</td>
		<td>id</td>
		<td>Title</td>
		
		<td>Price</td>
		<td>Category</td>
		<td>Quantity</td>
		<td>times_sold</td>
		<td>Actions</td>
	</tr>
	</thead>
	<?php 
         $products = getAllProducts();
		 if ($products!=0){
         foreach ($products as $product) {
		
			   ?>
		

	<tr id="tr_product_<?php echo $product['id'];  ?>" <?php if($product['Quantity']<=0){
		echo "class=red_row";
	}?>>
		
	
		<td><img src="..\..\..\product_images\<?php echo $product['image_file']; ?>" alt="" height="50px" width="50px"></td>
		<td><?php echo $product['id'] ; ?></td>

		<td><?php echo $product['title'] ; ?></td>
		<td><?php echo$product['PRIX'];?></td>
		<td><?php echo $product['Category_name']; ?></td>

		
		<td><?php echo $product['Quantity'];?></td>
		<td><?php echo $product['times_sold'];?></td>
		<td><a onclick="openForm('<?php echo $product['id']; ?>')"><svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"></path> </g></svg> </a>
		<a onclick="deleteTr('<?php echo $product['id']; ?>')"><svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="10.24"><path d="M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z" fill="#0452c8"></path><path d="M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z" fill="#5F6379"></path></g><g id="SVGRepo_iconCarrier"><path d="M779.5 1002.7h-535c-64.3 0-116.5-52.3-116.5-116.5V170.7h768v715.5c0 64.2-52.3 116.5-116.5 116.5zM213.3 256v630.1c0 17.2 14 31.2 31.2 31.2h534.9c17.2 0 31.2-14 31.2-31.2V256H213.3z" fill="#0452c8"></path><path d="M917.3 256H106.7C83.1 256 64 236.9 64 213.3s19.1-42.7 42.7-42.7h810.7c23.6 0 42.7 19.1 42.7 42.7S940.9 256 917.3 256zM618.7 128H405.3c-23.6 0-42.7-19.1-42.7-42.7s19.1-42.7 42.7-42.7h213.3c23.6 0 42.7 19.1 42.7 42.7S642.2 128 618.7 128zM405.3 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7S448 403 448 426.6v256c0 23.6-19.1 42.7-42.7 42.7zM618.7 725.3c-23.6 0-42.7-19.1-42.7-42.7v-256c0-23.6 19.1-42.7 42.7-42.7s42.7 19.1 42.7 42.7v256c-0.1 23.6-19.2 42.7-42.7 42.7z" fill="#5F6379"></path></g></svg></a>
		
		
		</td>
		
	</tr>
	<form id="formElement_<?php echo $product['id']; ?>"   class="productFormall" action="upload.php" method="POST" data-product-id="<?php echo $product['id']; ?>">

	<div  class="form-popup" id="form_product_<?php echo $product['id'] ; ?>">
	
	<img   onclick="uploadImage(<?php echo $product['id'];?>)" id="uploadedImage_<?php echo $product['id'];?>" src="..\..\..\product_images\<?php echo $product['image_file']; ?>" alt="">
    <input name="image"  type="file" id="imageInput_<?php echo $product['id'];?>" style="display: none;" onchange="previewImage(event, <?php echo $product['id'];?>)">
	<input type="hidden" name="pid" value="<?php echo  $product['id'] ; ?>">

	<br>

	
	</center>
	<br>
	<hr>
	<center>
	<div class="content_product">

	
	<label for="">Title : </label>	<br><input value="<?php echo $product['title'];?>" name="title" id="input_test" type="text"><br>

	<label for="">Descreption : </label>	<br><textarea name="descreption" id="w3review"  rows="4" cols="50">
<?php echo $product['DESCREPTION'];  ?>
</textarea><br>
	<label for=""> PRICE :</label>	<br><input value="<?php echo $product['PRIX'];?>"  name="price" type="number"><br>
	<label for="">QUANTITY : </label>	<br><input value="<?php echo $product['Quantity'];?>"  name="quantity" type="number"><br>
	<label for="">Please choose the new Category : </label><br>
	<select name="category" class="classic"  id="products">
	<option  value="<?php echo $product['Category_name'] ?>"><?php echo $product['Category_name'] ?></option>

	<?php
  
 
  foreach ($cates as $cate) {

	if($cate['Category_Name']!=$product['Category_name']){



   ?>
<option  value="<?php echo $cate['Category_Name'] ?>"><?php echo $cate['Category_Name']  ?></option><?php }}?>
  </select></div>
	</center>
	<hr>
	<input value="MODIFY " name="submit" type="submit">

		</div>
		

		</form>


<?php
	}
	}


	
	
   
?>

	
</table>
</div>

</div>

    
    


    </div>
	<hr>
	<br>
  
    </div>
	<script>var popups = document.getElementsByClassName('form-popup');


for (var i = 0; i < popups.length; i++) {
    popups[i].style.display = 'none';
}</script>
<script>
  function openForm(formId) {
    console.log(formId);
    var formElement = document.getElementById("form_product_" + formId);
    formElement.style.display = "block";

    var closeForm = function(event) {
      var targetElement = event.target; // Element that triggered the event

      if (!targetElement.closest('#form_product_' + formId)) {
        formElement.style.display = "none";
        document.removeEventListener('click', closeForm);
      }
    };

    setTimeout(function() {
      document.addEventListener('click', closeForm);
    }, 0);

	
  }

</script>

	<script src="script.js"></script> 


	<script>
  // Function to trigger file input when the image is clicked
  function uploadImage(image_id) {
    document.getElementById('imageInput_'+image_id).click();
  }

  // Function to preview the selected image before uploading
  function previewImage(event, image_id) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function() {
      const imgElement = document.getElementById('uploadedImage_'+image_id);
      imgElement.src = reader.result;
	  
    }

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
<script>
	function deleteTr(id){

		console.log("function delete.tr called");
		var element = document.getElementById('tr_product_'+id);
		element.remove();
		var data = new FormData();
data.append('id', id); // Ensure 'id' here matches the variable name you're sending

// Make a POST request to the PHP script with the variable
fetch('delete.php', {
  method: 'POST',
  body: data
})
  .then(response => {
    if (response.ok) {
      console.log('PHP script executed successfully');
      // Handle the response if needed
    } else {
      console.error('PHP script execution failed');
    }
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });


	}
</script>


<script>
// Get all forms with the class 'productForm'
const productForms = document.querySelectorAll('.productFormall');

productForms.forEach(form => {
    form.addEventListener('submit', function(event) {
		console.log("diiid u just callll me");
        event.preventDefault(); // Prevent the default form submission

        
        const formData = new FormData(this);
		const productId = this.getAttribute('data-product-id'); 

        // Send form data to PHP script for processing
        fetch(this.getAttribute('action'), {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Handle the response as needed
                console.log(`Product  modified successfully`);
				const tr = document.getElementById('tr_product_'+productId);
                console.log(formData.get('image').name);
				if(formData.get('image').name!=""){
				if (tr.firstElementChild) {
    tr.firstElementChild.innerHTML = '<img src="../../../product_images/'+formData.get('image').name+'" alt="" height="50px" width="50px">';
}
}
console.log(formData.get('title'));
tr.children[2].innerHTML= formData.get('title')  ;
tr.children[3].innerHTML= formData.get('price')  ;
tr.children[4].innerHTML= formData.get('category')  ;
tr.children[5].innerHTML= formData.get('quantity')  ;
if(formData.get('quantity')==0){
	tr.setAttribute("class","red_row");
}
else{
	tr.setAttribute("class","");
}
alert("your product has ben changed succefully");

            })
            .catch(error => {
                // Handle any errors that occurred during the fetch
                console.error(`Error modifying product:`, error);
            });
    });
});
</script>

<!-- <script>
	function modify(pid){
		console.log("fuuuuunctipo calleld b h h h h h h");
		console.log(pid)
		var formid = 'formElement_'+pid;
		console.log(formid);
		const productId = this.getAttribute('data-product-id'); 
		const formElement = document.getElementById(formid);



		const formData = new FormData(formElement);

		console.log(formData.get('title'));



        // Send form data to PHP script for processing
        fetch(formElement.getAttribute('action'), {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Handle the response as needed
                console.log(`Product  modified successfully`);
				const tr = document.getElementById('tr_product_'+productId);
                console.log(formData.get('image').name);
				if(formData.get('image').name!=""){
				if (tr.firstElementChild) {
    tr.firstElementChild.innerHTML = '<img src="../../../product_images/'+formData.get('image').name+'" alt="" height="50px" width="50px">';
}
}
console.log(formData.get('title'));
tr.children[2].innerHTML= formData.get('title')  ;
tr.children[3].innerHTML= formData.get('price')  ;
tr.children[4].innerHTML= formData.get('category')  ;
tr.children[5].innerHTML= formData.get('quantity')  ;
alert("your product has ben changed succefully");

            })
            .catch(error => {
                // Handle any errors that occurred during the fetch
                console.error(`Error modifying product:`, error);
            });

	}
</script> -->

</body>
</html>
