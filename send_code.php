<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredCode = $_POST['code'];
    $Password = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    $storedCode = $_SESSION['reset_code'] ?? null;
    $Email = $_SESSION['user_email'] ?? null;

    if (!$storedCode || !$Email) {
        echo "<script>alert('Session expired or invalid.'); window.location.href='forgotpassword.php';</script>";
        exit;
    }

    if ($enteredCode !== strval($storedCode)) {
        echo "<script>alert('Invalid reset code.'); window.history.back();</script>";
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }
 
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
 
    unset($_SESSION['reset_code']);
    unset($_SESSION['user_email']);

    echo "<script>alert('Password reset successfully.'); window.location.href='reset_password.php';</script>";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Recipient
    $code = rand(100000, 999999); // 6-digit code

    $subject = "Reset Password";
    $message = "You’ve requested to reset your password.\n\nYour reset code is: $code";
    $headers = "From: noreply@domain.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "<script>alert('Reset code sent to your email.'); window.location.href='reset_password.php';</script>";
    } else {
        echo "<script>alert('Failed to send email.'); window.history.back();</script>";
    }
}
?>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-outline-secondary btn-sm" name="code" 
        style="border: #1c3347 .5px solid; font-family: 'Poppins', Sans-serif;">
        Send Verification Code
    </button>
</div>

<form action="send_mail.php" method="POST">
  <input type="email" name="email" placeholder="Enter your email" required>
  <button type="submit">Send Code</button>
</form> 