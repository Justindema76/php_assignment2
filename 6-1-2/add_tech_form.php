<!DOCTYPE html>
<html>
<head>
    <title>Add Technician</title>
    <link rel="stylesheet" type="text/css" href="main.css" />       
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h1>Add Technician</h1>

    <form action="add_tech.php" method="post" id="add_tech_form">

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name"/><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name"/><br>

    <label for="email">Email:</label>
    <input type="text" name="email"/><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone"/><br>

    <label>Password:</label>
    <input type="text" name="password" maxlength="20" required/><br>


    <!-- Add Product button -->
            <div id="buttons">
                <input type="submit" value="Add Technician" class="submit-button"/><br />
            </div>
        </form>

        <p><a href="manage_tech_form.php">View Technicians List</a></p>
    </main>
    <?php include("view/footer.php"); ?>
</body>
</html>
