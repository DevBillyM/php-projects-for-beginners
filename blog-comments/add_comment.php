<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $post_id = $_POST['postID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Input sanitization (you should do more thorough validation)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $comment = mysqli_real_escape_string($conn, $comment);

    $sql = "INSERT INTO comments (postID, name, email, comment) 
            VALUES ('$post_id', '$name', '$email', '$comment')";

    if (mysqli_query($conn, $sql)) {
        // Success (Redirect back to blog post maybe?)
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
