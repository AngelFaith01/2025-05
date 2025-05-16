<?php
include 'db.php';
if (isset($_POST['fail']) && is_numeric($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conn->prepare("UPDATE applicant SET status='failed' WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: admn.php?Applicant=failed");
        exit;
    } else {
        die("Prepare failed: admn.php;");
    }
} else {
    header("Location: admn.php");
    exit;
}
?> 