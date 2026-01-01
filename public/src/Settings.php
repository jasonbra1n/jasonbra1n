<?php

/**
 * Settings Class
 * 
 * Handles fetching and updating site configuration from the database.
 */
class Settings {
    private $conn;
    private $table_name = "settings";

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Get all settings
     * @return array
     */
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY setting_key ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a single setting value by key
     * @param string $key
     * @return string|null
     */
    public function get($key) {
        $query = "SELECT setting_value FROM " . $this->table_name . " WHERE setting_key = :key LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':key', $key);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['setting_value'];
        }
        return null;
    }

    /**
     * Update a setting value
     * @param string $key
     * @param string $value
     * @return boolean
     */
    public function update($key, $value) {
        $query = "UPDATE " . $this->table_name . " SET setting_value = :value WHERE setting_key = :key";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize input if necessary, but generally admin input is trusted
        // We bind parameters to prevent SQL injection
        $stmt->bindParam(':value', $value);
        $stmt->bindParam(':key', $key);
        
        return $stmt->execute();
    }
}