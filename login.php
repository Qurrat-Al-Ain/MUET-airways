LOGIN.PHP


<?php 
include('db.php'); 
session_start();

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Placeholder for your DB check
    // $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    // If successful: header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MUET Airways</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-grey">

<header class="main-header">
    <div class="logo-container">
        <a href="index.php"><img src="images/logo.png" alt="MUET Airways" class="site-logo"></a>
    </div>
    <nav class="nav-links">
        <a href="index.php">Home</a>
        <a href="view_flights.php">Flights</a>
        <a href="my_bookings.php">My Tickets</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <img src="images/logo.png" alt="Logo" class="login-mini-logo">
            <h2>Welcome Back</h2>
            <p>Login to manage your bookings</p>
        </div>

        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-options">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="auth-btn">Sign In</button>
            
            <p class="auth-footer">Don't have an account? <a href="register.php">Create one</a></p>
        </form>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 MUET Airways | MUET CS Project</p>
</footer>

</body>
</html>