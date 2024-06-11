<?php
include 'connection.php'; 

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$hashedPassword = password_hash($password, PASSWORD_BCRYPT);


$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);
$stmt->execute();
$stmt->close();

header("Location: login.php");
exit;
?>
