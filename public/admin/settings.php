<?php
require_once '../src/bootstrap.php';

$page_title = 'Site Settings | ' . SITE_NAME;

include 'includes/header.php';

$database = new Database();
$db = $database->getConnection();
$settings = new Settings($db);

$message = '';
$messageType = '';

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updates = $_POST['settings'] ?? [];
    $successCount = 0;
    $errorCount = 0;

    foreach ($updates as $key => $value) {
        if ($settings->update($key, $value)) {
            $successCount++;
        } else {
            $errorCount++;
        }
    }

    if ($errorCount === 0 && $successCount > 0) {
        $message = "Settings updated successfully.";
        $messageType = "success";
    } elseif ($errorCount > 0) {
        $message = "Some settings could not be updated.";
        $messageType = "error";
    } else {
        $message = "No changes made.";
        $messageType = "info";
    }
}

// Fetch all settings to display
$all_settings = $settings->getAll();
?>

<div class="admin-header">
    <h1>Site Settings</h1>
    <p>Manage global configuration for your website.</p>
</div>

<div class="admin-content">
    <?php if ($message): ?>
        <div class="alert" style="padding: 1rem; margin-bottom: 1rem; border-radius: 5px; 
            <?php 
                if ($messageType == 'success') echo 'background: #d4edda; color: #155724; border: 1px solid #c3e6cb;';
                elseif ($messageType == 'error') echo 'background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;';
                else echo 'background: #e2e3e5; color: #383d41; border: 1px solid #d6d8db;';
            ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <div class="why-choose-box">
        <form action="settings.php" method="POST">
            <?php if (empty($all_settings)): ?>
                <p>No settings found in the database.</p>
            <?php else: ?>
                <?php foreach ($all_settings as $setting): ?>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="setting_<?php echo $setting['setting_key']; ?>" style="display: block; font-weight: bold; margin-bottom: 0.5rem;">
                            <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $setting['setting_key']))); ?>
                        </label>
                        
                        <?php if ($setting['setting_key'] === 'maintenance_mode'): ?>
                            <select name="settings[<?php echo $setting['setting_key']; ?>]" id="setting_<?php echo $setting['setting_key']; ?>" class="form-input" style="width: 100%; padding: 0.5rem;">
                                <option value="0" <?php echo $setting['setting_value'] == '0' ? 'selected' : ''; ?>>Off</option>
                                <option value="1" <?php echo $setting['setting_value'] == '1' ? 'selected' : ''; ?>>On</option>
                            </select>
                        <?php else: ?>
                            <input type="text" 
                                   name="settings[<?php echo $setting['setting_key']; ?>]" 
                                   id="setting_<?php echo $setting['setting_key']; ?>" 
                                   value="<?php echo htmlspecialchars($setting['setting_value']); ?>" 
                                   class="form-input" 
                                   style="width: 100%; padding: 0.5rem;">
                        <?php endif; ?>
                        
                        <?php if (!empty($setting['description'])): ?>
                            <small style="color: #666; display: block; margin-top: 0.25rem;"><?php echo htmlspecialchars($setting['description']); ?></small>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                
                <div style="margin-top: 2rem;">
                    <button type="submit" class="cta-button">Save Changes</button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>