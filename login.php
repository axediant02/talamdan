<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM student WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify password using password_verify
            if (password_verify($password, $user['password'])) {
                // Password matches, set session variables for logged-in user
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['username'] = $user['username'];
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
        $error_list = mysqli_error_list($conn);
        foreach ($error_list as $error) {
            echo "Error: $error<br>";
        }
    }

    mysqli_close($conn);
}