<?php
include('db.php');

if(isset($_GET['flight_id'])) {

    $flight_id = $_GET['flight_id'];
    $passenger_id = 101; // Example ID; in real use, get this from the session
    $date = date('Y-m-d');

    // Insert reservation
    $sql = "INSERT INTO RESERVATION 
            (PASSENGER_ID, FLIGHT_ID, RESERVATION_DATE, RESERVATION_STATUS)
            VALUES ($passenger_id, $flight_id, '$date', 'Confirmed')";

    if($conn->query($sql)) {

        // Update available seats
        $conn->query("UPDATE FLIGHT 
                      SET AVAILABLE_SEATS = AVAILABLE_SEATS - 1 
                      WHERE FLIGHT_ID = $flight_id");

        echo "Reservation Confirmed!";

    } else {

        echo "Error: " . $conn->error;

    }
}
?>