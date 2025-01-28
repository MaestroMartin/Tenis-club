CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'member') NOT NULL DEFAULT 'member'
);


INSERT INTO users (first_name, last_name, email, password, role) VALUES
('Admin', 'User', 'admin@example.com', '$2y$12$examplehashedpassword1', 'admin'),
('John', 'Doe', 'john.doe@example.com', '$2y$12$examplehashedpassword2', 'member'),
('Jane', 'Doe', 'jane.doe@example.com', '$2y$12$examplehashedpassword3', 'member'),
('Tennis', 'Admin', 'tennis.admin@example.com', '$2y$12$examplehashedpassword4', 'admin');
