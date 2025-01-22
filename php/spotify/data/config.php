<?php
// Database Configuration for XAMPP
define('DB_HOST', 'localhost');      // Host (default for XAMPP)
define('DB_USER', 'root');           // Default username for XAMPP
define('DB_PASS', '');               // Default password for XAMPP (empty string)
define('DB_NAME', 'spotify');
define('DB_PORT', 4306);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, port: 4306);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>