<?php
require_once 'config.php';

function registerUser($username, $email, $password) {
    global $conn;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);
        return true;

    } catch(PDOException $e) {
        echo "Registration Error: " . $e->getMessage();
        return false;
    }
}

function loginUser($emailOrUsername, $password) {
    global $conn;

    try {
        // Check if the input is an email or a username
        if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        } else {
            $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        }

        $stmt->execute([$emailOrUsername]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])) {
            return $user['id'];
        } else {
            return false;
        }

    } catch(PDOException $e) {
        echo "Login Error: " . $e->getMessage();
        return false;
    }
}
?>
