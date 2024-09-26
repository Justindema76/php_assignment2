<?php 
 
 require_once('database.php');
 //get data
 $product_code = filter_input(INPUT_POST, 'product_code');

//code to save to MySQL
//validate inputs

if ($product_code !== false)
  {
     // add the contact to the database
     $query = 'DELETE FROM products WHERE productCode = :product_code';
 
     $statement = $db->prepare($query);
     $statement->bindValue(':product_code', $product_code);
     $statement->execute();
     $statement->closeCursor();
           
   }

  // Display the Product List page
             include('manage_products_form.php');

