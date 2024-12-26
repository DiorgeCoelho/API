CREATE DATABASE swapi_logs;

USE swapi_logs;

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    request_url TEXT NOT NULL,
    request_method VARCHAR(10) NOT NULL,
    response_status INT NOT NULL,
    created_at DATETIME NOT NULL
);
