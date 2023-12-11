<?php
  require '../../../php/Functions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
   
    $title = $_POST['title'];
    $des = $_POST['descreption'];
  
    $price = $_POST['money'];
    $targetDirectory = "../../../product_images/"; // Change this to your desired directory
    $imageName = basename($_FILES['profileImage']['name']);
    $qt  =$_POST['Quantity'];
    $selectedCategory = $_POST['category'];
  

    $targetFilePath = $targetDirectory . $imageName;
    
    move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath);
    
   if(is_numeric($price) AND is_numeric($qt)){
  insertIntoP($title, $des, $price,getidbycate(  $selectedCategory),$qt,$imageName);
  
 
 
}

        
   
 
   
}

?>