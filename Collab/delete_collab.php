<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'iengage');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve post ID
$id = $_POST['id'];

// Delete the post
$sql = "DELETE FROM collaborations WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Collaboration post deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
