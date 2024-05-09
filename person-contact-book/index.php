<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('PROJECT_ROOT', dirname(__FILE__));
include_once(PROJECT_ROOT . '/functions/functions.php'); 
$contacts = getAllContacts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Contact Book</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
</head>
<body>
    <div class="container mx-auto mt-8"> 
        <h1 class="text-3xl font-bold mb-4">Personal Contact Book</h1>

        <a href="add_contact.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Contact
        </a>

        <table class="mt-6 w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Actions</th> 
                </tr> 
            </thead>
            <tbody>
                <?php if ($contacts->num_rows > 0) { ?>
                    <?php while ($row = $contacts->fetch_assoc()) { ?>
                        <tr>
                            <td class="p-3"><?php echo $row['name']; ?></td>
                            <td class="p-3"><?php echo $row['phone']; ?></td>
                            <td class="p-3"><?php echo $row['email']; ?></td>
                            <td class="p-3">
                                <a href="edit_contact.php?id=<?php echo $row['id']; ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <a href="delete_contact.php?id=<?php echo $row['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</a>
                            </td>
                        </tr> 
                    <?php } ?>
                <?php } else { ?>
                    <tr><td colspan="4" class="text-center p-4">No contacts found.</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
