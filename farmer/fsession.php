<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sql.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_check = $_SESSION['farmer_login_user'] ?? '';
if ($user_check === '') {
    header("Location: ../index.php");
    exit;
}

if (!isset($_SESSION['IS_LOGIN']) || $_SESSION['IS_LOGIN'] !== $user_check) {
    header("Location: ftwostep.php");
    exit;
}

$query = "SELECT farmer_name FROM farmerlogin WHERE email = '" . mysqli_real_escape_string($conn, $user_check) . "'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['farmer_name'] ?? '';
$CustID = $user_check;
?>

