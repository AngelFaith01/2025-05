<?php
include "db.php"; 
if (isset($_POST['addannouncement'])) { 
    $title = $_POST['title']; 
    $desc = $_POST['desc']; 
    $location = $_POST['location'];
    $datetime = $_POST['datetime'];
    
    $sql = "INSERT INTO `announcement` (`title`, `desc`, `location`, `datetime`) Values ('$title', '$desc', '$location', '$datetime')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: Lp.php?SavedSuccessfully.");
    }
    else {
        header("Location: LP.php?FailedToSave.");
    }
}
?>
 