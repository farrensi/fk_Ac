<?php
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful, redirect to dashboard
            header("Location: revisi.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Please fill in both username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            width: 300px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container input[type="text"], 
        .container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .container input[type="submit"]:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
        }
        .container p {
            margin: 20px 0 0;
        }
        .container p a {
            color: #2a5298;
            text-decoration: none;
        }
        .container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <form method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>