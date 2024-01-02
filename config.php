<?php
$servername = "your_mysql_servername";
$username = "your_mysql_username";
$password = "your_mysql_password";
$dbname = "project_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
