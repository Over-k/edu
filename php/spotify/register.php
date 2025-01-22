<?php
require 'data/user.php';
require 'utils/func.php';
$pageTitle = 'Register | Spotify';
ob_start();

session_start();
if (check_login()) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Get and sanitize input
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create user
    if (create_user($username, $email, $hashed_password, 1, 1)) {
        header("Location: login.php");
        exit();
    }
}
?>
<div class="container p-5 w-50">
    <h1 class="text-center">Spotify</h1>
    <form action="register.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </div>
        <div class="mb-3 text-center">
            Do you have an account?<a href="login.php">Login</a>
        </div>
    </form>
</div>
<?php
$bodyContent = ob_get_clean();
include 'utils/base.php';
?>