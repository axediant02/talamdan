
<?php
// include "insert.php" ;
include "connect.php"; // Include your database connection script

if(isset($_POST['submit'])) {
  // Get and sanitize user inputs
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']); // Retrieve confirmation password

  // Password validation
  if($password !== $confirmPassword) {
    echo 'Passwords do not match. Please try again.';
    exit;
  }

  // Check if username already exists
  $check_user = "SELECT * FROM student WHERE username='$username'";
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
    // Insert user into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $insert_user = "INSERT INTO student (sid, username, email, password) VALUES (0, '$username', '$email', '$hashedPassword')";
    
    if(mysqli_query($conn, $insert_user)) {
      header("Location: registered.php");
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }

  mysqli_close($conn); // Close the database connection
}
?>



<?php

// include_once('connect.php');


// $username='demo';
// $password='demo';
// $email='demo';


// $sql1= "SELECT * FROM account where username ='$username'";
// $result=mysqli_query($conn,$sql1);

// if(mysqli_num_rows($result)==0){
//     echo"Duplicate";
// }

// else if (mysqli_num_rows($result)==0){
//     $sql2="INSERT INTO account (username, password, email) values('$username', '$password', '$email')";
//     mysqli_query($conn, $sql2);

//     echo"Success";

// }

// else{
//     echo"failed";
// }
