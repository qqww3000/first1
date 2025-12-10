<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h3>Dashboard</h3>
        <div class="nav">
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <main>
        <h2>You are logged in!</h2>
        <p>This is your dashboard. Only logged-in users can see this.</p>
    </main>

    <footer>
        <p>&copy; 2025 My Site</p>
    </footer>
</body>
</html>