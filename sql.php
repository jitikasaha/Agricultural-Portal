<?php
require_once __DIR__ . '/config.php';

$db = app_db_config();
$conn = new mysqli($db['host'], $db['username'], $db['password'], $db['name']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

// Automatic schema compatibility for cart table
$cartCheck = @$conn->query("SHOW COLUMNS FROM `cart` LIKE 'cust_id'");
if ($cartCheck && $cartCheck->num_rows === 0) {
    @$conn->query("ALTER TABLE `cart` ADD COLUMN `cust_id` INT(11) NOT NULL DEFAULT 0 AFTER `id`");
    @$conn->query("ALTER TABLE `cart` DROP INDEX `cropname`");
    @$conn->query("ALTER TABLE `cart` ADD KEY `cust_id` (`cust_id`)");
}
?>
