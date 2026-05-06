<?php
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid ID.";
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM trees WHERE tree_id = ?");
$stmt->execute([$id]);

echo "Deleted.";
?>