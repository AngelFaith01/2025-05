<?php
function between($val, $x, $y){
    $val_len = strlen($val);
    return ($val_len >= $x && $val_len <= $y)?TRUE:FALSE;
}

if(isset($_POST['signup-submit'])) {

    
    require 'connection.php';
    
    $first_name = $_POST['reg_fname'];
    $last_name = $_POST['reg_lname'];
    $username = $_POST['reg_username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['reg_email'];
    $address = $_POST['address'];
    $password = $_POST['reg_pwd'];
    $confirmPassword = $_POST['reg_cfpwd'];
    
    
    if(empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: index.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && 
    !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: index.php?error=invalidemailusername");
        exit();  
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalidemail");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username) || 
    !between($username,4,20)) {
        header("Location: index.php?error=invalidusername");
        exit();
    }
    else if(!between($password,6,20)) {
        header("Location: index.php?error=invalidpassword");
        exit();
    }
    else if($password !== $confirmPassword){
       header("Location: index.php?error=passworddontmatch");
       exit();
    }
   else {
       
       $sql = "SELECT username, email FROM user WHERE username=? 
       OR email=?";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("Location: index.php?error=error1");
           exit();
       }
       else {
           mysqli_stmt_bind_param($stmt, "ss", $username, $email);     //checks if there is email and username id
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
             if($resultCheck != 0){
                header("Location: index.php?error=usernameemailtaken");
                exit();
           }
          
           
           else {
            $sql = "INSERT INTO user(first_name, last_name, username, phonenumber, email, address, password) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: index.php?error=error2");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);    //encrypting password
                            
                            
                    mysqli_stmt_bind_param($stmt, "sssisss", $first_name,$last_name,$username,$phonenumber,$email,$address,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: index.php?signup=success");
                    exit();
                }
                
           }
           
       }
   } 
   //close to connection
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
   
}
else{
    header("Location: index.php");
    exit();
    
}