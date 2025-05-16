<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
 
    //$stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?"); 'OG BRB
    $sql = "SELECT * FROM admin Where email = ?";
    $stmt->Execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));
 
        $stmt = $pdo->prepare("INSERT INTO reset_password (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires]);
 
        $resetLink = "https://yourdomain.com/reset_password.php?token=$token";
 
        $subject = "Reset Your Password";
        $message = "
        <html>
        <head>
            <style>
                .btn {
                    border: #1c3347 .5px solid;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                }
            </style>
        </head>
        <body>
            <h2>Password Reset Request</h2>
            <p>Hello,</p>
            <p>Click the button below to reset your password:</p>
            <a href=\"$resetLink\" class=\"btn\">Reset Password</a>
            <p>If you did not request a password reset, please ignore this email.</p>
            <p>This link will expire in 1 hour.</p>
        </body>
        </html>
        ";

        $headers = "From: no-reply@yourdomain.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($email, $subject, $message, $headers)) {
            echo "<div style='text-align:center; padding:20px;'>Check your email for a reset link.</div>";
        } else {
            echo "<div style='text-align:center; padding:20px; color:red;'>Failed to send email.</div>";
        }
    } else {
        echo "<div style='text-align:center; padding:20px; color:red;'>No user found with that email.</div>";
    }
}
?>

 
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
                <h4 class="mb-3 text-center">Reset Your Password</h4>
                <form action="forgot.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email address</label>
                        <input type="email" class="form-control" id="email" name="email" style="border: #1c3347 .5px solid;" required>
                    </div>
                    <button type="submit" class="btn btn-outine-secondary w-100" style="border: #1c3347 .5px solid;"><a href="admn.php"></a>Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
