<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'functions.php';
$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional: You can add custom styles here if needed */
    </style>
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Blog Posts</h1>
        <a href="add_post.php" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Add New Post</a>
        <?php foreach ($posts as $post) : ?>
            <div class="bg-white shadow-md rounded-md p-4 mb-4">
                <h2 class="text-xl font-bold mb-2"><a href="view_post.php?id=<?= $post['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($post['title']) ?></a></h2>
                <p class="text-gray-600">Posted on: <?= $post['created_at'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>