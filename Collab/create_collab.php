<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'iengage');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = $_POST['title'];
$project = $_POST['project'];
$type = $_POST['type'];
$timeline = $_POST['timeline'];
$skills = $_POST['skills'];

// Insert into database
$sql = "INSERT INTO collaborations (title, project, collaboration_type, timeline, skills_required)
        VALUES ('$title', '$project', '$type', '$timeline', '$skills')";

if ($conn->query($sql) === TRUE) {
    echo "Collaboration post created successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
