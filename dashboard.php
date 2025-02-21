<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username'];  $_SESSION['email']; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
 -->

<!-- <?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];


$username = $_SESSION['username'];

// Time-based greeting
$hour = date('H');
if ($hour < 12) {
    $greeting = "Good morning";
} elseif ($hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3">
    <div class="container">
        <a class="navbar-brand" href="#">My Dashboard</a>
        <a href="logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </div>
</nav>

<div class="dashboard-container text-center">
    <h2><?= $greeting ?>, <?= htmlspecialchars($username) ?>! 👋</h2>
    <p>Welcome to your dashboard. Here you can manage your account.</p>
    
    <div class="mt-4">
        <button class="btn btn-primary">View Profile</button>
        <button class="btn btn-success">Settings</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 -->

 <?php
$username = $_SESSION['username'];
$_SESSION['email'] = $student['email'] ?? "Email not found";
$student_email = $_SESSION['email'];

// Sample courses and progress 
$courses = [
    ["name" => "Internet Application Programming", "progress" => 75],
    ["name" => "OOP 2 with Java", "progress" => 50],
    ["name" => "Database Management Systems", "progress" => 30],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background-color: #f4f4f4; }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-pic {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark p-3">
    <div class="container">
        <a class="navbar-brand" href="#">LMS Dashboard</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="dashboard-container text-center">
    <img src="<?= $profile_pic ?>" alt="Profile Picture" class="profile-pic mb-3">
    <h2>Welcome, <?= htmlspecialchars($username) ?>! 👋</h2>
    
    <h4 class="mt-4">Enrolled Courses</h4>
    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($course['name']) ?>
                <div class="progress" style="width: 50%;">
                    <div class="progress-bar" role="progressbar" style="width: <?= $course['progress'] ?>%;" aria-valuenow="<?= $course['progress'] ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= $course['progress'] ?>%
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
