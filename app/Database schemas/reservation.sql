CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    court INT NOT NULL CHECK (court IN (1, 2)),
    date DATE NOT NULL,
    time TINYINT NOT NULL CHECK (time BETWEEN 8 AND 20),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
