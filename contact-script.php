<?php
require_once 'sql.php';

if (isset($_POST["submit"])) {
    $user_name = trim($_POST['user_name'] ?? '');
    $user_mobile = trim($_POST['user_mobile'] ?? '');
    $user_email = trim($_POST['user_email'] ?? '');
    $user_address = trim($_POST['user_address'] ?? '');
    $user_message = trim($_POST['user_message'] ?? '');

    $stmt = $conn->prepare("INSERT INTO contactus (c_name, c_mobile, c_email, c_address, c_message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $user_name, $user_mobile, $user_email, $user_address, $user_message);
    $success = $stmt->execute();

    include 'contact.php';

    if ($success) {
        echo "<script type='text/javascript'>
        $(document).ready(function() {
            $('#mysuccessModal').modal('show');
        });
        function pagesuccessRedirect() {
            location.replace('index.php');
        }</script>";
    } else {
        echo "<script type='text/javascript'>
        $(document).ready(function() {
            $('#myunsuccessModal').modal('show');
        });
        function pageunsuccessRedirect() {
            location.replace('contact.php');
        }</script>";
    }
} else {
    header("Location: contact.php");
    exit;
}
?>