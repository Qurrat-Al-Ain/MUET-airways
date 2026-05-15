VIEW_FLIGHTS.PHP


// Get search values from the URL
$from = isset($_GET['from']) ? $_GET['from'] : '';
$to = isset($_GET['to']) ? $_GET['to'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results | MUET Airways</title>
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
        <a href="view_flights.php" class="active">Flights</a>
        <a href="my_bookings.php">My Tickets</a>
        <a href="login.php" class="login-btn">Login</a>
    </nav>
</header>

<div class="results-container">
    <div class="search-summary">
        <h2>Available Flights</h2>
        <p>From <span><?php echo htmlspecialchars($from ?: 'Anywhere'); ?></span> to <span><?php echo htmlspecialchars($to ?: 'Anywhere'); ?></span></p>
    </div>

    <div class="flight-grid">
        <?php
        // Updated SQL to use your uppercase FLIGHT table and specific columns
        $sql = "SELECT * FROM FLIGHT 
                WHERE SOURCE_AIRPORT_ID LIKE '%$from%' 
                AND DEST_AIRPORT_ID LIKE '%$to%' 
                AND AVAILABLE_SEATS > 0";
        
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="flight-card">
                    <div class="card-header">
                        <span class="flight-no">Flight #<?php echo $row['FLIGHT_ID']; ?></span>
                        <span class="airline-tag"><?php echo $row['AIRLINE_NAME']; ?></span>
                    </div>
                    
                    <div class="card-body">
                        <div class="route">
                            <div class="point">
                                <h3><?php echo $row['SOURCE_AIRPORT_ID']; ?></h3>
                                <p>Departure</p>
                            </div>
                            <div class="plane-icon">✈️</div>
                            <div class="point">
                                <h3><?php echo $row['DEST_AIRPORT_ID']; ?></h3>
                                <p>Arrival</p>
                            </div>
                        </div>
                        
                        <div class="details">
                            <p><strong>Departure:</strong> <?php echo $row['DEPARTURE_TIME']; ?></p>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="price-section">
                            <span class="currency">Seats: </span>
                            <span class="amount"><?php echo $row['AVAILABLE_SEATS']; ?></span>
                        </div>
                        <a href="book.php?id=<?php echo $row['FLIGHT_ID']; ?>" class="book-now-btn">Select Flight</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='no-results'><h3>No flights found.</h3><p>Try searching for a different route.</p></div>";
        }
        ?>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2026 MUET Airways | MUET CS Project</p>
</footer>

</body>
</html>