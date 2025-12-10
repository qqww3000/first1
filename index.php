<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h3>Welcome to market</h3>
        <div class="nav">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="signin.php">Sign in</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </header>

    <main>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>You are logged in! Welcome back.</p>
        <?php else: ?>
            <p>Please sign in or register to continue.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 My Site</p>
    </footer>
</body>
</html>