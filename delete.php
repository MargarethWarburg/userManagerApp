<?php
// Include the database connection file
include_once 'db_connection.php';

// Check if the user ID is provided in the URL parameters
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Retrieve the user ID to delete
    $id = $_GET['id'];

    // Construct the SQL DELETE statement
    $sql = "DELETE FROM users WHERE id = $id";

    // Execute the SQL DELETE statement
    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, redirect to the index.php page
        header("Location: index.php");
        exit();
    } else {
        // If an error occurs, display the error message
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If the user ID is not provided or the request method is not GET, display an error message
    echo "Invalid request";
}
?>
