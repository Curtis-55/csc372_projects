
<?php
require 'db.php'


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if ($title === "") {
        echo "Title is required.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO trees (user_id, title, description) VALUES (1, ?, ?)");
        $stmt->execute([$title, $description]);

        echo "Tree created!";
    }
}
?>

<form method="POST">
    <input name="title" placeholder="Tree Title">
    <textarea name="description"></textarea>
    <button type="submit">Create</button>
</form>