<?php
// connection.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment_system";

// CREATE TABLE students (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     idnumber VARCHAR(50) NOT NULL,
//     firstname VARCHAR(100) NOT NULL,
//     middlename VARCHAR(100),
//     lastname VARCHAR(100) NOT NULL,
//     birthdate DATE NOT NULL,
//     fulladdress TEXT NOT NULL,
//     phonenumber VARCHAR(15) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     civilstatus ENUM('Single', 'Married', 'Divorced', 'Widowed') NOT NULL,
//     gender ENUM('Male', 'Female', 'Others') NOT NULL,
//     appointment_date DATE NOT NULL,
//     appointment TEXT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

// CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     password VARCHAR(255) NOT NULL
// );

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function handle_sql_error($conn, $query)
{
    if (!$query) {
        echo "Error: " . $conn->error;
        $conn->close();
        exit;
    }
}

function close_connection($conn)
{
    $conn->close();
}

?>