<?php
session_start();
include 'db_connect.php';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration Successful. Please Login.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Error: User may already exist.";
    }
    $stmt->close();
}
?>

<!-- Simple HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Register - Student Notes System</title>
</head>
<body>
<h2>User Registration</h2>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>
<a href="login.php">Already Registered? Login Here</a>
</body>
</html>
