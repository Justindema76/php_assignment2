<?php
require("database.php");
$queryTechnicians = 'SELECT * FROM technicians';
$statement1 = $db->prepare($queryTechnicians);
$statement1->execute();
$technicians = $statement1->fetchAll();  
$statement1->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Technicians Manager</title>
    <link rel="stylesheet" href="css/main.css"/>       
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h1>Technician List</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Action</th>
            </tr>

            <?php foreach ($technicians as $technician): ?>
            <tr>
                <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
                <td><?php echo htmlspecialchars($technician['lastName']); ?></td>
                <td><?php echo htmlspecialchars($technician['email']); ?></td>
                <td><?php echo htmlspecialchars($technician['phone']); ?></td>
                <td><?php echo htmlspecialchars($technician['password']); ?></td>
                <td>
                    <form action="delete_tech.php" method="post">
                        <input type="hidden" name="tech_id" value="<?php echo $technician['techID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br/>
        <a href="add_tech_form.php">Add Technician</a>
        <br/>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>
