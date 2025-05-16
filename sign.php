<!-- 2025/05/15 -->

<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
 
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?"); 
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
 
        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: admin.php"); //IF THE USERNAME AND PASSWORD IS CORRECT BASED ON THE DATABASE
            exit();
        } else {  
            header("Location: adminDashboard.php?error=InvalidPassword");
            exit();
        }
    } else {
        header("Location: adminDashboard.php?error=NoUser");
        exit();
    }
}
?>
