<?php
require_once '../src/bootstrap.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        // Hash the new password
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE users SET password_hash = :password WHERE email = :email";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $message = "Password reset successfully! <a href='login.php'>Login here</a>. <br><strong>IMPORTANT: Delete this file (reset_password.php) from the server immediately.</strong>";
            } else {
                $message = "No user found with that email address.";
            }
        } else {
            $message = "Database error: Unable to update password.";
        }
    } else {
        $message = "Please fill in all fields.";
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
            <h2 style="color: var(--color-primary-bg); text-align: center;">Emergency Password Reset</h2>
            <p style="text-align: center; color: red; font-weight: bold;">Warning: Delete this file after use.</p>
            
            <?php if ($message): ?>
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="reset_password.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" required class="form-input" placeholder="Enter your admin email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" required class="form-input" placeholder="Enter new password">
                </div>
                <button type="submit" class="form-submit-button">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>