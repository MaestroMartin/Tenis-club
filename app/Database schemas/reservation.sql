CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    court INT NOT NULL CHECK (court IN (1, 2)),
    date DATE NOT NULL,
    time TINYINT NOT NULL CHECK (time BETWEEN 8 AND 20),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO reservations (user_id, court, date, time) VALUES
(1, 1, '2025-02-26', 10),
(2, 2, '2025-02-27', 12),
(3, 1, '2025-02-27', 14),
(2, 1, '2025-02-28', 16),
(4, 2, '2025-02-28', 18);
