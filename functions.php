<?php
function create_user($username, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    $conn->query($sql);
}

function authenticate_user($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}

function create_project($user_id, $name, $status) {
    global $conn;
    $sql = "INSERT INTO projects (user_id, name, status) VALUES ('$user_id', '$name', '$status')";
    $conn->query($sql);
}

function get_user_projects($user_id) {
    global $conn;
    $sql = "SELECT * FROM projects WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    $projects = [];
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }

    return $projects;
}
?>
