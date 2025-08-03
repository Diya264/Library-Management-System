<?php
$HOSTNAME = 'your_hostname';
$USERNAME = 'your_username';
$PASSWORD = 'your_password';
$DATABASE = 'your_database_name';

try {
    $pdo = new PDO("mysql:host=$HOSTNAME;dbname=$DATABASE", $USERNAME, $PASSWORD);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
