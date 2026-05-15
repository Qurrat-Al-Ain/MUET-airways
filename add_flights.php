ADD_FLIGHT.PHP


<?php 
include('../db.php');
session_start();
if($_SESSION['role'] != 'STAFF') { header("Location: ../login.php"); exit(); }

if(isset($_POST['add_flight'])) {
    $airline = $_POST['airline'];
    $dep_time = $_POST['dep_time'];
    $arr_time = $_POST['arr_time'];
    $seats = $_POST['seats'];
    $src = $_POST['src_id'];
    $dest = $_POST['dest_id'];

    $sql = "INSERT INTO FLIGHT (AIRLINE_NAME, DEPARTURE_TIME, ARRIVAL_TIME, TOTAL_SEATS, AVAILABLE_SEATS, SOURCE_AIRPORT_ID, DEST_AIRPORT_ID) 
            VALUES ('$airline', '$dep_time', '$arr_time', $seats, $seats, $src, $dest)";
    
    if($conn->query($sql)) { echo "<script>alert('Flight Added Successfully');</script>"; }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../css/style.css"><title>Add Flight</title></head>
<body>
    <header><h1>Add New Flight</h1><a href="dashboard.php" style="color:white">Back to Dashboard</a></header>
    <div class="container">
        <form method="POST">
            <input type="text" name="airline" placeholder="Airline Name (e.g., PIA)" required>
            <label>Departure Time:</label>
            <input type="datetime-local" name="dep_time" required>
            <label>Arrival Time:</label>
            <input type="datetime-local" name="arr_time" required>
            <input type="number" name="seats" placeholder="Total Seats" required>
            <input type="number" name="src_id" placeholder="Source Airport ID" required>
            <input type="number" name="dest_id" placeholder="Destination Airport ID" required>
            <button type="submit" name="add_flight" class="btn">Add Flight to Schedule</button>
        </form>
    </div>
</body>
</html>
<header>
    <h1>Staff Panel</h1>
    <nav class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_flight.php">Add Flight</a>
        <a href="../index.php">View Site</a> <a href="../logout.php">Logout</a>
    </nav>
</header>