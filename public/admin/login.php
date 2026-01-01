<?php
require_once '../src/bootstrap.php';

$session = new Session();

// Redirect if already logged in
if ($session->isLoggedIn()) {
    header("Location: /admin/");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $remember_me = isset($_POST['remember_me']);

        if ($user->login($email, $password)) {
            $session->login($user);

            if ($remember_me) {
                $auth = new Auth($db);
                $tokens = $auth->generateTokens($user->id);
                $auth->setRememberMeCookie($tokens['selector'], $tokens['validator']);
            }

            header("Location: /admin/");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } catch (Throwable $e) {
        error_log("Login Page Error: " . $e->getMessage());
        $error = (defined('ENVIRONMENT') && ENVIRONMENT === 'development')
            ? "Error: " . $e->getMessage()
            : "An error occurred. Please try again later.";
    }
}

$page_title = 'Admin Login | ' . SITE_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../head.php'; ?>
</head>
<body>
    <!-- Simple Header -->
    <header style="height: 40vh; min-height: 300px;">
        <div class="header-background"></div>
        <div class="header-gradient"></div>
        <div class="header-content">
            <h1>Admin Access</h1>
            <p>Restricted Area</p>
        </div>
    </header>

    <div class="container">
        <div class="contact-form-container" style="max-width: 400px; margin: 0 auto;">
            <h3 style="text-align: center; margin-bottom: 1.5rem; color: var(--color-primary-bg);">Login</h3>
            
            <?php if ($error): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required class="form-input">
                </div>
                <div class="form-group" style="display: flex; align-items: center; margin-bottom: 1rem; justify-content: flex-start;">
                    <input type="checkbox" id="remember_me" name="remember_me" style="margin-right: 0.5rem; width: auto;">
                    <label for="remember_me" class="form-label" style="margin-bottom: 0; font-weight: normal;">Remember Me</label>
                </div>
                <button type="submit" class="form-submit-button" style="width: 100%;">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>