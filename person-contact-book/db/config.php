<?php
// Database connection details
$servername = "localhost";  
$username = "root";  
$password = ""; 
$dbname = "contactbook";  

// Create the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Connection error checking
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
