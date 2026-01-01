<?php

/**
 * User Class
 * 
 * Handles user authentication and management.
 */
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Verify user credentials
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function login($email, $password) {
        $query = "SELECT id, username, password_hash FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize
        $email = htmlspecialchars(strip_tags($email));
        
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verify password hash
            if (password_verify($password, $row['password_hash'])) {
                $this->id = $row['id'];
                $this->username = $row['username'];
                return true;
            }
        }
        return false;
    }

    /**
     * Create a new user (for initial setup or admin panel)
     */
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, password_hash=:password_hash, created_at=NOW()";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        // Hash the password before saving
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password_hash", $password_hash);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}