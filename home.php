<?php
session_start();
include 'config.php';
include 'functions.php';
include 'db_init.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$projects = get_user_projects($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to Your Home Page</h1>
    <h2>Your Projects</h2>
    <ul>
        <?php foreach ($projects as $project): ?>
            <li><?= $project['name'] ?> - <?= $project['status'] ?></li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="create_project.php">
        <label for="project_name">New Project:</label>
        <input type="text" name="project_name" required>
        <label for="status">Status:</label>
        <select name="status">
            <option value="completed">Completed</option>
            <option value="not done">Not Done</option>
        </select>
        <input type="submit" name="create_project" value="Create Project">
    </form>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
