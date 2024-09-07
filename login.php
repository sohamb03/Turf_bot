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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Redirect to a welcome page or dashboard
            echo "<script>alert('Login successful!'); window.location.href='http://127.0.0.1:5500/turf_objects.html';</script>";
        } else {
            echo "<script>alert('Invalid credentials.'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials.'); window.location.href='login.html';</script>";
    }
}

// Close the database connection
$conn->close();
?>
