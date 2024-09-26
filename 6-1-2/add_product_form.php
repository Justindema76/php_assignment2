<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />       
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h1>Add Product</h1>

    <form action="add_product.php" method="post" id="add_product_form">
        
            
                <label >Code:</label>
                <input type="text" name="product_code"/><br>
           
                <label for="name">Name:</label>
                <input type="text" name="name"/><br>
           
                <label for="version">Version:</label>
                <input type="text" name="version"/><br>
           
               <label for="release_date">Release Date:</label>
                <input type="date" name="release_date"/><br>

                <!-- Add Product button -->
            <div id="buttons">
                <input type="submit" value="Add Product" class="submit-button"/><br />
            </div>
        </form>

        <p><a href="manage_products_form.php">View Products List</a></p>
    </main>
    <?php include("view/footer.php"); ?>
</body>
</html>
