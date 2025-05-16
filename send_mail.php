<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php';  
require 'db.php';

$mail = new PHPMailer(true);

try { 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'angelfaithtolentino143@gmail.com';  
    $mail->Password = 'Test@123'; // Use an app password, not your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
 
    $mail->setFrom('your_email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');
 
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a <b>test email</b> sent using PHPMailer via Gmail SMTP.';
    $mail->AltBody = 'This is a test email sent using PHPMailer via Gmail SMTP.';

    $mail->send();
    echo 'Message has been sent!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['email'];
    $name = $_POST['name'];
    $job = $_POST['job'];

    $subject = "Interview Invitaion for $job Position";
    $message = "Dear Mr./Ms. $name, Congratulations! 
                \n\nYou`ve passed the initial screening. We would like to schedule your interview for the $job position. 
                \nPlease reply to this email or wait for further instructions regarding the exact date and time.
                \n\n\nBest regards,\n HR Department";

    $header = "From: ";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else { 
        //http_response_code(500);
        //echo = "Failed to send.";
    }
}

?>