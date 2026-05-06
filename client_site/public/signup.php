<?php
include 'validation.php';

$values = [
    'username' => '',
    'email' => '',
    'age' => '',
    'type' => ''
];

$errors = [
    'username' => '',
    'email' => '',
    'age' => '',
    'type' => ''
];

$message = '';

$allowedTypes = ['Basic', 'Pro'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $values['username'] = $_POST['username'] ?? '';
    $values['email'] = $_POST['email'] ?? '';
    $values['age'] = $_POST['age'] ?? '';
    $values['type'] = $_POST['type'] ?? '';

    // Username validation
    if (!validateText($values['username'], 3, 20)) {
        $errors['username'] = "Username must be 3–20 characters.";
    }

    // Email validation
    if (!validateEmail($values['email'])) {
        $errors['email'] = "Enter a valid email address.";
    }

    // Age validation
    if (!validateNumber($values['age'], 13, 110)) {
        $errors['age'] = "Age must be between 13 and 110.";
    }

    // Account type validation
    if (!validateOption($values['type'], $allowedTypes)) {
        $errors['type'] = "Select an account type.";
    }

    // Final check
    if (implode('', $errors) === '') {
        $message = "ThinkTree account created!";
    } else {
        $message = "Please fix the errors below.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ThinkTree Signup</title>
    <style>
        body { font-family: Arial; background:#eef; padding:20px; }
        .box { background:white; padding:20px; max-width:500px; border-radius:8px; }
        .error { color:red; font-size:0.9em; }
        input { width:100%; padding:8px; margin-top:5px; }
        button { margin-top:10px; padding:10px; background:#4CAF50; color:white; border:none; }
    </style>
</head>
<body>

<div class="box">

<h2> Create Your ThinkTree Account</h2>

<p><?php echo $message; ?></p>

<form method="POST">

    <!-- add username -->
    <label>Username</label>
    <input type="text" name="username"
        value="<?php echo htmlspecialchars($values['username']); ?>">
    <div class="error"><?php echo $errors['username']; ?></div>

    <!-- add email -->
    <label>Email</label>
    <input type="email" name="email"
        value="<?php echo htmlspecialchars($values['email']); ?>">
    <div class="error"><?php echo $errors['email']; ?></div>

    <!-- add age -->
    <label>Age</label>
    <input type="number" name="age"
        value="<?php echo htmlspecialchars($values['age']); ?>">
    <div class="error"><?php echo $errors['age']; ?></div>

    <!-- account type selector -->
    <label>Account Type</label><br>
    <input type="radio" name="type" value="basic"
        <?php if ($values['type']=='basic') echo 'checked'; ?>> Basic<br>
    <input type="radio" name="type" value="pro"
        <?php if ($values['type']=='pro') echo 'checked'; ?>> Pro<br>
    <div class="error"><?php echo $errors['type']; ?></div>

    <button type="submit">Sign Up</button>

</form>

</div>

</body>
</html>