<?php
session_start();
include 'config.php';
include 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['create_project'])) {
    $project_name = $_POST['project_name'];
    $status = $_POST['status'];
    create_project($user_id, $project_name, $status);
    header('Location: home.php');
    exit();
}
?>
