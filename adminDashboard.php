<?php  
session_start();
include "db.php";
 
$out = "";
if (isset($_POST['signup-submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $admin_id = '1';
 
    if ($password === $cpassword) { 
        $email_check_query = "SELECT * FROM `admin` WHERE `email` = '$email' LIMIT 1";
        $result = $conn->query($email_check_query);

        if ($result->num_rows >0) {
            echo "<script>alert('Email already exists. Please use a different email.'); window.history.back();</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $hash_password = password_hash($cpassword, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `admin` (`firstname`, `lastname`, `username`, `email`, `password`, `cpassword`, `admin_id`) 
                VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$hash_password', '$admin_id')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Sign-up successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
} else {
     echo "Passwords do not match!";
    }
}
?>
  
 

<!DOCTYPE html>
<html lang="en">
<head> 
 
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LogIn</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <!--logo--> 
    <link rel="icon" href="data:image/png;base64,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">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
      
    <link rel="stylesheet" href="admindashboard.css">
    
</head>

<body> 
    
<div class ="row" style="margin: 1rem;">
	<div class="col align-self-center">
        <div class="container" >
		<div class="card">
            <div class="login-box">
                <div class="login-snip">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" >Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" >Sign Up</label>
            <div class="login-space">
                <div class="login" id="log-in" style="margin-top: 7rem;">

                    <?php
                    if (isset($_GET['error1'])){ 
                        if ($_GET['error1'] == "error") {
                            echo '<h6 class="text-center text-danger">Error Occurred, Please Try Again. </h6>';
                        }
                        else if ($_GET['error1'] == "wrongpwd") {
                            echo '<h6 class="text-center text-danger>"Error Occurred, Wrong Password. </h6>';
                        }
                        else if ($_GET['error1'] == "error2") {
                            echo '<h6 class="text-danger text-center">Error Occurred, Please Try Again. </h6>';
                        }
                        else if($_GET['error1'] == "nouser") {
                            echo '<h6 class="text-danger text-center">Error Occurred, Username or Password Incorrect.';
                        }
                        echo '<br>' ;
                    }
                    ?> 

                    <div class="group">   
                        <form action="signin.php" method="POST">   
                            <input id="user" type="text" class="form-control border-rounded" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; box-shadow: 5px 0px 10px 0px #aaa;" name="username" placeholder="Enter your username" required>
                        
                            <input id="pass" type="password" class="form-control border-rounded" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; box-shadow: 5px 0px 10px 0px #aaa;" data-type="password" name="password" placeholder="Enter your password" required>
                         
                            <input id="check" type="checkbox" class="check" style="margin-top: .5rem;" checked>

                            <label for="check" style="color: #6184ac; margin-top: .5rem; font-size: 14px; background: transparent;">
                                <span class="icon" style="background-color: #6184ac;"></span><small> Keep me signed in</small></label> 
                            <div style="display: flex; justify-content: center;">
                            <!--<input type="submit" class="btn btn-outline-secondary btn-md text-dark" 
                            style="border: #1c3347 .5px solid; margin-top: .5rem; background-color: white; 
                            border-radius: 15px;" value="Sign In" name="login-submit">--> 
                            <button class="btn btn-outline-secondary btn-sm" style="border: #6184ac .5px solid; color: #6184ac; background-color: transparent; border-radius: 15px; box-shadow: 5px 0px 10px 0px #aaa;" name="login-submit">Log In</button>
                        </form>
                    </div>

                    </div>
                    <div class="hr" style="background-color: #6184ac;"></div>
                </div>
                <div class="sign-up-form" id="signup">

            <?php
                if(isset($_GET['error'])){
                    echo '  <script>
                                $(document).ready(function(){
                                $("#signup-modal").modal("show");
                                });
                            </script> ';

                    if($_GET['error'] == "emptyfields") {
                        echo '<p class="text-danger text-center">Fill all fields, Please try again!</p>';
                    }
                    else if($_GET['error'] == "invalidemailusername") {
                        echo '<p class="text-danger text-center">Username or Email are taken!</p>';
                    }
                    else if($_GET['error'] == "invalidemail") {
                        echo '<p class="text-danger text-center">Invalid Email, Please try again!</p>';
                    }
                    else if($_GET['error'] == "usernameemailtaken") {
                        echo '<p class="text-danger text-center">Username or email is taken, Please try again!</p>';
                    }
                    else if($_GET['error'] == "invalidusername") {
                        echo '<p class="text-danger text-center">Invalid Username, Please try again!</p>';
                    }
                    else if($_GET['error'] == "invalidpassword") {
                        echo '<p class="text-danger text-center">Invalid password, Please try again!</p>';
                    }
                    else if($_GET['error'] == "passworddontmatch") {
                        echo '<p class="text-danger text-center">Password must match, Please try again!</p>';
                    }
                    else if($_GET['error'] == "error1") {
                        echo '<p class="text-danger text-center">Error Occured, Try again!</p>';
                    }
                    else if($_GET['error'] == "error2") {
                        echo '<p class="text-danger text-center">Error Occured, Try again!</p>';
                    }
                    }
                    if (isset($_GET['sigup'])) { 
                        if ($_GET['signup'] == "success") {
                            echo '<h6 class="bg-success text-center">Sign up was successful.';
                        }
                    }
                    echo '<br>';
                ?>
                    <div class="group" > 
                        <form action="signup.php" method="POST">
                            <input type="hidden" name="action" value="register">
                            <input id="firstname" type="text" class="form-control border-rounded" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; box-shadow: 5px 0px 10px 0px #aaa;" name="firstname" placeholder="Firstname" required>

                            <input id="lastname" type="text" class="form-control border-rounded" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; box-shadow: 5px 0px 10px 0px #aaa;" name="lastname" placeholder="Lastname" required>
                            
                            <input type="text" id="user" class="form-control border-rounded" style="border: #6184ac .5px solid; margin-top: .5rem;color: #6184ac; box-shadow: 5px 0px 10px 0px #aaa;" name="username" placeholder="Username" required>

                            <input type="email" id="email" class="form-control border-rounded" style="border: #6184ac .5px solid; margin-top: .5rem; color: #6184ac; box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Email" name="email" required>
        
                            <input id="pass" type="password" class="form-control border-rounded" data-type="password" name="password" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Create your password" required>
                    
                            <input id="pass" type="password" class="form-control border-rounded" data-type="password" name="cpassword" style="border: #6184ac .5px solid; margin-top: .5rem; color: 6184ac; box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Confirm password" required>

                            <div style="display: flex; justify-content: center;">
                            <input type="submit" class="btn btn-outline-secondary btn-md" style="border: #6184ac .5px solid; color: #6184ac; margin-top: .5rem; background-color: white; color: #6184ac; border-radius: 15px; box-shadow: 5px 0px 10px 0px #aaa;" value="Sign In" name="signup-submit">
                        </form>
                    </div>

                    </div>
                    <div class="hr" style="background-color: #6184ac;"></div>
                    <div class="foot">
                        <label for="tab-1" style="font-size: 14px; color:#6184ac;"><small>Already a member?</small></label>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
</div>
</div>
</div>
 

</body>
</html>
