REGISTER.PHP code


<?php 
include('db.php'); 

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Using your PASSENGER table structure from previous SQL queries
    $sql = "INSERT INTO PASSENGER (NAME, EMAIL, PASSWORD) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: green; font-size: 14px; margin-bottom: 15px;'>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        $message = "<p style='color: red; font-size: 14px; margin-bottom: 15px;'>Error: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | MUET Airways</title>
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
            <h2>Create Account</h2>
            <p>Join for a seamless travel experience</p>
            <?php echo $message; ?>
        </div>

        <form action="register.php" method="POST" class="login-form">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="auth-btn">Sign Up</button>
            
            <p class="auth-footer">Already have an account? <a href="login.php">Log In</a></p>
        </form>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 MUET Airways | MUET CS Project</p>
</footer>

</body>
</html>