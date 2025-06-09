<?php
session_start();
ini_set('log_errors', 1);
ini_set('error_log', 'C:/xampp/php_error.log');
error_reporting(E_ALL);
ini_set('display_errors', 0);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['ruolo'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$log_file = 'C:/xampp/php_error.log';
$logs = file_exists($log_file) ? file_get_contents($log_file) : 'File di log non trovato.';

$username_display = htmlspecialchars($_SESSION['username']);
$user_role_display = htmlspecialchars($_SESSION['ruolo']);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Log di Sistema</title>
    <link rel="stylesheet" href="style.css">
    <style>
        pre.log-output {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            max-height: 600px;
            overflow-y: auto;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
<div class="page-container">
    <header class="page-header">
        <div class="header-branding">
            <a href="dashboard.php" class="header-logo-link"><img src="logo.png" alt="Logo Gruppo Vitolo" class="logo"></a>
            <div class="header-titles">
                <h1>Log Utenti</h1>
                <h2>Azioni e tentativi di login</h2>
            </div>
        </div>
        <div class="user-session-controls">
            <div class="user-info">
                <span><strong><?php echo $username_display; ?></strong></span>
                <span><?php echo $user_role_display; ?></span>
            </div>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </header>

    <div class="module-content">
        <pre class="log-output"><?php echo htmlspecialchars($logs); ?></pre>
    </div>
</div>
</body>
</html>
