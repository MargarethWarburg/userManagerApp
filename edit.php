<?php
// This file will allow editing existing user information.
include_once 'db_connection.php';
//var_dump($_GET); // Debugging: Check contents of $_GET array

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Retrieve user information based on the provided ID
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found with ID: $id";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission and update user information
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $SurName = $_POST['SurName'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET FirstName='$FirstName', SurName='$SurName', Age='$Age', Email='$Email',Password='$Password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        FirstName: <input type="text" name="FirstName" value="<?php echo $row['FirstName']; ?>"><br><br>
        SurName: <input type="text" name="SurName" value="<?php echo $row['SurName']; ?>"><br><br>
        Age: <input type="number" name="Age" value="<?php echo $row['Age']; ?>"><br><br>
        Email: <input type="text" name="Email" value="<?php echo $row['Email']; ?>"><br><br>
        Password: <input type="password" name="Password" value="<?php echo $row['Password']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
