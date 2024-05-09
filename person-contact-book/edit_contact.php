<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('PROJECT_ROOT', dirname(__FILE__)); 

include_once('functions/functions.php');

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $contact = getContactById($id);

    // Handle form submission (if form was submitted)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if (updateContact($id, $name, $phone, $email)) {
            // Update successful, redirect back to the main page
            header('Location: index.php');
            exit;
        } else {
            // Error during the update
            $error_message = "There was an error updating the contact.";
        }
    }
} else {
    // No ID provided, redirect or display an error
    header('Location: index.php');
    exit;  
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
</head>
<body>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Edit Contact</h1>
        <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Contacts</a>

        <?php if (isset($error_message)) { ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-4">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <form method="POST" class="mt-6">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo isset($contact['name']) ? $contact['name'] : ''; ?>" required> 
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-bold mb-2">Phone:</label>
                <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo isset($contact['phone']) ? $contact['phone'] : ''; ?>"> 
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php echo isset($contact['email']) ? $contact['email'] : ''; ?>" required> 
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Contact</button>
        </form>

    </div>
</body>
</html>
