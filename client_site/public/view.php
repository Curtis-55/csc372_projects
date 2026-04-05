<?php
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid ID.";
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM trees WHERE tree_id = ?");
$stmt->execute([$id]);

$tree = $stmt->fetch();

if (!$tree) {
    echo "Tree not found.";
} else {
    echo "<h2>" . htmlspecialchars($tree['title']) . "</h2>";
    echo "<p>" . htmlspecialchars($tree['description']) . "</p>";
}
?>