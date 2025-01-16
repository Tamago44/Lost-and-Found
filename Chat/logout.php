<?php
require 'db.php';
if (isset($_GET['token'])) {
    $stmt = $pdo->prepare("UPDATE users SET token = NULL WHERE token = ?");
    $stmt->execute([$_GET['token']]);
}
header("Location: index.php");
?>
