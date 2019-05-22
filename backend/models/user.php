<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "finalProject";

// Create connection
$dbConnection = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
} 

// sql to create table
$userModel = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'user',
    createdAt TIMESTAMP
)";

if ($dbConnection->query($userModel) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $dbConnection->error;
}

$dbConnection->close();
