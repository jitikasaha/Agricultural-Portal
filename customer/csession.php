<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../sql.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_check = $_SESSION['customer_login_user'] ?? '';
if ($user_check === '') {
    header("Location: ../index.php");
    exit;
}

if (!isset($_SESSION['IS_LOGIN']) || $_SESSION['IS_LOGIN'] !== $user_check) {
    header("Location: ctwostep.php");
    exit;
}

$query = "SELECT cust_name FROM custlogin WHERE email = '" . mysqli_real_escape_string($conn, $user_check) . "'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['cust_name'] ?? '';
$CustID = $user_check;
?>

