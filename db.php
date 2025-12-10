<?php
// Simple file-based user storage (JSON)
$usersFile = __DIR__ . '/users.json';

// Initialize users file if it doesn't exist
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

// Get all users
function getAllUsers() {
    global $usersFile;
    $data = file_get_contents($usersFile);
    return json_decode($data, true) ?: [];
}

// Save users
function saveUsers($users) {
    global $usersFile;
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
}

// Find user by username
function findUserByUsername($username) {
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}

// Find user by email
function findUserByEmail($email) {
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}

// Create new user
function createUser($username, $email, $password) {
    $users = getAllUsers();
    $newUser = [
        'id' => count($users) + 1,
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s')
    ];
    $users[] = $newUser;
    saveUsers($users);
    return $newUser;
}

// Verify user login
function verifyUser($username, $password) {
    $user = findUserByUsername($username);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return null;
}
?>