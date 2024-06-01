<!DOCTYPE html>
<html>
  <head>
    <title>Online Library</title>
    <link rel="stylesheet" href="signup.css">
  </head>
  <body>
    <div class="header">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact Us</a>
    </div>
      <br><br><br>
    <div class="main">
      <h1>Sign up</h1>
      <h3>Enter your sign up information</h3>
      <form  method="post">
        <label for="first">Username:</label>
        <input type="text" id="first" name="username" placeholder="Enter your Username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your Password" required>
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your Password" required>
        <div class="wrap">
          <button type="submit">Sign up</button>
        </div>
      </form>
      <p>Already have an account? <a href="login.php" style="text-decoration: none;">Login</a></p>
    </div>
  </body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
  include('dbcon.php');

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    // Execute the query
    if ($stmt->execute()) {
       header("location:login.php");
       exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
