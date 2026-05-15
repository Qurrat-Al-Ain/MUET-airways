INDEX.PHP code

<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUET Airways | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="index.php">
            <img src="images/logo.png" alt="MUET Airways" class="site-logo">
        </a>
    </div>
    <nav class="nav-links">
        <a href="index.php">Home</a>
        <a href="view_flights.php">Flights</a>
        <a href="my_bookings.php">My Tickets</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<main>
    <section class="hero">
        <div class="booking-container">
            <h2>Book Your Next Journey</h2>
            <form class="search-form" action="view_flights.php" method="GET">
                <div class="input-group">
                    <label>Departure</label>
                    <input type="text" name="from" placeholder="From (City)" required>
                </div>
                <div class="input-group">
                    <label>Arrival</label>
                    <input type="text" name="to" placeholder="To (Destination)" required>
                </div>
                <button type="submit" class="btn-search">Search Flights</button>
            </form>
        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2026 MUET Airways | MUET CS Project</p>
</footer>

</body>
</html>