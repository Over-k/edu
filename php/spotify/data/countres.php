<?php
require 'data/Config.php';

// Create table if not exist
$query = "CREATE TABLE IF NOT EXISTS countres (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(255) NOT NULL,
)";

if ($conn->query($query) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error;
}
$insertCounters = "INSERT INTO countres (name, code) VALUES
('Afghanistan', 'AF'),
('Albania', 'AL'),
('Algeria', 'DZ'),
('Andorra', 'AD'),
('Angola', 'AO'),
('Antigua and Barbuda', 'AG'),
('Argentina', 'AR'),
('Armenia', 'AM'),
('Australia', 'AU'),
('Austria', 'AT'),
('Azerbaijan', 'AZ'),
('Bahamas', 'BS'),
('Bahrain', 'BH'),
('Bangladesh', 'BD'),
('Barbados', 'BB'),
('Belarus', 'BY')";
$conn->query($insertCounters);
?>