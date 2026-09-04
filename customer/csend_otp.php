<?php
session_start();
require('../sql.php');

$email = $_SESSION['customer_login_user'] ?? '';
$res = mysqli_query($conn, "SELECT * FROM custlogin WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'");
$count = mysqli_num_rows($res);
if ($count > 0) {
    $otp = rand(11111, 99999);
    mysqli_query($conn, "UPDATE custlogin SET otp = '$otp' WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'");
    $html = 'Your otp verification code for Agriculture Portal is ' . $otp;
    smtp_mailer($email, 'OTP Verification', $html);
    echo 'yes';
} else {
    echo 'not exist';
}

function smtp_mailer($to, $subject, $msg) {
    require_once('../smtp/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = app_env('SMTP_HOST', 'smtp.gmail.com');
    $mail->Port = (int) app_env('SMTP_PORT', 465);
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $smtpUser = app_env('SMTP_USERNAME', '');
    $smtpPass = app_env('SMTP_PASSWORD', '');
    if (empty($smtpUser) || empty($smtpPass)) {
        // SMTP not configured; save OTP to session for local dev testing
        $_SESSION['dev_otp'] = $msg;
        return 1;
    }
    return $mail->Send() ? 1 : 0;
}
?>

