<?php

require_once 'data/Config.php';

// Create table if not exist
$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT '1',
    is_active TINYINT(1) NOT NULL DEFAULT '1',
    create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($query) === TRUE) {
    // Table created successfully
    echo "Table users created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

// check if user is authenticated
function authenticate_user($username, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }

    return false;
}

function read_user($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function read_all_users()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function create_user($username, $email, $password, $is_admin = 1, $is_active = 1)
{
    global $conn;

    // Check if email user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        // Prepare failed, output error
        echo "Error preparing SELECT query: " . $conn->error;
        return false;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return false;  // Email already exists
    }
    // Prepare INSERT query
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, is_admin, is_active) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        // Prepare failed, output error
        echo "Error preparing INSERT query: " . $conn->error;
        return false;
    }

    $stmt->bind_param("ssiii", $username, $email, $hashed_password, $is_admin, $is_active);
    return $stmt->execute();
}


function delete_user($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function update_user($id, $username, $email, $password, $is_admin = 1, $is_active = 1)
{
    global $conn;

    // Hash password before updating
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ?, is_admin = ?, is_active = ? WHERE id = ?");
    $stmt->bind_param("ssssii", $username, $email, $hashed_password, $is_admin, $is_active, $id);
    return $stmt->execute();
}
