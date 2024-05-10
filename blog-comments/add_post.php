<?php
require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createPost($_POST['title'], $_POST['content']);
    header("Location: index.php"); // Redirect to main page after post creation
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add a New Blog Post</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Add a New Blog Post</h1>
        <form method="post" class="space-y-4">
            <div>
                <label for="title" class="block mb-1">Title:</label>
                <input type="text" id="title" name="title" required class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label for="content" class="block mb-1">Content:</label>
                <textarea id="content" name="content" required class="w-full border rounded-md px-3 py-2 focus:outline-none focus:border-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Submit</button>
        </form>
        <a href="index.php" class="block mt-4 text-blue-500 hover:underline">Back to Posts</a>
    </div>
</body>

</html>