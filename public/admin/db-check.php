<?php
require_once '../src/bootstrap.php';

$page_title = 'System Diagnostics | ' . SITE_NAME;

include 'includes/header.php';
// Check Database Connection manually to avoid the die() in Database class
$db_status = 'Unknown';
$db_message = '';
$db_color = 'orange';

try {
    if (!defined('DB_HOST')) {
        throw new Exception("Database constants not defined.");
    }
    
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . (defined('DB_CHARSET') ? DB_CHARSET : 'utf8mb4');
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    $db_status = 'Connected';
    $db_message = 'Connection successful.';
    $db_color = 'green';
} catch (Exception $e) {
    $db_status = 'Connection Failed';
    $db_message = $e->getMessage();
    $db_color = 'red';
}

// Check for tables if connection was successful
$tables_status = [];
if ($db_status === 'Connected') {
    $tables_to_check = ['users', 'settings', 'auth_tokens'];
    foreach ($tables_to_check as $table) {
        $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
        $tables_status[$table] = ($stmt->rowCount() > 0)
            ? ['status' => 'Found', 'color' => 'green']
            : ['status' => 'Missing', 'color' => 'red'];
    }
}

?>
<div class="admin-header">
    <h1>System Diagnostics</h1>
    <p>Database &amp; PHP Configuration</p>
</div>
        
        <!-- Database Status -->
        <div class="why-choose-box" style="border-left-color: <?php echo $db_color; ?>;">
            <h3>Database Connection</h3>
            <p><strong>Status:</strong> <span style="color: <?php echo $db_color; ?>; font-weight: bold;"><?php echo $db_status; ?></span></p>
            <p><strong>Host:</strong> <?php echo defined('DB_HOST') ? DB_HOST : 'Not defined'; ?></p>
            <p><strong>Database:</strong> <?php echo defined('DB_NAME') ? DB_NAME : 'Not defined'; ?></p>
            <p><strong>User:</strong> <?php echo defined('DB_USER') ? DB_USER : 'Not defined'; ?></p>
            <?php if ($db_message): ?>
                <div style="background: rgba(0,0,0,0.05); padding: 1rem; border-radius: 5px; margin-top: 1rem; font-family: monospace;">
                    <?php echo htmlspecialchars($db_message); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($tables_status)): ?>
        <div class="why-choose-box">
            <h3>Schema Check</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <?php foreach ($tables_status as $table => $status): ?>
                    <div><strong>Table `<?php echo $table; ?>`:</strong></div>
                    <div>
                        <span style="color: <?php echo $status['color']; ?>; font-weight: bold;">
                            <?php echo $status['status']; ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- PHP Info -->
        <div class="why-choose-box">
            <h3>PHP Environment</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div><strong>PHP Version:</strong></div>
                <div><?php echo phpversion(); ?></div>
                
                <div><strong>Server Software:</strong></div>
                <div><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></div>
                
                <div><strong>Display Errors:</strong></div>
                <div><?php echo ini_get('display_errors') ? 'On' : 'Off'; ?></div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="/admin/" class="cta-button">Back to Dashboard</a>
        </div>
<?php
include 'includes/footer.php';
?>