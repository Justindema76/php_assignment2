<?php
require("database.php");
$queryProducts = 'SELECT * FROM products';
$statement1 = $db->prepare($queryProducts);
$statement1->execute();
$products = $statement1->fetchAll();  
$statement1->closeCursor();
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Products Manager</title>
       <link rel="stylesheet" href="main.css"/>       
   </head>
   <body>
   <?php include 'view/header.php'; ?>
       <main>
       
        <h1>Product List</h1>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>

                <td>
                    <!-- Delete button -->
                    <form action="delete_product.php" method="post">
                        <input type="hidden" name="product_code"
                            value="<?php echo $product['productCode']; ?>">
                        <input type="submit" value="Delete">
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br/>
        
        <!-- Add Product button -->
        <form action="add_product_form.php" method="post">
        <a href="add_product_form.php">Add Product</a>

        </form>
        <br/>

       </main>
       <footer><?php include 'view/footer.php'; ?></footer>
   </body>
</html>
