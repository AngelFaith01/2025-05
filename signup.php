<?php

function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)? True:False;
}

if (isset($_POST['signup-submit'])) {
    require "db.php";

    $firstname =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
    header("Location: adminDashboard.php?error1=emptyfields"); 
    exit();
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: adminDashboard.php?error=invalidemail");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: adminDashboard.php?error=invalidemail");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: adminDashboard.php?error=invalidusername");
        exit();
    }
    else if (!between($password, 6,20)) {
        header("Location: adminDashboard.php?error=invalidpassword");
        exit();
    }
    else if($password !== $cpassword){
        header("Location: adminDashboard.php?error=passworddontmatch");
        exit();
    }  
    else {
        $sql = "SELECT username, email FROM admin WHERE username = ? OR email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: admnDashboard.php?error=error1");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck != 0) {
                header("Location: adminDashboard.php?error=UsernameEmailTaken");
                exit();
           } 
           else {
            $sql = "INSERT INTO admin(firstname, lastname, username, email, password, cpassword) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: adminDashboard.php?error=error2");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);    //encrypting password 
                    $hash_password = password_hash($cpassword, PASSWORD_DEFAULT);
                            
                    mysqli_stmt_bind_param($stmt, "ssssss", $firstname,$lastname,$username,$email,$hashedPwd, $hash_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: adminDashboard.php?signup=success"); 
                    exit();
                } 
           } 
       }
   }  
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
   
}
else{
    header("Location: adminDashboard.php");
    exit();
} 
 
?>