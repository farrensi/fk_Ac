<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password using password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM admin WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin'] = $username;
        header('Location: admin.php');
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Invalid username.";
}

// When inserting a new admin, use password_hash() to store the hashed password
// For example:
$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
$conn->query($sql);

$conn->close();
?>