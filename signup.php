<?php
include 'connect.php';
include 'insert.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Sign Up</title>

</head>
<body>
  <form action="signup.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" placeholder="Username" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" placeholder="Email" required><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" placeholder="Password" required><br>

    <label for="confirmPassword">Confirm Password:</label><br>
    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required><br>

    <input type="submit" name="submit" value="Sign Up">
    <p>Already have an account? <a href="index.php">Sign in</a></p>
  </form>
</body>
</html>
 