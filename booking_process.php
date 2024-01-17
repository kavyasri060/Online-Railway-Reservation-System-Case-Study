<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Start the session
session_start();

// Assuming you have a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "railway";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the booking form
$pickup = isset($_POST['pickup']) ? $_POST['pickup'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$compartment = isset($_POST['compartment']) ? $_POST['compartment'] : '';

// Insert booking data into the 'bookings' table
$insertBookingQuery = "INSERT INTO bookings (pickup, destination, date, compartment) 
                        VALUES ('$pickup', '$destination', '$date', '$compartment')";

if ($conn->query($insertBookingQuery) === TRUE) {
    // Booking successful
    echo "Redirecting to payment page...";
} else {
    echo "Error: " . $insertBookingQuery . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>