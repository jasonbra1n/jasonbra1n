<?php
require_once '../src/bootstrap.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Manually connect to the database, bypassing the Database class which is not being found.
        // This pattern is based on the working db-check.php script.
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . (defined('DB_CHARSET') ? DB_CHARSET : 'utf8mb4');
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $db = new PDO($dsn, DB_USER, DB_PASS, $options);

        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($username) && !empty($email) && !empty($password)) {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            
            $query = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);

            if ($stmt->execute()) {
                $message = "User created successfully! <a href='login.php'>Login here</a>. <br><strong>IMPORTANT: Delete this file (setup.php) now.</strong>";
            } else {
                $message = "Unable to create user. The email or username might already exist.";
            }
        } else {
            $message = "Please fill in all fields.";
        }
    } catch (Throwable $e) {
        error_log("Setup Page Error: " . $e->getMessage());
        $message = (defined('ENVIRONMENT') && ENVIRONMENT === 'development')
            ? "Error: " . $e->getMessage()
            : "A critical error occurred. Please check the server logs.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
</head>
<body>
    <div class="container" style="margin-top: 5rem;">
        <div class="contact-form-container" style="max-width: 500px; margin: 0 auto;">
            <h2 style="color: var(--color-primary-bg); text-align: center;">Create Admin User</h2>
            <p style="text-align: center; color: red; font-weight: bold;">Warning: Delete this file after use.</p>
            
            <?php if ($message): ?>
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="setup.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" required class="form-input">
                </div>
                <button type="submit" class="form-submit-button">Create User</button>
            </form>
        </div>
    </div>
</body>
</html>