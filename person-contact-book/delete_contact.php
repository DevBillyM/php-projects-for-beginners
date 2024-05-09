<?php
define('PROJECT_ROOT', dirname(__FILE__)); 
include_once('functions/functions.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteContact($id)) {
        // Success! Redirect back to the main page
        header('Location: index.php');
        exit;
    } else {
        // Error during deletion - You might want to display an error message here
        echo "There was an error deleting the contact."; 
    }
} else {
    // No ID provided - Handle this appropriately
    echo "Invalid request."; 
}
?>
