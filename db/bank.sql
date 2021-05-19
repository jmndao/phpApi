-- Database Creation BANK

CREATE DATABASE BANK;
USE BANK;

-- Table for Clients

CREATE TABLE Client (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    accountNo VARCHAR(255),
    amount DECIMAL(10, 4),
    code VARCHAR(255),
    startedDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
);

-- Inserting clients in the table Client

INSERT INTO Client (first_name, last_name , accountNo, amount, code) VALUES ('Abu','Ibrahim','CompteNDAO',50000,'1234'),('Muhammad','SAGNA','CompteSAGNA',50000,'2323');


-- Table for Account Managers

CREATE TABLE AccountManager(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    username VARCHAR(255),
    password VARCHAR(255),
);

-- Insert Account Manager in the Table AccountManager

INSERT INTO AccountManager (first_name, last_name, username, password) VALUES ('Moustapha','TALL','mmtal','passer123'),('Kalidou','FALL','kalidou','passer321');

