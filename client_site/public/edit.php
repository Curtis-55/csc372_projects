<?php
require 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid ID.";
    exit;
}

$id = (int) $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);

    $stmt = $pdo->prepare("UPDATE trees SET title = ? WHERE tree_id = ?");
    $stmt->execute([$title, $id]);

    echo "Updated!";
}
?>

<form method="POST">
    <input name="title" placeholder="New Title">
    <button type="submit">Update</button>
</form>