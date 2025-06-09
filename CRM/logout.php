<?php
session_start(); // Accedi alla sessione
require_once "log_helpers.php";
$uid = $_SESSION["user_id"] ?? null;
$uname = $_SESSION["username"] ?? "";
log_action($uid, $uname, "logout", "Logout");
session_unset(); // Rimuovi tutte le variabili di sessione
session_destroy(); // Distruggi la sessione
header("Location: login.php"); // Reindirizza alla pagina di login
exit;
?>