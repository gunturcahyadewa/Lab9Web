CREATE DATABASE IF NOT EXISTS db_latihan CHARACTER SET utf8mb4;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL
);

INSERT INTO users (nama, email) VALUES
('Rina', 'rina@email.com'),
('Budi', 'budi@email.com');
