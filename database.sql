CREATE DATABASE discord_logger;
USE discord_logger;

CREATE TABLE ip_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45) NOT NULL,
    user_agent TEXT,
    referer TEXT,
    timestamp DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
