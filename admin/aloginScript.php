<?php
session_start();
$error = '';

require('../sql.php');

if (isset($_POST['adminlogin'])) {
  $aname = trim($_POST['admin_name'] ?? '');
  $apassword = trim($_POST['admin_password'] ?? '');

  $stmt = $conn->prepare('SELECT * FROM admin WHERE admin_name = ? LIMIT 1');
  $stmt->bind_param('s', $aname);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $storedPassword = $user['admin_password'] ?? '';
    $passwordValid = password_verify($apassword, $storedPassword);
    if (!$passwordValid && $storedPassword !== '' && $storedPassword === $apassword) {
      $passwordValid = true;
    }

    if ($passwordValid) {
      if ($storedPassword !== '' && password_needs_rehash($storedPassword, PASSWORD_DEFAULT)) {
        $newHash = password_hash($apassword, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare('UPDATE admin SET admin_password = ? WHERE admin_name = ?');
        $updateStmt->bind_param('ss', $newHash, $aname);
        $updateStmt->execute();
      }

      $_SESSION['admin_login_user'] = $aname;
      header('Location: aprofile.php');
      exit;
    }
  }

  $error = 'Username or Password is invalid';
}
?>
