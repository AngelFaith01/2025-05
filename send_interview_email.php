<?php  
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['email'];
    $name = $_POST['name'];
    $job = $_POST['job'];

    $subject = "Interview Invitation for $job Position";
    $message = "Dear Mr./Ms. $name,
                    \n\nCongratulations! You've passed the initial screening.
                    \n\nWe would like to schedule your interview for the $job position.
                    \n\nPlease reply to this email or wait for further instructions regarding the exact date and time.
                    \n\nBest regards,\nHR Department";

    $headers = "From: angetlfaithtolentino143@gmail.com";  //trial

    if (ini_set($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        http_response_code(500);
        echo "Failed to send email.";
    }
}
?>