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


<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Enter username" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <button type="submit" name="login">Login</button>
</form>


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