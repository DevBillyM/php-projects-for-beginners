<?php
// Database credentials
$hostname = "localhost";    
$username = "root";
$password = "";
$database = "userlogin";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // Set error mode for exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
