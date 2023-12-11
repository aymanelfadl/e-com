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
    <link rel="stylesheet" href="../../style.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="main.css"> <!-- Link to your CSS file -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


</head>
<body>
  
  <div class="dashboard">
	<aside class="search-wrap">
		<div class="search">
		<label for="search">
				
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
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#0F0F0F"></path> <path d="M12 5C11.4477 5 11 5.44771 11 6V12.4667C11 12.4667 11 12.7274 11.1267 12.9235C11.2115 13.0898 11.3437 13.2343 11.5174 13.3346L16.1372 16.0019C16.6155 16.278 17.2271 16.1141 17.5032 15.6358C17.7793 15.1575 17.6155 14.5459 17.1372 14.2698L13 11.8812V6C13 5.44772 12.5523 5 12 5Z" fill="#0F0F0F"></path> </g></svg></i>
          <h3>Pending Orders</h3>
		  <p> <?php echo executeSingleValueQuery("SELECT COUNT(*) from orders where status='Pending'"); ?> orders :  <?php echo executeSingleValueQuery("SELECT (COUNT(CASE WHEN status = 'Pending' THEN 1 END) / COUNT(*)) * 100 AS percentage FROM orders
"); ?>%</p> 
        </div>
        <div class="card">
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M1 6C1 4.89543 1.89543 4 3 4H14C15.1046 4 16 4.89543 16 6V7H19C21.2091 7 23 8.79086 23 11V12V15V17C23.5523 17 24 17.4477 24 18C24 18.5523 23.5523 19 23 19H22H18.95C18.9828 19.1616 19 19.3288 19 19.5C19 20.8807 17.8807 22 16.5 22C15.1193 22 14 20.8807 14 19.5C14 19.3288 14.0172 19.1616 14.05 19H7.94999C7.98278 19.1616 8 19.3288 8 19.5C8 20.8807 6.88071 22 5.5 22C4.11929 22 3 20.8807 3 19.5C3 19.3288 3.01722 19.1616 3.05001 19H2H1C0.447715 19 0 18.5523 0 18C0 17.4477 0.447715 17 1 17V6ZM16.5 19C16.2239 19 16 19.2239 16 19.5C16 19.7761 16.2239 20 16.5 20C16.7761 20 17 19.7761 17 19.5C17 19.2239 16.7761 19 16.5 19ZM16.5 17H21V15V13H19C18.4477 13 18 12.5523 18 12C18 11.4477 18.4477 11 19 11H21C21 9.89543 20.1046 9 19 9H16V17H16.5ZM14 17H5.5H3V6H14V8V17ZM5 19.5C5 19.2239 5.22386 19 5.5 19C5.77614 19 6 19.2239 6 19.5C6 19.7761 5.77614 20 5.5 20C5.22386 20 5 19.7761 5 19.5Z" fill="#000000"></path> </g></svg></i>
          <h3>Delevring Orders</h3>
          <p> <?php echo executeSingleValueQuery("SELECT COUNT(*) from orders where status='Delevring'"); ?> orders :  <?php echo executeSingleValueQuery("SELECT (COUNT(CASE WHEN status = 'Delevring' THEN 1 END) / COUNT(*)) * 100 AS percentage FROM orders
"); ?>%</p> 
        </div>
        <div class="card">
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5" stroke="#33363F" stroke-width="2" stroke-linecap="round"></path> <path d="M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667" stroke="#33363F" stroke-width="2" stroke-linecap="round"></path> </g></svg></i>
          <h3>Completed Orders</h3>
		  <p> <?php echo executeSingleValueQuery("SELECT COUNT(*) from orders where status='Completed'"); ?> orders :  <?php echo executeSingleValueQuery("SELECT (COUNT(CASE WHEN status = 'Completed' THEN 1 END) / COUNT(*)) * 100 AS percentage FROM orders
"); ?>%</p>         
        </div>
		<div class="card">
          <i ><svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <path d="M10.771 8.518c-1.144 0.215-2.83 2.171-2.086 2.915l4.573 4.571-4.573 4.571c-0.915 0.915 1.829 3.656 2.744 2.742l4.573-4.571 4.573 4.571c0.915 0.915 3.658-1.829 2.744-2.742l-4.573-4.571 4.573-4.571c0.915-0.915-1.829-3.656-2.744-2.742l-4.573 4.571-4.573-4.571c-0.173-0.171-0.394-0.223-0.657-0.173v0zM16 1c-8.285 0-15 6.716-15 15s6.715 15 15 15 15-6.716 15-15-6.715-15-15-15zM16 4.75c6.213 0 11.25 5.037 11.25 11.25s-5.037 11.25-11.25 11.25-11.25-5.037-11.25-11.25c0.001-6.213 5.037-11.25 11.25-11.25z"></path> </g></svg></i>
          <h3>Cancelled Orders </h3>
		  <p> <?php echo executeSingleValueQuery("SELECT COUNT(*) from orders where status='Cancelled'"); ?> orders : <?php echo executeSingleValueQuery("SELECT (COUNT(CASE WHEN status = 'Cancelled' THEN 1 END) / COUNT(*)) * 100 AS percentage FROM orders
"); ?>%</p>
        </div>
      </div>

     
     
    </section>
	<br>

<div id="showdata" class="content_users">



  <table>
 

	    

	<thead>
	<tr>
		<td>Command Number </td>
		<td>The User </td>
		
		<td>Status</td>
		<td>Date </td>
		<td>Date of the delivery</td>
		<td>Actions</td>
	</tr>
	</thead>
	<?php 
	
$Commands =getAllCommandes();
	if ($Commands!=0){
		$todaysDate = date("Y-m-d");
         foreach ($Commands as $command) {
			

		
			   ?>
		

	<tr id="tr_<?php echo $command['id']; ?>" <?php if(($command['dilivredate']<$todaysDate ) AND ($command['STATUS']!="Completed")){
		echo "class=red_row";
	}?>>
		
		<td><?php echo $command['id']; ?></td>
		<td><?php echo $command['FN']." ".$command['LN'] ; ?></td>
		<td><?php echo$command['icon'];?> <span><?php echo"  ".$command['STATUS'];?> </span></td>
		<td><?php echo $command['ordate']; ?></td>
		
		<td><?php echo $command['dilivredate'];?></td>
		<td><a onclick="openForm('<?php echo $command['id']; ?>')"><svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"></path> </g></svg> </a>
		
		
		</td>
		
		
		
	</tr>
	<div class="form-popup" id="<?php echo $command['id']; ?>">
   <span> The command with the id <?php echo $command['id']; ?> Passed by <?php echo $command['FN']." ".$command['LN'] ; ?> </span> <br>
	<hr><h5>ALL PRODUCTS IN THIS COMMAND</h5>
	<br>
	



	<div class="table">
    <div class="table-row header">
	<div id="firstcell" class="table-cell">#id</div>
	<div class="table-cell">Prix</div>
        <div class="table-cell">Asked Quantity</div>

        <div id="secondcell" class="table-cell">Titre</div>
     
    </div>
	<?php $Products = getProductsInCommand($command['id']);
	
		if($Products!=0){
         foreach ($Products as $Product) {
			

			
			   ?>
    <div class="table-row">
	     <div id="firstcell" class="table-cell"><?php echo $Product['id']  ?></div>
		 <div class="table-cell"><?php echo $Product['PRIX']  ?></div>
        <div class="table-cell"><?php echo $Product['quantity']  ?></div>
        <div id="secondcell" class="table-cell"><?php echo $Product['title']  ?></div>


    </div>
    <?php
	}} ?>
	</div>
	<hr>
	<label for=""> THE TOTAL PRICE OF THIS COMMAND : <span><?php
$query = "SELECT ROUND(SUM(products.PRIX * order_product.quantity), 2) AS total_price 
FROM order_product 
JOIN products ON order_product.id_product = products.id 
WHERE order_product.id_order = " . $command['id'];


$result = executeSingleValueQuery($query);
echo $result;
?>
 MAD</span> </label>
<br>
<hr>
	<label for="">Change the actual Status : </label>
   <select name="<?php echo $Product['id']  ?>" id="status_select_<?php echo $command['id']; ?>">
   <option value="<?php echo$command['STATUS'];?>"><?php echo$command['STATUS'];?></option>
   <?php 
   $status=GetAllStatusCommands();
   if($status!=0){
	foreach ($status as $statu) {
		{if($statu['status']!=$command['STATUS']){


    ?>

   <option value="<?php echo $statu['status'];?>"><?php echo $statu['status'];?></option>
<?php }}}}?>
  
   </select>
   <hr>
   <button onclick="closeForm(<?php echo $command['id'];?>)">
	CLOSE THIS 
   </button>
   <hr>
  
</div>




    
</div>
	

<?php
	}
	}

	
	
	
   
?>

	
</table>
</div>

</div>

    
    


    </div>

  
    </div>
	<script>var popups = document.getElementsByClassName('form-popup');

// Loop through all found elements and hide them
for (var i = 0; i < popups.length; i++) {
    popups[i].style.display = 'none';
}</script>

	<script>
		
		function openForm( formId) {
    // Construct the form id based on the product id or any unique identifier
	document.getElementById(formId).style.display = "block";



    let selectMenu = document.querySelector("#status_select_"+formId);
    selectMenu.addEventListener("change", function () {
     
        let categoryName = this.value;
		console.log(categoryName);
		console.log(formId);

		
		let http = new XMLHttpRequest();
http.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
        let response = JSON.parse(this.responseText);
        console.log("Icon received:", response); // Log the received icon
		console.log(formId);
		var tr = document.getElementById("tr_"+formId);
		tr.children[2].innerHTML=response.icon +`<span> `+ categoryName + `</span>`
		if(categoryName=="Completed"){
			tr.setAttribute("class","");
		}
    }
}
		
		

		http.open('POST', "script.php", true);
      http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      http.send("category=" + categoryName + "&id=" + formId );
	 

	  


    

       
  
        
    });


}


function closeForm(formId) {
  document.getElementById(formId).style.display = "none";
}
</script>
	<script src="script.js"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

