<?php
session_start(); // Start the session

// Retrieve error message from session, or set a default
$error = isset($_SESSION['add_error']) ? $_SESSION['add_error'] : 'Unknown error occurred.';
unset($_SESSION['add_error']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="../main.css"> 
</head>
<body>
    <?php include '../view/header.php'; ?> 
    <main>
        <h1>Error</h1>
        <p><?php echo htmlspecialchars($error); ?></p> 
        <p><a href="../add_tech_form.php">Back to Add Technician Form</a></p> 
    </main>
    <?php include '../view/footer.php'; ?> 
</body>
</html>
