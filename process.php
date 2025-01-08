<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'iengage';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$form_type = $_POST['form_type'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($form_type === 'signup') {
    $name = $_POST['name'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Sign-up successful! <a href='index.html'>Go to login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} elseif ($form_type === 'login') {
    // Fetch user from database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['name'] . ".";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>
