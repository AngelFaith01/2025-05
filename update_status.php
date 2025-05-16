<?php

include 'db.php';

if (isset($_POST['submit']) || isset($_POST['failed'])) {
    $id = intval($_POST['id']);
    $status = isset($_POST['submit']) ? 'passed' : 'failed';

    $sql = "UPDATE applicant SET status = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) { 
            header("location:admn.php?$status");
        } else {
            echo "<p>No changes were made. Status might already be '$status'.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Failed to prepare statement.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
