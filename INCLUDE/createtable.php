<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection Failed". mysqli_connect_error());
}

$sql1 = "CREATE TABLE IF NOT EXISTS membership (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    loginID VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";

$sqli2 = "CREATE TABLE IF NOT EXISTS workshop (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    street VARCHAR(100) NOT NULL,
    city VARCHAR(25) NOT NULL,
    state TEXT,
    postcode INT(6) NOT NULL,
    membershiptype TEXT,
    interests TEXT,
    phone INT(20) NOT NULL,
    dateofbirth DATE NOT NULL,
    participants INT NOT NULL,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqli3 = "CREATE TABLE IF NOT EXISTS enquiry (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(25) NOT NULL,
    lastname VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phonenumber INT(10) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    contact_method TEXT,
    interests TEXT,
    enquiry_type TEXT,
    preferred_date DATE NOT NULL,
    comments TEXT NOT NULL,
    priority INT NOT NULL
)";

$sqli4 = "CREATE TABLE IF NOT EXISTS user (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    profile_pic VARCHAR(255) DEFAULT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sqli5 = "CREATE TABLE IF NOT EXISTS submission_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_identifier VARCHAR(100) NOT NULL,
    form_type VARCHAR(50) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_user_time (user_identifier, form_type, submitted_at)
)";

$sqli6 = "CREATE TABLE IF NOT EXISTS spam_blocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_identifier VARCHAR(100) NOT NULL,
    reason TEXT NOT NULL,
    blocked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    block_until DATETIME NOT NULL,
    INDEX idx_user_block (user_identifier, block_until)
)";

mysqli_query($conn, $sql1);
mysqli_query($conn, $sqli2);
mysqli_query($conn, $sqli3);
mysqli_query($conn, $sqli4);
mysqli_query($conn, $sqli5);
mysqli_query($conn, $sqli6);
mysqli_close($conn);
?>