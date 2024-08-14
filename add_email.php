<?php
$servername = "localhost";
$username = "u681393995_achcyn2gmail";
$password = "JesusChrist2020!"; // Your database password
$dbname = "u681393995_servantte";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email from POST request
$email = $_POST['email'];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

// Get current date and time
$date = date('Y-m-d');
$time = date('H:i:s');

// Prepare and bind
$sql = $conn->prepare("INSERT INTO email_list (email, subscription_date, subscription_time) VALUES (?, ?, ?)");
$sql->bind_param("sss", $email, $date, $time);

// Execute the statement
if ($sql->execute()) {
    echo "Subscribed!";
} else {
    echo "Error: " . $sql->error;
}

// Close statement and connection
$sql->close();
$conn->close();
?>

