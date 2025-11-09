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
    loginID VARCHAR(10) NOT NULL,
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
    loginID VARCHAR(10) NOT NULL,
    password VARCHAR(25) NOT NULL,
    membershiptype TEXT,
    interests TEXT,
    phone INT(10) NOT NULL,
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

mysqli_query($conn, $sql1);
mysqli_query($conn, $sqli2);
mysqli_query($conn, $sqli3);
mysqli_close($conn);
?>