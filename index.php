<?php
//This file will display the list of users and provide links for CRUD operations.
include_once 'db_connection.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER MANAGEMENT APPLICATION</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h2>Users List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>SurName</th>
            <th>Email</th>
            <th>Age</th>
            <th>created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
           
            
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["FirstName"] . "</td>";
                echo "<td>" . $row["SurName"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Age"] . "</td>";
                echo "<td>" . $row["Created_at"] . "</td>";
                echo "<td>" . $row["Updated_at"] . "</td>";
                echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="add.php">Add New User</a>
</body>
</html>
