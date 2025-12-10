<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        header('Location: register.php?error=All fields are required');
        exit;
    }

    if ($password !== $confirm_password) {
        header('Location: register.php?error=Passwords do not match');
        exit;
    }

    if (strlen($password) < 6) {
        header('Location: register.php?error=Password must be at least 6 characters');
        exit;
    }

    // Check if username already exists
    if (findUserByUsername($username)) {
        header('Location: register.php?error=Username already exists');
        exit;
    }

    // Check if email already exists
    if (findUserByEmail($email)) {
        header('Location: register.php?error=Email already exists');
        exit;
    }

    // Create user
    try {
        createUser($username, $email, $password);
        header('Location: signin.php?success=Account created! Please sign in.');
        exit;
    } catch (Exception $e) {
        header('Location: register.php?error=Error creating account');
        exit;
    }
}
?>