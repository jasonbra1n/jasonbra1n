<?php
// This header should be included on all protected admin pages.
// It starts the session and checks if the user is logged in.

// The bootstrap file is expected to be included before this header.
if (!isset($session)) {
    $session = new Session();
}

if (!$session->isLoggedIn()) {
    header("Location: /admin/login.php");
    exit;
}

$current_user = $session->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Admin | ' . SITE_NAME; ?></title>
    <link rel="stylesheet" href="/styles.css">
    <style>
        /* Admin-specific styles */
        :root {
            --admin-bg: #f4f7fa;
            --admin-nav-bg: #ffffff;
            --admin-nav-shadow: 0 2px 4px rgba(0,0,0,0.1);
            --admin-card-bg: #ffffff;
            --admin-text-dark: #2c3e50;
            --admin-text-light: #7f8c8d;
            --admin-primary: var(--color-accent-purple, #8146ff);
            --admin-accent: var(--color-accent-coral, #ff6f61);
        }
        body.admin-body {
            background-color: var(--admin-bg);
            color: var(--admin-text-dark);
            font-family: var(--font-family-main, 'Arial', sans-serif);
        }
        .admin-nav {
            background-color: var(--admin-nav-bg);
            box-shadow: var(--admin-nav-shadow);
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 1001;
        }
        .admin-nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            height: 60px;
        }
        .admin-nav-logo a {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--admin-primary);
            text-decoration: none;
        }
        .admin-nav-menu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1.5rem;
        }
        .admin-nav-menu a {
            text-decoration: none;
            color: var(--admin-text-dark);
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .admin-nav-menu a:hover, .admin-nav-menu a.active {
            color: var(--admin-primary);
        }
        .admin-nav-user a {
            color: var(--admin-accent);
            font-weight: bold;
        }
        .admin-header {
            background: var(--admin-card-bg);
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 0 0 15px 15px;
            box-shadow: var(--admin-nav-shadow);
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 2rem;
        }
    </style>
</head>
<body class="admin-body">
    <nav class="admin-nav">
        <div class="admin-nav-container">
            <div class="admin-nav-logo">
                <a href="/admin/">jasonbra1n CMS</a>
            </div>
            <div class="admin-nav-menu">
                <ul>
                    <li><a href="/admin/">Dashboard</a></li>
                    <li><a href="/admin/settings.php">Settings</a></li>
                    <li><a href="/admin/db-check.php">Diagnostics</a></li>
                </ul>
            </div>
            <div class="admin-nav-user">
                <span>Welcome, <?php echo htmlspecialchars($current_user->username); ?> | </span>
                <a href="/admin/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <main class="admin-container">