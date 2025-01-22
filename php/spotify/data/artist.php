<?php

require_once 'data/config.php';

// Create table if not exist
$query = "CREATE TABLE IF NOT EXISTS artists (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    bio TEXT NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT '1',
    create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_admin TINYINT(1) NOT NULL DEFAULT '0'
)";
if ($conn->query($query) === TRUE) {
    // echo "Table artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// CRUD Functions
function create_artist($name, $photo, $bio, $is_active, $is_admin)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO artists (name, photo, bio, is_active, is_admin) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $photo, $bio, $is_active, $is_admin);
    if ($stmt->execute()) {
        return $stmt->insert_id;
    } else {
        return 0;
    }
}

function read_artist($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM artists WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function read_all_artists()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM artists");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function update_artist($id, $name, $photo, $bio, $is_active, $is_admin)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE artists SET name = ?, photo = ?, bio = ?, is_active = ?, is_admin = ? WHERE id = ?");
    $stmt->bind_param("sssiii", $name, $photo, $bio, $is_active, $is_admin, $id);
    return $stmt->execute();
}

function delete_artist($id)
{
    global $conn;
    $stmt = $conn->prepare("DELETE FROM artists WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
function authenticate_artist($email, $password)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM artists WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $artist = $result->fetch_assoc();
    if ($artist && password_verify($password, $artist['password'])) {
        return $artist;
    } else {
        return false;
    }
}