<?php
session_start();
require('../sql.php');

if (!isset($_SESSION['admin_login_user'])) {
    header("location: alogin.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM contactus WHERE c_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

echo "<script type='text/javascript'>alert('Query Deleted Successfully'); window.location='aviewmsg.php';</script>";
exit;
?>