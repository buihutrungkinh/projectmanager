<?php
session_start();
include 'db_init.php';
include 'config.php';
include 'functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticate_user($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: home.php');
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($login_error)) { echo "<p>$login_error</p>"; } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
