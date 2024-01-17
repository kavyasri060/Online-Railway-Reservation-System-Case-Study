<?php
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

// Retrieve user input
$input_username = isset($_POST['username']) ? $_POST['username'] : '';
$input_password = isset($_POST['password']) ? $_POST['password'] : '';

// Define the set of allowed users and their corresponding passwords
$allowed_users = array(
    'rahul0908' => '0908',
    'Manoj' => 'Aa@',
    'Rani' => 'R@ni37',
    'Ram' => '0809'
);

// Check if the provided username exists in the set of allowed users
if (array_key_exists($input_username, $allowed_users)) {
    // Check if the provided password matches the stored password for the given username
    if ($input_password === $allowed_users[$input_username]) {
        // User found, perform actions like setting session variables

        // Insert user data into the 'users' table
        $insert_query = "INSERT INTO users (username, password) VALUES ('$input_username', '$input_password')";

        if ($conn->query($insert_query) === TRUE) {
            echo "Login successful. User data inserted into the database.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    } else {
        // Password does not match
        echo "Login failed. Please check your username and password.";
    }
} else {
    // User not found in the set of allowed users
    echo "Login failed. Please check your username and password.";
}

// Close the database connection
$conn->close();
?>