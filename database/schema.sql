-- Creating the data base
CREATE DATABASE app_prueba_tecnica;

-- Selecting the data base
USE app_prueba_tecnica;

-- Creating the diferents tables

-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL UNIQUE,
  name VARCHAR(255) NOT NULL,
  surname VARCHAR(255) NOT NULL,
  avatar VARCHAR(255),
  password VARCHAR(20) NOT NULL,
  role ENUM('admin', 'user') NOT NULL
);

-- Videos table
CREATE TABLE videos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);