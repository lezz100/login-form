<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "my_database");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Successful!<br>";

// 🔍 Debugging: Check if form is submitted via POST or GET
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "POST request received!<br>";
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo "WARNING: Form submitted via GET! Change method to POST.<br>";
}

// 🔍 Check if the login button was clicked
if (isset($_POST['login'])) {
    echo "Login Button Clicked!<br>";

    $username = isset($_POST['username']) ? $_POST['username'] : "Not Set";
    $password = isset($_POST['password']) ? $_POST['password'] : "Not Set";

    echo "Username: $username <br>";
    echo "Password: $password <br>";

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "User Found!<br>";
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "Login Successful! Redirecting...";
             header("Location: dashboard.php");
             exit();
        } else {
            echo "Invalid Password!<br>";
        }
    } else {
        echo "User Not Found!<br>";
    }
} else {
    echo "Login Button Not Clicked!<br>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>


<!-- 
<?php
include('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


 -->
<!-- 
 <?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "my_database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> -->


<!-- 
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "my_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?> -->