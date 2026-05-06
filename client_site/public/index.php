<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM trees");
$trees = $stmt->fetchAll();

if (!$trees) {
    echo "No trees found.";
} else {
    foreach ($trees as $tree) {
        echo "<h3>" . htmlspecialchars($tree['title']) . "</h3>";
        echo "<p>" . htmlspecialchars($tree['description']) . "</p>";
        echo "<a href='view.php?id=" . $tree['tree_id'] . "'>View Tree</a><hr>";
    }
}
?>