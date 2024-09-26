<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Get data
$product_code = filter_input(INPUT_POST, 'product_code');
$name = filter_input(INPUT_POST, 'name');
$version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_INT); // Use FILTER_VALIDATE_INT
$release_date = filter_input(INPUT_POST, 'release_date');

// Validate inputs
$error = "";

if ($product_code == null || $name == null || $release_date == null) {
    // If any of the main fields are empty
    $error = "Invalid product data. Check all fields and try again.";
} elseif ($version === false) {
    // Check if version is not an integer
    $error = "Version type must be an Integer.";
}

// If there was an error, display it
if (!empty($error)) {
    include('errors/add_product_error.php');
    exit();
} else {
    require_once('database.php');
    
    // Check if the product_code already exists
    $checkQuery = 'SELECT COUNT(*) FROM products WHERE productCode = :product_code';
    $checkStatement = $db->prepare($checkQuery);
    $checkStatement->bindValue(':product_code', $product_code);
    $checkStatement->execute();
    $productExists = $checkStatement->fetchColumn();
    $checkStatement->closeCursor();

    if ($productExists > 0) {
        // Product code already exists
        $error = "Product with code '$product_code' already exists. Please use a different code.";
        include('errors/add_product_error.php');
        exit();
    } else {
        // Add the product to the database if no duplicate is found
        $query = 'INSERT INTO products (productCode, name, version, releaseDate)
                  VALUES (:product_code, :name, :version, :release_date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':version', $version);
        $statement->bindValue(':release_date', $release_date);

        // Execute the query to insert the product
        $statement->execute();
        $statement->closeCursor();

        // Redirect to the product management form
        header("Location: manage_products_form.php");
        exit(); 
    }
}
?>
