<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_auth";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href='signup.html';</script>";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database
    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // On successful registration, redirect to login page
        echo "<script>alert('Welcome $full_name!'); window.location.href='http://localhost/login.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
