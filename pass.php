<?php
include 'db.php';
if (isset($_POST['pass']) && is_numeric($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conn->prepare("UPDATE applicant SET status='passed' WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close(); 
        header("Location: admn.php?Applicant=passed");
        exit;
    } else {
        die("Prepare failed: " . $conn->error);
    }
} else {
    header("Location: admn.php");
    exit;
}
?>