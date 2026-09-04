<?php
session_start();
$error = '';

require('../sql.php');

if (isset($_POST['farmerlogin'])) {
  $farmer_email = trim($_POST['farmer_email'] ?? '');
  $farmer_password = trim($_POST['farmer_password'] ?? '');

  $stmt = $conn->prepare('SELECT * FROM farmerlogin WHERE email = ? LIMIT 1');
  $stmt->bind_param('s', $farmer_email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $storedPassword = $user['password'] ?? '';
    $passwordValid = password_verify($farmer_password, $storedPassword);
    if (!$passwordValid && $storedPassword !== '' && $storedPassword === $farmer_password) {
      $passwordValid = true;
    }

    if ($passwordValid) {
      if ($storedPassword !== '' && password_needs_rehash($storedPassword, PASSWORD_DEFAULT)) {
        $newHash = password_hash($farmer_password, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare('UPDATE farmerlogin SET password = ? WHERE email = ?');
        $updateStmt->bind_param('ss', $newHash, $farmer_email);
        $updateStmt->execute();
      }

      $_SESSION['farmer_login_user'] = $farmer_email;
      header('Location: ftwostep.php');
      exit;
    }
  }

  $error = 'Username or Password is invalid';
}
?>
