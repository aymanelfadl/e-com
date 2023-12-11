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
    <title>All users </title>
    <link rel="stylesheet" href="../../style.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="main.css"> <!-- Link to your CSS file -->
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
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 19.2857L15.8 21L20 17M4 21C4 17.134 7.13401 14 11 14C12.4872 14 13.8662 14.4638 15 15.2547M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
          <h3>best User  </h3>
		  <p> <?php echo executeSingleValueQuery("SELECT u.username
FROM users u
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
GROUP BY u.id, u.username
ORDER BY SUM(p.PRIX * op.quantity) DESC
LIMIT 1;
"); echo " Spent :  "; echo executeSingleValueQuery("SELECT SUM(p.PRIX * op.quantity) AS total_spent_by_top_user
FROM users u
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
WHERE u.username = (
    SELECT u.username
    FROM users u
    JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
    JOIN order_product op ON o.id = op.id_order
    JOIN products p ON op.id_product = p.id
    GROUP BY u.id, u.username
    ORDER BY SUM(p.PRIX * op.quantity) DESC
    LIMIT 1
)
GROUP BY u.id, u.username;
");echo "MAD"; ?></p> 
        </div>
       
        <div class="card">
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 19.2857L15.8 21L20 17M4 21C4 17.134 7.13401 14 11 14C12.4872 14 13.8662 14.4638 15 15.2547M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
          <h3>User Number 2</h3>
		  <p> <?php echo executeSingleValueQuery("SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent_by_second_user
FROM (
    SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent
    FROM users u
    JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
    JOIN order_product op ON o.id = op.id_order
    JOIN products p ON op.id_product = p.id
    GROUP BY u.id, u.username
    ORDER BY total_spent DESC
    LIMIT 1 OFFSET 1
) AS second_highest
JOIN users u ON u.username = second_highest.username
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
GROUP BY u.id, u.username;

"); echo " Spent :  "; echo executeSingleValueQuery("SELECT SUM(p.PRIX * op.quantity) AS total_spent_by_second_user
FROM (
    SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent
    FROM users u
    JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
    JOIN order_product op ON o.id = op.id_order
    JOIN products p ON op.id_product = p.id
    GROUP BY u.id, u.username
    ORDER BY total_spent DESC
    LIMIT 1 OFFSET 1
) AS second_highest
JOIN users u ON u.username = second_highest.username
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
GROUP BY u.id, u.username;

");echo "MAD"; ?></p>          
        </div>
		<div class="card">
          <i ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 19.2857L15.8 21L20 17M4 21C4 17.134 7.13401 14 11 14C12.4872 14 13.8662 14.4638 15 15.2547M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
          <h3>User Number 3 </h3>
		  <p> <?php echo executeSingleValueQuery("SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent_by_third_user
FROM (
    SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent
    FROM users u
    JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
    JOIN order_product op ON o.id = op.id_order
    JOIN products p ON op.id_product = p.id
    GROUP BY u.id, u.username
    ORDER BY total_spent DESC
    LIMIT 1 OFFSET 2
) AS third_highest
JOIN users u ON u.username = third_highest.username
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
GROUP BY u.id, u.username;


"); echo " Spent :  "; echo executeSingleValueQuery("SELECT SUM(p.PRIX * op.quantity) AS total_spent_by_third_user
FROM (
    SELECT u.username, SUM(p.PRIX * op.quantity) AS total_spent
    FROM users u
    JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
    JOIN order_product op ON o.id = op.id_order
    JOIN products p ON op.id_product = p.id
    GROUP BY u.id, u.username
    ORDER BY total_spent DESC
    LIMIT 1 OFFSET 2
) AS third_highest
JOIN users u ON u.username = third_highest.username
JOIN orders o ON u.id = o.id_user AND o.status = 'Completed'
JOIN order_product op ON o.id = op.id_order
JOIN products p ON op.id_product = p.id
GROUP BY u.id, u.username;


");echo "MAD"; ?></p> 
        </div>
      </div>

     
     
    </section>
	
	<center>

	</div>

<div id="showdata" class="content_users">



  <table>
 

	    

	<thead>
	<tr>
		<td>First Name </td>
		
		<td>Last Name</td>
		<td>Username </td>
		<td>Email</td>
		<td>Orders</td>
	</tr>
	</thead>
	<?php 
	
         $products = getAllUsers();
		 if ($products!=0){
		
         foreach ($products as $product) {
			

		
			   ?>
		

	<tr>
		
		
		<td><?php echo $product['FN']; ?></td>
		<td><?php echo$product['LN'];?></td>
		<td><?php echo $product['USERNAME']; ?></td>
		
		<td><?php echo $product['EMAIL'];?></td>
		<td><?php echo $product['num_orders'];?></td>
		
		
		
		
	</tr>
	

<?php
	}
	}


?>

	
</table>
</div>

</div>

    
    


    </div>

  
    </div>
	<script src="script.js"></script> 
</body>
</html>

