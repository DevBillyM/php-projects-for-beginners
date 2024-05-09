<?php

include_once(PROJECT_ROOT . '/db/config.php');  // Go one level up and into the 'db' folder

// Function to get all contacts
function getAllContacts() {
    global $conn; 
    $sql = "SELECT * FROM contacts ORDER BY name"; 
    $result = $conn->query($sql);
    return $result; 
}

function addContact($name, $phone, $email) {
    global $conn;

    // 1. Escape user input to prevent SQL injection (IMPORTANT!)
    $name = $conn->real_escape_string($name);
    $phone = $conn->real_escape_string($phone);
    $email = $conn->real_escape_string($email);

    // 2. SQL query to insert data
    $sql = "INSERT INTO contacts (name, phone, email) VALUES ('$name', '$phone', '$email')"; 

    // 3. Execute the query and handle the result
    if ($conn->query($sql) === TRUE) {
        // Contact added successfully - You might want to return the newly created ID or a success message
        return true; 
    } else {
        // Error during insertion.  You might want to return an error message or log the error:
        return false; 
    }
}

// Detele contact
function deleteContact($id) {
    global $conn;

    // Escape the ID (helps prevent SQL injection)
    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM contacts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true; // Contact deleted successfully
    } else { 
        return false; // Error during deletion
    }
}

// Get by id
function getContactById($id) {
    global $conn;

    $id = $conn->real_escape_string($id);
    $sql = "SELECT * FROM contacts WHERE id = $id";  
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null; 
    }
}

function updateContact($id, $name, $phone, $email) {
    global $conn;

    // Escape user input (Important for security)
    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $phone = $conn->real_escape_string($phone);
    $email = $conn->real_escape_string($email);

    // SQL query to update the data
    $sql = "UPDATE contacts SET name = '$name', phone = '$phone', email = '$email'  WHERE id = $id"; 

    // Execute the query and handle the result
    if ($conn->query($sql) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}



?> 
