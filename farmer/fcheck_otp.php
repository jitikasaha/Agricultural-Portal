<?php
session_start();
require('../sql.php');

$otp = trim($_POST['otp'] ?? '');
$email = $_SESSION['farmer_login_user'] ?? '';

$stmt = $conn->prepare('SELECT * FROM farmerlogin WHERE email = ? AND otp = ?');
$stmt->bind_param('ss', $email, $otp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $updateStmt = $conn->prepare('UPDATE farmerlogin SET otp = "" WHERE email = ?');
    $updateStmt->bind_param('s', $email);
    $updateStmt->execute();
    $_SESSION['IS_LOGIN'] = $email;
    echo 'yes';
} else {
    echo 'not_exist';
}
?>