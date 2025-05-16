<!--<?php
session_start();
 
include 'db.php';
$sql = "Select * From admin Where reset_code = 'reset_code' ";
$result = mysqli_query($conn, $sql);
$storedCode = $_SESSION['reset_code'] ?? '123456';   
$Email = $_Session['user_email'] ?? '@gmail.com';

if ($result["REQUEST_METHOD"] == "POST") {
    $enteredCode = $_POST['code'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($enteredCode !== $storedCode) {
        echo "<script>alert('Invalid code'); window.history.back();</script>";
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match'); window.history.back();</script>";
        exit;
    }
 
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
 
    echo "<script>alert('Password reset successful. You can now log in.'); window.location.href='adminDashboard.php';</script>";
}
?>-->

<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM admin WHERE reset_code = 'reset_code'";
$result = mysqli_query($conn, $sql); 
$storedCode = $_SESSION['reset_code'] ?? '';
$Email = $_SESSION['user_email'] ?? ''; 


if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedCode = $row['reset_code'];
    echo "<script>alert('Password reset successfully.'); window.location.href='adminDashboard.php';</script>";
} else {
    echo "<script>alert('Error fetching reset code.'); window.history.back();</script>";
    exit;
} 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow p-4">
          <h3 class="text-center mb-4" style="font-family: 'Poppins', Sans Serif;">Reset Your Password</h3>
          <form action="reset_password.php" method="POST">
            <div class="mb-3"> 
              <input type="text" class="form-control" name="code" required pattern="\d{6}" placeholder="Enter 6-digit Code" style="font-family: 'Poppins', Sans serif; border: #1c3347 .5px solid; margin-top: .5rem;">
 
              <input type="password" class="form-control" name="new_password" required placeholder="New Password" style="font-family: 'Poppins', Sans serif; border: #1c3347 .5px solid; margin-top: .5rem;">

              <input type="password" class="form-control" name="confirm_password" required placeholder="Confirm Password" style="font-family: 'Poppins', Sans serif; border: #1c3347 .5px solid; margin-top: .5rem;">
            </div>
            <div style="display: flex; justify-content: center;">
                <button type="submit" class="btn btn-outline-secondary btn-sm" style="border: #1c3347 .5px solid; font-family: 'Poppins', Sans serif;">Reset Password</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
