MY BOOKING.PHP code
<?php 
include('db.php'); 
// In a real app, you would filter by a User ID here. 
// For now, we'll show all active bookings in the system.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets | MUET Airways</title>
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
        <a href="my_bookings.php" class="active">My Tickets</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<div class="results-container">
    <div class="search-summary">
        <h2>Your Digital Wallet</h2>
        <p>Manage your upcoming <span>MUET Airways</span> journeys</p>
    </div>

    <div class="ticket-list">
        <?php
        // Updated SQL using your new table names and JOIN logic
        $sql = "SELECT P.NAME, F.AIRLINE_NAME, F.SOURCE_AIRPORT_ID, F.DEST_AIRPORT_ID, R.RESERVATION_ID, F.DEPARTURE_TIME, F.FLIGHT_ID
                FROM PASSENGER P
                JOIN RESERVATION R ON P.PASSENGER_ID = R.PASSENGER_ID
                JOIN FLIGHT F ON R.FLIGHT_ID = F.FLIGHT_ID";
        
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="boarding-pass">
                    <div class="ticket-main">
                        <div class="ticket-header">
                            <span class="airline-name"><?php echo $row['AIRLINE_NAME']; ?></span>
                            <span class="boarding-group">Group A</span>
                        </div>
                        
                        <div class="ticket-route">
                            <div class="loc">
                                <h1><?php echo substr($row['SOURCE_AIRPORT_ID'], 0, 3); ?></h1>
                                <p><?php echo $row['SOURCE_AIRPORT_ID']; ?></p>
                            </div>
                            <div class="path">
                                <span class="plane-icon">✈️</span>
                                <div class="line"></div>
                            </div>
                            <div class="loc">
                                <h1><?php echo substr($row['DEST_AIRPORT_ID'], 0, 3); ?></h1>
                                <p><?php echo $row['DEST_AIRPORT_ID']; ?></p>
                            </div>
                        </div>

                        <div class="ticket-info">
                            <div class="info-block">
                                <label>PASSENGER</label>
                                <span><?php echo $row['NAME']; ?></span>
                            </div>
                            <div class="info-block">
                                <label>FLIGHT ID</label>
                                <span><?php echo $row['FLIGHT_ID']; ?></span>
                            </div>
                            <div class="info-block">
                                <label>DATE/TIME</label>
                                <span><?php echo $row['DEPARTURE_TIME']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="ticket-stub">
                        <div class="stub-info">
                            <label>RESERVATION ID</label>
                            <span>#MUET-<?php echo $row['RESERVATION_ID']; ?></span>
                        </div>
                        <div class="qr-placeholder">
                            <div class="barcode"></div>
                        </div>
                        <button class="cancel-btn">Cancel</button>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='no-results'><h3>Your wallet is empty.</h3><p>Start your journey by booking a flight today!</p></div>";
        }
        ?>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 MUET Airways | MUET CS Project</p>
</footer>

</body>
</html>