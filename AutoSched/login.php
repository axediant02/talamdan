<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to retrieve the user record by username
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            // Verify password using password_verify
            if (password_verify($password, $user['password'])) {
                // Password matches, user is authenticated
                // echo "Login successful! Welcome, " . $user['username'];
                // Redirect to a dashboard or another page
                header("Location: dashboard.html");
            } else {
                // Invalid password
                echo "Invalid username or password";
            }
        } else {
            // User not found
            echo "Invalid username or password";
        }
    } else {
        // Error in database query
        echo "Error: " . mysqli_error($conn);
    }
}