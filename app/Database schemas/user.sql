CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'member') NOT NULL DEFAULT 'member'
);

INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$12345hashedpasswordexample12345', 'admin'),
('john_doe', '$2y$10$examplehashpassword56789', 'member'),
('jane_doe', '$2y$10$anotherhashedpassword98765', 'member'),
('tennis_admin', '$2y$10$adminhashedpasswordexample', 'admin');
