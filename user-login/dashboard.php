<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");  
    exit;
}

require_once 'functions.php';

// Fetch username from database
$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$username = $user['username']; 

// Welcome message with username
echo "<h1>Welcome, $username!</h1>";
echo "<p>You are now logged in. This is your protected dashboard area.</p>";


?>
<a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Logout</a>
