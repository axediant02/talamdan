<?php
// include "insert.php" ;
include "connect.php"; // Include your database connection script

if(isset($_POST['submit'])) {
  // Get and sanitize user inputs
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']); // Retrieve confirmation password

  // Password validation
  if($password !== $confirmPassword) {
    echo 'Passwords do not match. Please try again.';
    exit;
  }

  // Check if username already exists
  $check_user = "SELECT * FROM user WHERE username='$username'";
  $result = mysqli_query($conn, $check_user);

  if(!$result) {
    // Error executing the query
    echo 'Error: ' . mysqli_error($conn);
    exit;
  }

  // Check number of rows returned
  if(mysqli_num_rows($result) > 0) {
    echo 'Username already exists. Please choose a different username.';
    exit;
  } else {
    // Insert user into the database without hashing the password (for testing purposes)
    $insert_user = "INSERT INTO user (uid, username, email, password) VALUES (0, '$username', '$email', '$password')";
    
    if(mysqli_query($conn, $insert_user)) {
      header("Location: registered.php");
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }

  mysqli_close($conn); // Close the database connection
}
