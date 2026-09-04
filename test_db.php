<?php
require_once __DIR__ . '/config.php';

$db = app_db_config();
$conn = @new mysqli($db['host'], $db['username'], $db['password'], $db['name']);

if ($conn && !$conn->connect_error) {
    echo "✅ Database Connected Successfully!";
} else {
    echo "❌ Database Connection Failed: " . ($conn ? $conn->connect_error : 'Unable to connect');
}
?>
