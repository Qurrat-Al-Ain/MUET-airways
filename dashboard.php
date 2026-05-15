<?php 
include('db.php');  
session_start();

if($_SESSION['role'] != 'STAFF') { 
    header("Location: login.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

<header>
    <h1>Staff Control Panel</h1>
    
    <nav class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_flight.php">Add Flight</a>
        <a href="index.php">View Site</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>All Global Reservations</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Passenger</th>
            <th>Flight</th>
            <th>Status</th>
        </tr>

        <?php
        $sql = "SELECT r.RESERVATION_ID, p.NAME, f.AIRLINE_NAME, r.RESERVATION_STATUS 
                FROM RESERVATION r 
                JOIN PASSENGER p ON r.PASSENGER_ID = p.PASSENGER_ID 
                JOIN FLIGHT f ON r.FLIGHT_ID = f.FLIGHT_ID";

        $res = $conn->query($sql);

        while($row = $res->fetch_assoc()) {
            echo "
            <tr>
                <td>#{$row['RESERVATION_ID']}</td>
                <td>{$row['NAME']}</td>
                <td>{$row['AIRLINE_NAME']}</td>
                <td>{$row['RESERVATION_STATUS']}</td>
            </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>