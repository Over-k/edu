<?php
$pageTitle = 'Login';
require 'data/user.php';
require 'utils/func.php';


// Start output buffering
ob_start();
session_start(); // Start the session

if (check_login()) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(authenticate_user($username, $password)) {
        $_SESSION['user_id'] = authenticate_user($username, $password)['id'];
        if (isset($_POST['remember'])) {
            setcookie('user_id', $_SESSION['user_id'], time() + (86400 * 30), "/");
        }
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

?>
<div class="container w-50 p-5">
    <h1>Spotify</h1>
    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php
$bodyContent = ob_get_clean();
include 'utils/base.php';
?>