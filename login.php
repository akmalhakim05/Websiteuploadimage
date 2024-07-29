<?php
session_start();
include 'dbConfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    // Prevent SQL injection
    $uname = mysqli_real_escape_string($conn, $uname);
    $psw = mysqli_real_escape_string($conn, $psw);

    // Query to check if the user exists
    $sql = "SELECT id, username, password FROM users WHERE username='$uname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, now verify password
        $row = $result->fetch_assoc();
        if (password_verify($psw, $row['password'])) {
            // Password is correct, start session
            $_SESSION['username'] = $row['username'];
            echo "Login successful. Welcome, " . $row['username'] . "!";
            // Redirect to a protected page (e.g., dashboard.php)
            header("Location: upload.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with the username $uname.";
    }
}
$conn->close();
?>
