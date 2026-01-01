<?php
/**
 * Application Bootstrap
 *
 * This file initializes the application, loads configuration,
 * and sets up autoloading for classes.
 */

// 1. Load Configuration
// Adjust path to config.php relative to this file
$configPath = __DIR__ . '/../config.php';

if (file_exists($configPath)) {
    require_once $configPath;
} else {
    die('FATAL ERROR: config.php is missing. Please copy config-sample.php to config.php and configure it.');
}

// 2. Error Reporting
if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// 3. Autoload classes from src/ directory
spl_autoload_register(function ($class_name) {
    // Define possible file paths (handling case sensitivity issues)
    $paths = [
        __DIR__ . '/' . $class_name . '.php',
        __DIR__ . '/' . strtolower($class_name) . '.php',
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
