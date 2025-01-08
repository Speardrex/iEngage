<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'iengage');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve post data
$id = $_POST['id'];
$status = $_POST['status'];

// Update the post status
$sql = "UPDATE collaborations SET status = '$status' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Collaboration status updated successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
