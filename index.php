<?php
include 'connect.php';
include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Talamdan</title>
</head>
<body>
  <div>
    <form action="login.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>
      <input type="submit" value="Submit">
      <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>
</body>
</html>