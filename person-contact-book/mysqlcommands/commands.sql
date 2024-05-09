-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS contactbook;
USE contactbook;

-- Create the 'contacts' table
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL
);

-- Optional: Insert sample data into the 'contacts' table
INSERT INTO contacts (name, email, phone) VALUES ('Alice Smith', 'alice.smith@example.com', '123-456-7890');
INSERT INTO contacts (name, email, phone) VALUES ('Bob Johnson', 'bob.johnson@example.com', '234-567-8901');
