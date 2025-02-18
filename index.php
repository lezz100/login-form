<?php
include('connection.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Login Successful!'); window.location.href='home.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location.href='home.php';</script>";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <!-- <form id="loginForm">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password here" required>
            <br>
            <button type="submit">Login</button>
        </form> -->
    </div>
</body>
</html>
