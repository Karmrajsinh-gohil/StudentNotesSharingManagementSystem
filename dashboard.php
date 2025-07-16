<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - Student Notes System</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p><a href="upload_note.php">Upload Note</a></p>
<p><a href="view_notes.php">View Notes</a></p>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
