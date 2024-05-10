<?php
require 'functions.php';
$post_id = $_GET['id']; // Get the post ID from the URL

$post = getPostById($post_id); // This function needs to be defined in functions.php if not already
$comments = getComments($post_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createComment($post_id, $_POST['user_name'], $_POST['comment']);
    header("Location: view_post.php?id=$post_id"); // Refresh the page to update comments
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional: You can add custom styles here if needed */
    </style>
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold"><?= htmlspecialchars($post['title']) ?></h1>
        <p class="mt-2 mb-4"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        <p class="text-gray-600">Posted on: <?= $post['created_at'] ?></p>
        <h2 class="mt-8 mb-4 text-xl font-bold">Comments</h2>
        <?php foreach ($comments as $comment) : ?>
            <div class="bg-white shadow-md rounded-md p-4 mb-4">
                <p class="font-semibold"><?= htmlspecialchars($comment['user_name']) ?> said:</p>
                <p class="mt-2"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            </div>
        <?php endforeach; ?>
        <h3 class="mt-8 mb-4 text-xl font-bold">Add a Comment</h3>
        <form method="post" class="space-y-4">
            <div>
                <label for="user_name" class="block mb-1">Name:</label>
                <input type="text" id="user_name" name="user_name" required class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label for="comment" class="block mb-1">Comment:</label>
                <textarea id="comment" name="comment" required class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Post Comment</button>
        </form>
        <a href="index.php" class="block mt-4 text-blue-500 hover:underline">Back to Posts</a>
    </div>
</body>

</html>