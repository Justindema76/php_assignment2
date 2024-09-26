<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Ensure session is started

// Get data
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email_address = filter_input(INPUT_POST, 'email'); // Ensure this matches the form field
$phone_number = filter_input(INPUT_POST, 'phone'); // Ensure this matches the form field
$password = filter_input(INPUT_POST, 'password');

require_once("database.php");

// Check for existing technicians
$queryTechnicians = 'SELECT * FROM technicians'; // Ensure you're querying the correct table
$statement1 = $db->prepare($queryTechnicians);
$statement1->execute();
$technicians = $statement1->fetchAll(); // Fetch into the correct variable
$statement1->closeCursor();

// Check for duplicate email
foreach ($technicians as $technician) {
    if ($email_address == $technician["email"]) {
        $_SESSION["add_error"] = "Duplicate email address, try again."; // Set session error
        header("Location: errors/add_tech_error.php"); // Redirect to error page
        exit(); // Stop execution
    }
    
}

// Validate inputs
if ($first_name == null || $last_name == null || $email_address == null || $phone_number == null || $password == null) {
    $_SESSION["add_error"] = "Invalid contact data, check all fields and try again.";
    header("Location: errors/error.php");
    exit(); // Use exit() after header
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Add the technician to the database
    // Add the technician to the database without hashing
$query = 'INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES (:firstName, :lastName, :email, :phone, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':firstName', $first_name);
$statement->bindValue(':lastName', $last_name);
$statement->bindValue(':email', $email_address);
$statement->bindValue(':phone', $phone_number);
$statement->bindValue(':password', $password); // Store plain text password
$statement->execute();
$statement->closeCursor();


    // Redirect to the product management form
    header("Location: manage_tech_form.php");
    exit(); // Use exit() after header
}
?>
