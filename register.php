<?php
session_start();
include 'dbConfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    // Prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $uname = mysqli_real_escape_string($conn, $uname);
    $psw = mysqli_real_escape_string($conn, $psw);

    // Hash the password
    $hashed_password = password_hash($psw, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$uname', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully.";
        // Redirect to login page or another page
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
