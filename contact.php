<?php
// Database connection
$host = "localhost";
$dbname = "contact_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get raw POST data (since input has no name attributes)
$data = json_decode(file_get_contents("php://input"), true);

// Extract fields
$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$message = $conn->real_escape_string($data['message']);

// Insert into DB
$sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
