<?php
session_start();
$error = '';

require('../sql.php');

if (isset($_POST['customerlogin'])) {
    $customer_email = trim($_POST['cust_email'] ?? '');
    $customer_password = trim($_POST['cust_password'] ?? '');

    $stmt = $conn->prepare('SELECT * FROM custlogin WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $customer_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['password'] ?? '';
        $passwordValid = password_verify($customer_password, $storedPassword);
        if (!$passwordValid && $storedPassword !== '' && $storedPassword === $customer_password) {
            $passwordValid = true;
        }

        if ($passwordValid) {
            if ($storedPassword !== '' && password_needs_rehash($storedPassword, PASSWORD_DEFAULT)) {
                $newHash = password_hash($customer_password, PASSWORD_DEFAULT);
                $updateStmt = $conn->prepare('UPDATE custlogin SET password = ? WHERE email = ?');
                $updateStmt->bind_param('ss', $newHash, $customer_email);
                $updateStmt->execute();
            }

            $_SESSION['customer_login_user'] = $customer_email;
            $conn->query('DELETE FROM cart');
            header('Location: ctwostep.php');
            exit;
        }
    }

    $error = 'Username or Password is invalid';
}
?>
