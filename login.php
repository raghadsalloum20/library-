<!DOCTYPE html>
<html>
<head>
    <title>Online Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="header">
        <a href="index.php">Home</a>
        <a href="about.html">About</a>
        <a href="collection.html">Collections</a>
        <a href="contact.html">Contact Us</a>
    </div>
    
    <div class="main">
        <h1>Login</h1>
        <h2>Enter your login information</h2>
        <form  method="POST">
            <label for="first">Username:</label>
            <input type="text" id="first" name="username" placeholder="Enter your Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
            <div class="wrap">
                <button type="submit" name="submit1">Login</button>
            </div>
        </form>
        <p>Not registered? <a href="signup.php" style="text-decoration: none;">Create an account</a></p>
    </div>
</body>
</html>
<?php
include "dbcon.php"; // Include database connection parameters

if (isset($_POST['submit1'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Prepare SQL statement to retrieve user from database
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        // Start session and store user ID
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['member_id'];
        
        header("Location: collection.html");
        exit(); // Make sure to exit after redirect
    } else {
        // Display error message
        echo '<div class="alert alert-danger"><strong>Login Error!</strong>&nbsp;Please check your Username and Password</div>';
    }
}
?>
