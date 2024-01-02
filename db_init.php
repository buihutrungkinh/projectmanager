<?php
$servername = "your_mysql_servername";
$username = "your_mysql_username";
$password = "your_mysql_password";
$dbname = "project_management";

$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tạo cơ sở dữ liệu nếu chưa tồn tại
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Chọn cơ sở dữ liệu
$conn->select_db($dbname);

// Tạo bảng account
$sql = "
    CREATE TABLE IF NOT EXISTS account (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )
";
$conn->query($sql);

// Tạo bảng project
$sql = "
    CREATE TABLE IF NOT EXISTS project (
        project_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        project_name VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES account(user_id)
    )
";
$conn->query($sql);

// Tạo bảng task
$sql = "
    CREATE TABLE IF NOT EXISTS task (
        task_id INT AUTO_INCREMENT PRIMARY KEY,
        project_id INT,
        task_name VARCHAR(255) NOT NULL,
        status ENUM('completed', 'not done') NOT NULL,
        FOREIGN KEY (project_id) REFERENCES project(project_id)
    )
";
$conn->query($sql);

// Đóng kết nối
$conn->close();
?>
