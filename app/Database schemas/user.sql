CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'member') NOT NULL DEFAULT 'member'
);

INSERT INTO users (first_name, last_name, username, email, password, role) VALUES
('Admin', 'User', 'admin', 'admin@example.com', '$2y$12$examplehashedpassword1', 'admin'),
('John', 'Doe', 'john_doe', 'john.doe@example.com', 'dcffce09862520d2eb2c98534ee8caf446a6664e57f64ce5d3d1c33418971a1a', 'member'), // password: 'johnpass'
('Jane', 'Doe', 'jane_doe', 'jane.doe@example.com', '100e060425c270b01138bc4ed9b498897d2ec525baa766d9a57004b318e99e19' , 'member'), // password: 'janepass'
('Tennis', 'Admin', 'tennis_admin', 'tennis.admin@example.com', '05d0905c09e544d3cffb5ddf68736b99757bc1e33c4e6890b94d1244fb3f06e5', 'admin'); //password: 'tennispass'

UPDATE users SET password = '$2y$12$examplehashedpassword1' WHERE email = 'admin@example.com';
UPDATE users SET password = '$2y$10$pk79QPzROvg2zKl1r5P1VOOGjuWt/f4UVIZtHZhroV9/3lR9DWwBO' WHERE email = 'john.doe@example.com';
UPDATE users SET password = '$2y$10$d8TNG7Cq9D2WWDxQ3FTMAuMYSPg8q5DRDvkiv3VHUOjFMoeEDwOrO' WHERE email = 'jane.doe@example.com';
UPDATE users SET password = '$2y$10$dyzI/EPvf0JmnrS3GKebru4KxgFCOIkAKSlDcgJeWmBFd/5JrBOKa' WHERE email = 'tennis.admin@example.com';
