<?php
/**
 * Application Bootstrap
 *
 * This file initializes the application, loads configuration,
 * and sets up autoloading for classes.
 */

// 1. Load Configuration
if (file_exists(__DIR__ . '/../config.php')) {
    require_once __DIR__ . '/../config.php';
} else {
    die('FATAL ERROR: config.php is missing. Please copy config-sample.php to config.php and configure it.');
}

// 2. TODO: Add a simple autoloader here in the future
// spl_autoload_register(function ($class_name) {
//     include 'src/' . $class_name . '.php';
// });