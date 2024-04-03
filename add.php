<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Debugging: Print $_POST array to check form data
     echo "<pre>";
     print_r($_POST);
     echo "</pre>";

    $FirstName = $_POST['FirstName'];
    $SurName = $_POST['SurName'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
      // Debugging: Print form data to check if values are received correctly
      echo "FirstName: $FirstName<br>";
      echo "SurName: $SurName<br>";
      echo "Age: $Age<br>";
      echo "Email: $Email<br>";
      echo "Password: $Password<br>";
   

    $sql = "INSERT INTO users (FirstName,SurName,Age, Email,Password) VALUES ('$FirstName', '$SurName','$Age','$Email','$Password')";
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
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        FirstName: <input type="text" name="FirstName"><br><br>
        SurName: <input type="text" name="SurName"><br><br>
        Age: <input type="number" name="Age"><br><br>
        Email: <input type="text" name="Email"><br><br>
        Password: <input type="password" name="Password"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
