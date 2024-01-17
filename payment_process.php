<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

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

// Retrieve user input from the payment form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$cardNumber = $_POST['cardNumber'];
$expirationDate = $_POST['expirationDate'];
$cvc = $_POST['cvc'];

// Insert payment data into the 'payments' table
$insertPaymentQuery = "INSERT INTO payments (firstName, lastName, email, cardNumber, expirationDate, cvc) 
                        VALUES ('$firstName', '$lastName', '$email', '$cardNumber', '$expirationDate', '$cvc')";

if ($conn->query($insertPaymentQuery) === TRUE) {
    // Payment successful
    echo "Payment successful. Your ticket will be sent to your email address.";
} else {
    echo "Error: " . $insertPaymentQuery . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>