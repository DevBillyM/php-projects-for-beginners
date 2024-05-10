<?php
require 'config.php';

// Function to create a new blog post
function createPost($title, $content)
{
    global $pdo;
    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content]);
}

// Function to fetch all blog posts
function getPosts()
{
    global $pdo;
    $sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Function to create a new comment
function createComment($post_id, $user_name, $comment)
{
    global $pdo;
    $sql = "INSERT INTO comments (post_id, user_name, comment) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id, $user_name, $comment]);
}

// Function to fetch comments for a post
function getComments($post_id)
{
    global $pdo;
    $sql = "SELECT user_name, comment, created_at FROM comments WHERE post_id = ? ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id]);
    return $stmt->fetchAll();
}


// Function to fetch a single blog post by ID
function getPostById($id)
{
    global $pdo;
    $sql = "SELECT id, title, content, created_at FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}
