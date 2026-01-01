<?php
require_once '../src/bootstrap.php';

$page_title = 'Admin Dashboard | ' . SITE_NAME;

// The header include handles session checking and redirects if not logged in
include 'includes/header.php';
?>

<div class="admin-header">
    <h1>Welcome to the Dashboard</h1>
    <p>This is the central hub for managing your website content and settings.</p>
</div>

<div class="why-choose-box">
    <h3>Quick Actions</h3>
    <p>Here are some quick links to get you started:</p>
    <ul>
        <li><a href="/admin/settings.php">Manage Site Settings</a></li>
        <li><a href="/admin/db-check.php">Run System Diagnostics</a></li>
        <li><a href="/" target="_blank">View Live Site</a></li>
    </ul>
</div>

<?php
include 'includes/footer.php';
?>