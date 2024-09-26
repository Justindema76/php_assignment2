<?php 
 
 require_once('database.php');
 //get data
 $tech_id = filter_input(INPUT_POST, 'tech_id');

//code to save to MySQL
//validate inputs

if ($tech_id !== false)
  {
     // add the contact to the database
     $query = 'DELETE FROM technicians WHERE techID = :tech_id';
 
     $statement = $db->prepare($query);
     $statement->bindValue(':tech_id', $tech_id);
     $statement->execute();
     $statement->closeCursor();
           
   }

  // Display the Product List page
             include('manage_tech_form.php');

