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

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$terms = isset($_POST['terms']) ? 1 : 0;

// Get current date and time
$date = date('Y-m-d');
$time = date('H:i:s');

// Insert data into database
$sql = "INSERT INTO messages (name, email, message_date, message_time, message)
VALUES ('$name', '$email', '$date', '$time', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
