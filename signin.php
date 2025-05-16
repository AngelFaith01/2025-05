<?php

if (isset($_POST['login-submit'])) {
    require 'db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];  
    
    if (empty($username) || empty($password)) {
        header("Location: adminDashboard.php?error=EmptyFields");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: adminDashboard.php?error=error");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt); 

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']); //Error

                if ($pwCheck == True) {
                   header("Location: adminDashboard.php?error=wrongpassword"); 
                    exit(); 
                } else if ($pwdCheck == False) { 
                    session_start();
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admn'] = $row['admn'];
                    $admn = $_SESSION['admn'];
                    
                    if ($admin==1) {
                        header("Location: adminDashboard.php?loginfailed");
                        exit();
                    } elseif ($admin==0) {
                        header("Location: admn.php?login=success");
                        exit();
                    } 
                } else {
                    header("Location: adminDashboard.php?error=error");
                    exit();
                }
            } else {
                header("Location: adminDashboard.php?error=NoUserFound");
                exit();
            }
        }  
    }
} else {
    header("Location: adminDashboard.php");
    exit();
}
 
?>
