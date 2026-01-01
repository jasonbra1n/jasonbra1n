<?php

/**
 * Session Class
 * 
 * Manages user sessions and login state.
 */
class Session {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Check if a user is currently logged in
     */
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Log the user in by setting session variables
     */
    public function login($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        session_regenerate_id(true); // Prevent session fixation
    }

    /**
     * Log the user out
     */
    public function logout() {
        // Clear the remember me cookie/token from the database
        if (isset($_COOKIE['remember_me'])) {
            $database = new Database();
            $db = $database->getConnection();
            $auth = new Auth($db);
            @list($selector) = explode(':', $_COOKIE['remember_me']);
            if ($selector) {
                $auth->clearTokenBySelector($selector);
            }
        }

        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        session_destroy();
        setcookie('remember_me', '', time() - 3600, '/'); // Expire the cookie
    }

    public function getUserId() {
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Get user data from session
     * @return stdClass|null Object with properties: id, username
     */
    public function getUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }
        $user = new stdClass();
        $user->id = $_SESSION['user_id'] ?? null;
        $user->username = $_SESSION['username'] ?? null;
        return $user;
    }

    /**
     * Check for a valid "Remember Me" cookie and log the user in if found.
     */
    public function checkRememberMe() {
        if (!$this->isLoggedIn() && isset($_COOKIE['remember_me'])) {
            $database = new Database();
            $db = $database->getConnection();
            $auth = new Auth($db);
            
            $userId = $auth->validateToken($_COOKIE['remember_me']);

            if ($userId) {
                $user = new User($db);
                if ($user->findById($userId)) {
                    $this->login($user);
                    
                    // Re-issue a new token for security (prevents token theft and reuse)
                    @list($selector) = explode(':', $_COOKIE['remember_me']);
                    $auth->clearTokenBySelector($selector);
                    $tokens = $auth->generateTokens($user->id);
                    $auth->setRememberMeCookie($tokens['selector'], $tokens['validator']);
                }
            }
        }
    }
}