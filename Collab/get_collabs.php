<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'iengage');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all posts
$sql = "SELECT * FROM collaborations ORDER BY created_at DESC";
$result = $conn->query($sql);

$collabs = [];
while ($row = $result->fetch_assoc()) {
    $collabs[] = $row;
}

// Return data as JSON
echo json_encode($collabs);

$conn->close();
?>
