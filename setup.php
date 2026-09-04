<?php
require_once __DIR__ . '/config.php';

$db = app_db_config();
$conn = new mysqli($db['host'], $db['username'], $db['password'], $db['name']);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$sql = file_get_contents(__DIR__ . '/db/agriculture_portal.sql');
if ($sql === false) {
    die('Database schema file not found.');
}

if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
    echo 'Database initialized successfully.';
} else {
    echo 'Database initialization failed: ' . $conn->error;
}

$conn->close();
