<?php
session_start(); // Start session to manage user login state
include "connect.php"; // Include your database connection script

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Retrieve user record by username
    $query = "SELECT * FROM student WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if user with the provided username exists
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify password using password_verify
            if (password_verify($password, $user['password'])) {
                // Password matches, set session variables for logged-in user
                $_SESSION['user_id'] = $user['sid'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                // Redirect to dashboard or logged-in page
                header("Location: dashboard.html");
                exit;
            } else {
                // Invalid password
                echo 'Incorrect password. Please try again.';
            }
        } else {
            // User not found
            echo 'Username not found. Please check your username or register a new account.';
        }
    } else {
        // Error in database query
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
