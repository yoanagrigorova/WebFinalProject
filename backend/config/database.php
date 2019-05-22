<?php
class Database
{

    private $host = "localhost";
    private $db_name = "finalProject";
    private $username = "root";
    private $password = "";
    public $conn;

    public function create()
    {
        $dbConnection = new mysqli($this->host, $this->username);
        // Check connection
        if ($dbConnection->connect_error) {
            die("Connection failed: " . $dbConnection->connect_error);
        }

        // Create database
        $dataBase = "CREATE DATABASE IF NOT EXISTS finalProject";
        if ($dbConnection->query($dataBase) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $dbConnection->error;
        }
    }

    public function getConnection()
    {

        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
