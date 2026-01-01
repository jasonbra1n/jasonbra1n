<?php

/**
 * Database Connection Class
 * 
 * Handles the PDO connection to the MariaDB database.
 * Relies on constants defined in config.php.
 */
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $charset;
    public $conn;

    public function __construct() {
        // Ensure config constants are available
        if (!defined('DB_HOST')) {
            die('Database configuration is missing. Please check config.php.');
        }
        
        $this->host = DB_HOST;
        $this->db_name = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->charset = defined('DB_CHARSET') ? DB_CHARSET : 'utf8mb4';
    }

    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch(PDOException $exception) {
            // Log the detailed error for the developer
            error_log("Database Connection Error: " . $exception->getMessage());
            // Provide a user-friendly error and stop execution
            die('FATAL ERROR: Could not connect to the database. Please check your credentials in config.php and ensure the database server is running.');
        }

        return $this->conn;
    }
}