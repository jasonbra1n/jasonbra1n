<?php

/**
 * Auth Class
 * 
 * Handles persistent login tokens ("Remember Me").
 */
class Auth {
    private $db;
    private $table_name = "auth_tokens";

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Generate and store new tokens for a user.
     * @param int $userId
     * @return array ['selector' => string, 'validator' => string]
     */
    public function generateTokens($userId) {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));
        $hashedValidator = password_hash($validator, PASSWORD_DEFAULT);
        $expires = new DateTime('now');
        $expires->add(new DateInterval('P30D')); // 30-day expiry

        $stmt = $this->db->prepare(
            "INSERT INTO " . $this->table_name . " (selector, hashed_validator, user_id, expires) VALUES (:selector, :hashed_validator, :user_id, :expires)"
        );
        $stmt->execute([
            'selector' => $selector,
            'hashed_validator' => $hashedValidator,
            'user_id' => $userId,
            'expires' => $expires->format('Y-m-d H:i:s')
        ]);

        return ['selector' => $selector, 'validator' => $validator];
    }

    /**
     * Set the "Remember Me" cookie.
     * @param string $selector
     * @param string $validator
     */
    public function setRememberMeCookie($selector, $validator) {
        // Cookie expires in 30 days, is httpOnly, and secure (if on HTTPS)
        $is_secure = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');
        setcookie('remember_me', $selector . ':' . $validator, time() + (86400 * 30), '/', '', $is_secure, true);
    }

    /**
     * Validate a token from a cookie.
     * @param string $cookieValue
     * @return int|null The user ID on success, null on failure.
     */
    public function validateToken($cookieValue) {
        @list($selector, $validator) = explode(':', $cookieValue);

        if (!$selector || !$validator) {
            return null;
        }

        $stmt = $this->db->prepare("SELECT * FROM " . $this->table_name . " WHERE selector = :selector AND expires >= NOW()");
        $stmt->execute(['selector' => $selector]);
        $token = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($token && password_verify($validator, $token['hashed_validator'])) {
            return (int)$token['user_id'];
        }

        return null;
    }

    /**
     * Clear a specific token from the database by its selector.
     * @param string $selector
     */
    public function clearTokenBySelector($selector) {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table_name . " WHERE selector = :selector");
        $stmt->execute(['selector' => $selector]);
    }
}