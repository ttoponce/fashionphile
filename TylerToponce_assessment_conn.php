<?php
$servername = "localhost";
$username = "localhost1";
$password = "localhost";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// Close connection
$conn->close();
?>