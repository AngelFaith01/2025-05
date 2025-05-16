<?php  
use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP;
 
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = $_POST['email'];
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format'); window.history.back();</script>";
        exit;
    }
 
    $code = rand(100000, 999999);
   $mail = new PHPMailer; //not found phpmailer 
    try { 
        $mail->isSMTP();
        $mail->Host = 'smtp.yourdomain.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@domain.com'; 
        $mail->Password = 'your-email-password';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
 
        $mail->setFrom('noreply@domain.com', 'Support');
        $mail->addAddress($email); 
 
        $mail->isHTML(false);  
        $mail->Subject = 'Reset Password';
        $mail->Body    = "You’ve requested to reset your password.\n\nYour reset code is: $code";
 
        if ($mail->send()) {
            echo "<script>alert('Reset code sent to your email.'); window.location.href='reset_password.php';</script>";
        } else {
            echo "<script>alert('Failed to send email.'); window.history.back();</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: " . $mail->ErrorInfo . "'); window.history.back();</script>";
    }
}
?>
 
<!--<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $code = rand(100000, 999999);
    $subject = "Reset Password";
    $message = "You've requested to reset your current password. Your verification code is: $code";
    $headers = "From: noreply@domain.com"; 
    
    if (mail($email, $subject, $message, $headers)) {
        echo "<script>alert('Reset code sent to your email $to.'); window.location.href='reset_password.php';</script>";
    } else {
        echo "<script>alert('Failed to send email.'); window.history.back();</script>"; //failed
    }
}

?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h3 class="text-center" style="font-family: 'Poppins', Sans Serif;">Forgot Password</h3>
                    <form action="forgotpassword.php" method="POST">
                        <div class="mb-3"> 
                            <input type="email" class="form-control border-rounded" id="email" name="email" required placeholder="Enter your email" style="font-family: 'Poppins', Sans serif;">
                        </div>
                        <div style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-outline-secondary btn-sm" name="code" 
                                style="border: #1c3347 .5px solid; font-family: 'Poppins', Sans-serif;">
                                Send Code
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
