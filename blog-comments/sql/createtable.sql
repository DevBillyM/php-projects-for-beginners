CREATE TABLE users (
    userID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    role ENUM('admin', 'author', 'subscriber') DEFAULT 'subscriber', 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comments (
	commentID INT PRIMARY KEY AUTO_INCREMENT,
    postID INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    comment TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (postID) REFERENCES blog_posts(postID)
);

CREATE TABLE blog_posts (
    postID INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,  
    content TEXT NOT NULL,
    authorID INT NOT NULL, 
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('published', 'draft') DEFAULT 'draft', 
    FOREIGN KEY (authorID) REFERENCES users(userID) 
); 