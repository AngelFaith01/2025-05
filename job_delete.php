<?php
include "db.php";

if (isset($_POST['delete']) && is_numeric($_POST['job_id'])) {
    $job_id = intval($_POST['job_id']);

    $stmt = $conn->prepare("DELETE FROM JobOffer WHERE job_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: admn.php?deleted=success");
        exit;
    } else {
        die("Prepare failed: " . $conn->error);
    }
} else {
    header("Location: admn.php");
    exit;
}  

