<?php
session_start();
include "db.php";

if (isset($_POST['jobadd'])) {
  $job_title = $_POST['job_title']; 
  $job_desc = $_POST['job_desc'];
  $job_type = $_POST['job_type'];
  $educ_back = $_POST['educ_back'];
  $location = $_POST['location']; 
  $experience = $_POST['experience'];
  $salary = $_POST['salary']; 
  $benefits = $_POST['benefits']; 
  $description = $_POST['description']; 
  
  $sql = "INSERT INTO `JobOffer` (`job_title`, `job_desc`, `job_type`, `educ_back`, `location`, `experience`, `salary`, `benefits`, `description`, `admin_id`) 
  VALUES ('$job_title', '$job_desc', '$job_type', '$educ_back', '$location', '$experience', '$salary', '$benefits', '$description', '1')";
  $query = $conn->query($sql);
 
} 
?>

<!--Product-->
<?php
include "db.php";

if (isset($_POST['addproduct'])) {
    $prod_name = $_POST['prod_name'];
    $prod_desc = $_POST['prod_desc'];
    $product_type = $_POST['product_type'];
    $product_price = $_POST['product_price'];  //image?

    $sql = "INSERT INTO `product` (`prod_name`, `prod_desc`, `product_type`, `product_price`) 
            VALUES ('$prod_name', '$prod_desc', '$product_type', '$product_price')";
            $query = $conn->query($sql);
}
?>
<!--End Product-->

<?php 
$today = new DateTime();
$currentYear = $today->format('Y');
$currentMonth = $today->format('m');
$currentDay = $today->format('d');

$firstDayOfMonth = new DateTime("$currentYear-$currentMonth-01");
$firstDayOfWeek = $firstDayOfMonth->format('w'); 
$daysInMonth = $firstDayOfMonth->format('t'); 
 
$months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];
 
$currentMonthName = $months[$currentMonth - 1];

?>
 
<?php
if (isset($_POST['settings'])) {
  require 'db.php';
  $user = $_POST['user'];
  $password = $_POST['password'];

  if (empty($user) || empty($password)) {
    header("Location: ");
  }
}
?>
 
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
          header("location: admn.php?$status");
        } else { 
            header("location: admn.php?$status");
        }

        $stmt->close();
    } else {
        echo "<p>Failed to prepare statement.</p>";
    }
}   
?>

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
        header("Location: admn.php?SavedSuccessfully.");
    }
    else {
        header("Location: admn.php?FailedToSave.");
    }
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 
    
    <!--Logo-->
    <link rel="icon" href="data:image/png;base64,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">
    
  
    <link rel="stylesheet" href="admn.css">
</head>
 
<body>
<meta http-equiv="Cache-Control" content="no-store" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
 
<nav class="navbar">
  <div class="navbar-container container1">
    <a class="navbar-brand" href="#">
        <img src="" height="30" alt="">
    </a>
    <input type="checkbox" name="" id="">
    <div class="hamburger-lines">
      <span class="line line1"></span>
      <span class="line line2"></span>
      <span class="line line3"></span>
    </div>

      <ul class="menu-items"> 
        <li class="nav-item" style="margin-top: .5rem;">
          <a href="" class="btn btn-outline-secondary btn-sm text-dark" style="border-radius: 10px; backkgroun-color: transparent;">Applicant</a>
        </li>
        <li class="nav-item" style="margin-top: .5rem;">
          <a href="logout.php" class="btn btn-outline-secondary btn-sm" style="font-family:'Poppins', Sans serif; color:rgb(49, 11, 11); border-radius: 10px; background-color: transparent;">Log out</a>
        </li> 
      </ul> 
  </div>
</nav> 

&nbsp &nbsp

<!--Modal for Settings-->
<div class="modal-dialog" id="settings" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;">
  <div>
    <form action="admn.php" method="POST">
      <a href="#" class="modal-close text-dark" title="close">x</a>
      <p style="text-align: center;">Change Password</p>

      <?Php 
      if (isset($alert)) {
        echo $alert;
      }
      ?>

      <div class="form-group">
        <input type="text" class="form-control border-rounded" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Username" name="Username" value="" required>
        <input type="file" class="form-control border-rounded" style="margin-top: .5rem; border: #1c3347 .5px solid;">
        <input type="password" class="form-control border-rounded" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Old Password" name="oldpassword" value="" required>
        <input type="password" class="form-control border-rounded" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="New Password" name="newpassword" value="" required>
        <input type="password" class="form-control border-rounded" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Confirm Password" name="confirmpassword" value="" required>
      </div>
      <br>
      <button type="settings" class="btn btn-outline-secondary btn-sm text-dark" name="settings" id="settings" style="border: #1c3347 .5px solid;">Submit</button>
    </form>
  </div>
</div>
<!--End Modal for Settings-->  
 
  
  <div class="container my-5" style="font-family: 'Poppins', Sans serif;" id="cont">
      <div class="card" style="padding: 1rem; display: flex; justify-content: center; border: #1c3347 .5px solid; border-radius: 20px; box-shadow: 5px 0px 10px 0px #1c3347;">
     
      <h2 style=" font-family: 'Poppins', sans serif; margin-top: .5rem; margin-bottom: .5rem;">Hello, 
    
      <?php 
      include_once "db.php";
      
      if (isset($_SESSION['admin_id'])) {
          $admin_id = $_SESSION['admin_id'];  
          $sql = "SELECT * FROM admin WHERE admin_id = ?";
          
          if ($stmt = $conn->prepare($sql)) {
              $stmt->bind_param("i", $admin_id); 
              $stmt->execute();
              $result = $stmt->get_result();
              
              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo $row['username'];  
              } else {
                  echo "User not found.";
              }
          } else {
              echo "Error in preparing SQL statement.";
          }
        } 
      ?>    
      </h2>
   
  <div class="row g-4"> 
        <div class="col-md-3">
          <div class="card text-center" style="border-radius: 15px; background-color: #c8d9e6 ; box-shadow: 5px 0px 10px 0px #c8d9e6;">
            <div class="card-body">
              <h5 class="card-tite">Products</h5> 
              <?php 
              include_once "db.php";   

              If (isset($_SESSION['admin_id'])) {
              $admin_id = $_SESSION['admin_id'];
              $sql = "SELECT COUNT(*) As total FROM product";
              $result = $conn->query($sql); 
          
              if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                echo $row['total']; 
              } else {
                echo "0";  
              }
              }
              ?> 
              <div style="display: flex; justify-content: center;">
                <a href="#prodmod" class="btn btn-outline-secondary btn-sm bg-light text-dark" style="border: none; border-radius: 10px; box-shadow: 5px 0px 10px 0px white;">+</a>
              </div>
            </div>
          </div>
        </div> 

        <div class="col-md-3">
          <div class="card text-center" style="border-radius: 15px; background-color: #c8d9e6; box-shadow: 5px 0px 10px 0px #c8d9e6;">
            <div class="card-body"> 
                <h5 class="card-title">Applicants</h5> 
              <?php
              include_once 'db.php';

              if (isset($_SESSION['admin_id'])) {
                $admin_id = $_SESSION['admin_id'];

                $sql = "SELECT COUNT(*) As total FROM applicant";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  echo $row['total'];
                } else {
                  echo "0";
                }
              }
              ?>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center" style="border-radius: 15px; background-color: #c8d9e6; box-shadow: 5px 0px 10px 0px #c8d9e6;">
            <div class="card-body">
              <h5 class="card-title" >Announcements</h5>
                <!--<?php // for interview 
                include_once 'db.php';
                $today = date('Y-m-d');

                if (isset($_SESSION['admin_id'])) {
                  $admin_id = $_SESSION['admin_id'];

                  $sql = "SELECT COUNT(*) As total FROM applicant WHERE status = 'passed' AND DATE_FORMAT(datetime, '%Y-%m-%d') = '$today'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['total']; 
                  } else {
                    echo "0";
                  }
                }
                ?> 

                <div style="display: flex; justify-content: center;">
                  <a href="#viewjob" class="btn btn-outlin-secondary btn-sm bg-light text-dark" style="border: none; border-radius: 10px; box-shadow: 5px 0px 10px 0px #aaa;">Add</a>
                </div>-->

                <div style="display: flex; justify-content: center;">
                  <a href="#announcement" class="btn btn-outline-secondary btn-sm bg-light text-dark" style="border: none; border-radius: 10px; box-shadow: 5px 0px 10px 0px #aaa;">Add</a>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center" style="border-radius: 15px; background-color: #c8d9e6; box-shadow: 5px 0px 10px 0px #c8d9e6;">
            <div class="card-body">
              <h5 class="card-title">Add Job</h5>
              <a href="#job" class="btn btn-outline-secondary btn-sm bg-light text-dark" style="border: none; border-radius: 10px; box-shadow: 5px 2px 10px 2px #aaa;">+</a>
            </div>
            </div>
            </div>

       <!--<div class="col-md-3"> mail sending
          <div class="card mb-4" style="border-radius: 15px; "> 
            <canvas id="doughnutChart" style="margin-bottom: .5rem"></canvas>  
        </div> 
      </div>-->
 
    </div>
  </div>

  <!--Announcements-->
  <div class="modal-dialog" id="announcement" style="font-family: 'Poppins', Sans serif; display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;">
    <div style="box-shadow: 15px 10px 20px 10px #aaa;">
      <a href="#" class="modal-close text-dark" title="close">x</a>
      <form action="#cont" method="post">
        <div class="form-group">
            <h5 style="display: flex; justify-content: center;">Announcements</h5>
          <div class="mb-3">
            <input type="text" class="form-control" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Announcement Title" name="title" required>
            <textarea name="desc" style="margin-top: .5rem; border: #1c3347 .5px solid;" id="" placeholder="Description" class="form-control"></textarea>
            <input type="text" class="form-control" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Location" name="location" required>
            <input type="text" class="form-control" style="margin-top: .5rem; border: #1c3347 .5px solid;" placeholder="Time" name="datetime" required>
          </div> 

            <div style="display: flex; justify-content: right; margin-right: .5rem;">
              <button type="addannouncement" class="btn btn-outline-secondary btn-sm" style="border-radius: 15px; color: #1c3347; border: #1c3347 .5px solid; background-color: white; box-shadow: 5px 0px 10px 0px #aaa;" name="addannouncement" id="addannouncement">Add Product</button></form> 
            </div>
            
        </div>
      </form>
    </div>
  </div>
  <!--End Announcements-->

      <!--For Interview Modal-->
      <div class="modal-dialog" id="viewjob" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;">
        <div style="box-shadow: 5px 0px 10px 0px #aaa; border: #1c3347 .5px solid;;">
          <a href="#" class="modal-close text-dark" title="close">x</a>
          <?php 
          include_once 'db.php';
          $today = date('Y-m-d');
          $sql = "SELECT * FROM applicant As A Inner Join jobOffer As B On A.job_id = B.job_id WHERE DATE_FORMAT(A.datetime, '%Y-%m-%d') = '$today' And status='passed'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc())  {
              ?>
              <div class="card" style="margin-top: .5rem; border: none; box-shadow: 5px 0px 10px 0px #aaa;">
                <div class="card-body">
                  <h5 style="text-align: center;"><?= $row['job_title']?></h5>
                  <p><small><strong>Name: </strong><?= $row['firstname']?> <?= $row['lastname']?></small></p>
                  <p><small><strong>Email: </strong><?= $row['email']?></small></p>
                  <p><small><strong>Phonenumber: </strong><?= $row['phonenumber']?></small></p>
                  <p><small><strong>Description: </strong><?= $row['self_desc']?></small></p>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
      <!--End Interview Modal-->  

<section class="container my-5" style="font-family: 'Poppins', Sans serif;">
  <div class="card" style="padding: 1rem; border: none; box-shadow: 5px 0px 10px 0px #aaa; height: 450px; overflow-y: auto; border-radius: 15px;">
    <div class="row justify-content-between align-items-center mb-3">
      <div class="col-4" style="display: flex;">
        <h3>Applicants</h3>
      </div>
      <div class="col-4" style="display: flex;">
        <form action="" method="GET">
          <div class="input-group">
            <input type="search" class="form-control" name="search" placeholder="Search" aria-label="Search" style="border: #1c3347 0.5px solid; color: #6184ac;">
            <button class="btn btn-outline-secondary btn-sm text-dark" type="submit" style="border: #1c3347 .5px solid; background-color: transparent;">Search</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr style="color: #1c3347;">   
            <th style="border: #1c3347 .5px solid; background-color: #c8d9e6; text-align: center;">Job Title</th>
            <th style="border: #1c3347 .5px solid; background-color: #c8d9e6; text-align: center;">Name</th>
            <th style="border: #1c3347 .5px solid; background-color: #c8d9e6; text-align: center;">Email</th>  
            <th style="border: #1c3347 .5px solid; background-color: #c8d9e6; text-align: center;">Approval</th>
          </tr>
        </thead>
        <tbody>

<?php
$conn = new mysqli("localhost", "root", "", "contact");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "";
$params = [];

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
 
    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
        $searchTerm = trim($_GET['search']);
        $query = "SELECT * FROM applicant AS A 
                  INNER JOIN joboffer AS B ON A.job_id = B.job_id 
                  WHERE status = 'applicant' AND 
                  (job_title LIKE ? OR firstname LIKE ? OR lastname LIKE ?) And status = 'applicant' " ;
        $like = "%$searchTerm%";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $like, $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();
    } else { 
        $query = "SELECT * FROM applicant AS A 
                  INNER JOIN joboffer AS B ON A.job_id = B.job_id 
                  WHERE status = 'applicant'";
        $result = $conn->query($query);
    }

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td style="border: #1c3347 .5px solid; text-align: center;"><?= htmlspecialchars($row["job_title"]) ?></td> 
              <td style="border: #1c3347 .5px solid; text-align: center;"><?= htmlspecialchars($row['firstname']) ?> <?= htmlspecialchars($row['lastname']) ?></td> 
              <td style="border: #1c3347 .5px solid; text-align: center;"><?= htmlspecialchars($row['email']) ?></td>   
              <td style="border: #1c3347 .5px solid; justify-content: between;">
                <div class="d-flex gap-2">
                  <form action="pass.php" method="POST" onsubmit="return confirm('Yay! This applicant will proceed to the next step.');">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-outline-secondary btn-sm text-dark" name="pass" style="border: #1c3347 .5px solid; background-color: white; border-radius: 10px;">Pass</button>
                  </form>
                  <form action="fail.php" method="POST" onsubmit="return confirm('Oops! You clicked fail. Are you sure?');">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-outline-secondary btn-sm text-dark" name="fail" style="border:rgb(54, 12, 12) .5px solid; background-color: white; border-radius: 10px;">Fail</button>
                  </form>
                </div>
              </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='4' class='text-center text-muted'>No results found.</td></tr>";
    }

    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>
        </tbody>
      </table>
    </div>
  </div>
</section> 
  
<!--Product Modal-->
<div class="modal-dialog" id="prodmod">
  <div style="box-shadow: 15px 10px 20px 10px #aaa;">
    <a href="#cont" class="modal-close text-dark" title="close">x</a>
    <form action="admn.php" method="POST">
      <h5 style="text-align: center;">Add Product</h5>

      <?php
      if (isset($alert)) {
        echo $alert;
      }
      ?>
      <div class="form-group">
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Product name" name="prod_name" style="border: #1c3347 .5px solid;" required>
        </div>
        <div class="mb-3">
          <textarea name="prod_desc" id="" class="form-control" placeholder="Product Description" row="3" style="border: #1c3347 .5px solid;" required></textarea>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Product type" name="product_type" style="border: #1c3347 .5px solid;" required>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Product price" name="product_price" style="border: #1c3347 .5px solid;" required>
        </div>
        
        <div style="display: flex; justify-content: right; margin-right: .5rem;">
          <button type="addproduct" class="btn btn-outline-secondary btn-sm text-dark" style="border-radius: 15px; border: #1c3347 .5px solid; background-color: transparent; box-shadow: 5px 0px 10px 0px #aaa;" name="addproduct" id="addproduct">Add Product</button></form> 
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Product Modal--> 

  <!--<div class="row g-0" style="margin-top: 1rem; margin-left: 1rem; margin-right: 1rem;">
    <div class="col-sm-6 col-md-3" style="margin-right: 1rem; margin-top: .5rem;">
      <div class="calendar-header" style="font-family: 'Poppins', Sans serif;">Summary</div>
      <div class="card" style="padding: 1rem; border: #1c3347 solid .5px; height: 260px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-left-radius: 0; border-top-right-radius: 0;"> 
 
      <div class="card" style="margin-top: .5rem; border: #1c3347 .5px solid ; height: 60px;">
    <p style="margin: .5rem; display: flex; justify-content: space-between; align-items: center; ">
        <small>Applications</small> 
        <h6 style="margin-left: auto; margin-right: 1rem;">  
            <?php 
            include_once "db.php";   
            
            if (isset($_SESSION['admin_id'])) {
              $admin_id = $_SESSION['admin_id'];
              
            $today = date('Y-m');  //per year and month 
 
            //$sql = "SELECT COUNT(*) AS total FROM applicant AS A Inner Join admin AS B On A.admin_id = B.admin_id WHERE DATE_FORMAT(A.datetime, '%Y-%m') = '$today' and admin = 1";

            $sql = "SELECT COUNT(*) AS total FROM applicant WHERE DATE_FORMAT(datetime, '%Y-%m') = '$today'";
            $result = $conn->query($sql); 

            if ($result->num_rows > 0) { 
                $row = $result->fetch_assoc();
                echo $row['total']; 
            } else {
                echo "0";  
            }
            }
            ?> 
        </h6>
    </p>
</div>
 
    <div class="card" style="margin-top: .5rem; border: #1c3347 solid .5px; height: 60px;"> 
        <p style="margin: .5rem; display: flex; justify-content: space-between; align-items:center">
          <small>For Interview</small>
          <h6 style="margin-left: auto; margin-right: 1rem; "> 

            <?php
            include_once "db.php";

            if (isset($_SESSION['admin_id'])) {
              $admin_id = $_SESSION['admin_id'];
               $sql = "SELECT COUNT(*) AS total FROM applicant WHERE status = 'passed'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $row = $result-> fetch_assoc();
                echo $row['total'];
              } else {
                echo "0";
              }
            }
            ?>
          </h6>
        </p> 
    </div>

    <div class="card" style="margin-top: .5rem; border: #1c3347 .5px solid; height: 60px; "> 
      <p style="margin: .5rem; display: flex; justify-content: space-between; align-items: center;">
      <small>Products (<?php
      include_once "db.php";
      //$today = date('Y-m');
      //$sql = "SELECT COUNT(*) As total FROM product WHERE DATE_FORMAT(datetime, '%Y-%m') = '$today'"; 
      $sql = "SELECT COUNT(*) As total FROM product";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['total'];
      } else {
        echo "0";
      }
      ?>)</small>- 
      <a href="#addProduct" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 .5px solid;">Add</a>
      </p>
    </div>
  </div>
</div> 

<div class="col-sm-6 col-md-4" style="margin-right: 1rem; margin-top: .5rem;">
  <div class="calendar-header" id="app" style="font-family: 'Poppins', Sans serif;">Applicants</div>
  <div class="card" style="padding: 1rem; border: #1c3347 solid .5px; overflow-y: auto; height: 260px; border-radius: 0 0 10px 10px;">
    <?php
    $sql = "SELECT * FROM applicant AS A INNER JOIN jobOffer AS B ON A.job_id = B.job_id Where status='applicant'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card mb-2" style="border: #1c3347 .5px solid;">
          <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
          <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
            <small><?= htmlspecialchars($row['job_title']) ?></small>
            <a href="#applications" class="btn btn-outline-secondary btn-sm text-dark applicant-btn" 
               data-job-id="<?= $row['job_id'] ?>" data-applicant-id="<?= $row['id'] ?>"
               style="border: #1c3347 solid .5px;">More Info</a>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div> 
</div>
 
  <div class="col-sm-6 col-md-4 " style="margin-top: .5rem; display: flex;" >  
    <div class="calendar"> 
         <div class="calendar-header" id="calendar-header" style="font-family: 'Poppins', Sans serif;">
            <?php echo $currentMonthName . ' ' . $currentYear; ?>
        </div>
        <div class="calendar-grid"> 
            <div class="day-name" >S</div>
            <div class="day-name" >M</div>
            <div class="day-name" >T</div>
            <div class="day-name" >W</div>
            <div class="day-name" >T</div>
            <div class="day-name" >F</div>
            <div class="day-name" >S</div>
 
            <?php for ($i = 0; $i < $firstDayOfWeek; $i++): ?>
                <div class="day-number"></div>
            <?php endfor; ?>
 
            <?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
                <div class="day-number <?php echo ($day == $currentDay) ? 'current-day' : ''; ?>">
                    <?php echo $day; ?>
                </div>
            <?php endfor; ?>
        </div> 
    </div>
    
</div>-->
 

<!-- Modal for Applications -->
<div class="modal-dialog" id="applications" style="display: flex; justify-content: center; ">
  <div style="box-shadow: 15px 10px 10px 0px #aaa;">
    <a href="#app" class="modal-close text-dark" title="close">x</a>
    <div id="app-details-content">
      <p>Select Applicant to see info.</p>
    </div>
  </div>
</div> 

<section >
  <div class="row justify-content"> 
    <div class="col">  
       <div class="card" style="overflow-y: auto; height: 100px; padding: 20px; box-shadow: 5px 0px 10px 0px #aaa; border: none; display: flex; justify-content: center;">
      <!--<?php
      include_once 'db.php';
      $sql = "SELECT * FROM joboffer";
      $result = $conn->query($sql);

      if ($result -> num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="card" style="border: #1c3347 .5px solid; margin-top: .5rem; border-radius: 15px;">
          <div class="card-body">
          <h5 style="text-align: center;"><?= htmlspecialchars($row['job_title'])?></h5>
          <p><?= htmlspecialchars($row['job_desc'])?></p> 
        </div>
      </div>

          <?php
        }
      }
      ?> -->  
      </div>
      </div>

      <div class="col order-5"> 
         <div class="card" style="box-shadow: 5px 0px 10px 0px #aaa; padding: 20px; height: 100px; overflow-y: auto; display: flex; justify-content: center;"> 
           
        </div> 
      </div>

      <div class="col order-1">
        <!-- <img src="" alt=""> -->
        <div class="card" style="box-shadow: 5px 0px 10px 0px #aaa; padding: 20px; height: 100px; display: flex; justify-content: center;">
           
        </div>
      </div>

    </div>
  </div>
</section>

<br>
<!-- <div class="row g-0" >
<div class="col-sm-12 col-md-9">
  <br> 
  <div class="card" style="border: #1c3347 solid .5px; margin-top: .5rem; overflow-y: auto; overflow-x: auto; height: 400px; box-shadow: 5px 0px 10px 0px #1c3347;" id="application">
    <div class="card-body" style="font-family: 'Poppins', Sans serif;">
      <h5 style="display: flex; justify-content: space-between; align-items: center;">Job Offers
        <a href="#job" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 solid .5px; box-shadow: 5px 0px 10px 0px #aaa; background-color: white;">Add</a>
    </h5>
      <div class="table-responsive"> 
        <table class="table">
          <thead>
            <tr> 
              <th style="border: #1c3347 solid .5px;"><small>Job Title</small></th>
              <th style="border: #1c3347 solid .5px;"><small>Job Description</small></th>
              <th style="border: #1c3347 solid .5px;"><small>Job Type</small></th>
              <th style="border: #1c3347 solid .5px;"><small>Educational Background</small></th>  
              <th style="border: #1c3347 solid .5px;"><small>Experience</small></th>   
              <th style="border: #1c3347 solid .5px;"><small></small></th>
            </tr>  
          </thead>
          <tbody> 
          
          <?php
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id']; 
    $sql = "SELECT * FROM jobOffer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td style="border: #1c3347 .5px solid;"><?= htmlspecialchars($row["job_title"]) ?></td>
              <td style="border: #1c3347 .5px solid;"><?= htmlspecialchars($row["job_desc"]) ?></td>
              <td style="border: #1c3347 .5px solid;"><?= htmlspecialchars($row["job_type"]) ?></td>
              <td style="border: #1c3347 .5px solid;"><?= htmlspecialchars($row["educ_back"]) ?></td>
              <td style="border: #1c3347 .5px solid;"><?= htmlspecialchars($row["experience"]) ?></td>
              <td style="border: #1c3347 .5px solid;">
                <form method="POST" action="job_delete.php" onsubmit="return confirm('Delete this job offer?');">
                  <input type="hidden" name="job_id" value="<?= $row['job_id'] ?>">
                  <button type="submit" class="btn btn-outline-secondary btn-sm" name="delete" style="border: #1c3347 solid .5px; color: #1c3347; background-color: white; box-shadow: 5px 0px 10px 0px #aaa;">Delete</button>
                </form>
              </td>
            </tr>
            <?php
        }
    }
}
?>
 
</tbody> 
        </table>
      </div>
    </div>
  </div>
</div>  -->

<!--change for product-->
<!-- <div class="col-sm-6 col-md-3" > 
  <div class="card" style="height: 400px; margin-top: 2rem; border:none; box-shadow: 5px 0px 10px 0px #1c3347;" id="status">
    <div class="card-body table responsive" style="overflow-y: auto; border: #1c3347 .5px;"> 
      <p style="display: flex; justify-content: space-between; align-items: center;">  
        <?php
        include_once 'db.php';
        $sql ="SELECT * FROM applicant As A Inner Join jobOffer As B On A.job_id = B.job_id WHERE A.status = 'passed'";
        $result = $conn->query($sql);

        if ($result -> num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <div style="margin-top: .5rem;">
              <div class="card" style="border: none; display: flex; justify-content: space-between; box-shadow: 5px 0px 10px 0px #1c3347;">
                <h5 style="display: flex; justify-content: center; font-family: 'Poppins', Sans serif;"><?= htmlspecialchars($row['job_title'])?></h5>
                <p style="font-family: 'Poppins', Sans serif; justify-content: space-between;"><small><?= htmlspecialchars($row['firstname'])?> <?= htmlspecialchars($row['lastname'])?></small>
                <small style="color:rgb(56, 14, 11);"><?= htmlspecialchars($row['status'])?></small></p>
                 
              </div>
            </div>
            <?php
          }
        }
          ?>
        </p> 
      </div>
    </div>
  </div>
</div> -->
  
<!--Modal--> 
<div class="modal-dialog" id="job" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050; font-family: 'Poppins', Sans serif;">
    <div style="box-shadow: 15px 10px 10px 0px #aaa;">
        <form action="admn.php" method="post">
            <a href="#" class="modal-close text-dark" title="close">X</a>
            <h4 style="text-align: center;">Job Offer</h4>
            <?php
            if (isset($alert)) {
                echo $alert;
            }
            ?>
            <div class="form-group">   
                <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid;" class="form-control " placeholder="JobTitle" value="" name="job_title" required>

              <textarea name="job_desc" style="margin-top: .5rem; border: #1c3347 .5px solid" id="" rows="3" placeholder="Job Description" class="form-control" required></textarea>
 
              <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid;" class="form-control" placeholder="Job Type" value="" name="job_type" required> 
 
              <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid;" class="form-control" placeholder="Educational Background" value="" name="educ_back" required>

              <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid; " class="form-control " placeholder="Location" value="" name="location" required>

              <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid; " class="form-control " placeholder="Experience" value="" name="experience" required>

              <input type="text" style="margin-top: .5rem; border: #1c3347 .5px solid;" class="form-control" placeholder="Salary" value="" name="salary" required>

              <textarea style="margin-top: .5rem; border: #1c3347 .5px solid;" name="benefits" id="" class="form-control " placeholder="Benefits" rows="2" require></textarea>
              
              <textarea name="description" id="" style="margin-top: .5rem; border: #1c3347 .5px solid;" class="form-control" placeholder="Description" rows="3" require></textarea>
            </div>
            <br> 
            <div style="display: flex; justify-content: right; margin-right: .5rem;">
              <button type="jobadd" class="btn btn-outline-secondary btn-sm text-dark" name="jobadd" id="jobadd" style="border: #1c3347 .5px solid; border-radius: 15px; background-color: white;">Submit</button>
            </div>
                 </form>
        </div>
    </div>
</div>

<!--End Modal-->
 
<br>
<br> 
<div class="modal-dialog" id="Add" > 
  <div class="col-sm-6"> 
    <div class="card" style="border:rgb(255, 255, 255) solid 1px; width: auto; height: auto;">
      <div class="card-body">
        <div class="row">
            <a href="#" class="modla-close text-dark" title="close" style="margin-left: 18rem">x</a>
          <div class="col-12"> 
            <div class="card" style="text-align: center; background-color:rgb(151, 178, 201)">Add New Job</div>
            <div class="form-group" >
              <label class="form-label text-white fs-7"></label>
              <input type="text" class="form-control border rounded" placeholder="Job Title" name="jobtitle" required>
            
              <label class="form-label text-white fs-7"></label>
              <input type="text" class="form-control border rounded" placeholder="Job Type" name="jobtype" required>

              <label class="form-label text-white fs-7"></label>
              <textarea class="form-control border rounded" placeholder="Job Description" name="jobdesc" rows="2" required></textarea>
           
              <label class="form-label text-white fs-7"></label>
              <textarea name="" id="exp" placeholder="Job Experience" class="form-control border rounded" rows="2" required></textarea>
            
              <label class="form-label text-white fs-7"></label>
              <input type="text" class="form-control border rounded" placeholder="Salary" name="salary" required>

              <label class="form-label text-white fs-7"></label>
              <input type="text" class="form-control border rounded" placeholder="Benefits" name="benefits" required><br>

              <button type="button" class="btn btn-outline-secondary" style="margin-left: 15rem;">Add</button><br><br>

            </div> 
        </div>
      </div>
    </div>
  </div>
</div> 
</div> 

<!--Modal Add Job--> 
  <div class="modal-dialog" id="addProduct" style="align-items: center; justify-content: center; display: flex; font-family: 'Poppins', Sans serif;">
    <div style="box-shadow: 15px 10px 10px 0px #aaa; border: #1c3347 .5px solid;">

    <form action="admn.php" method="POST">
    <a href="#" class="modal-close text-dark" title="close">x</a> 
    <h5 style="text-align: center;">Add Product</h5>

    <?php
    if (isset($alert)) {
      echo $alert;
    }
    ?>   
    <div class="form-group">
      <input type="text" class="form-control border rounded" style="margin-top: .5rem;" placeholder="Product Name" name="prod_name" required>
      <input type="text" class="form-control border rounded" style="margin-top: .5rem;" placeholder="Product Description" name="prod_desc" required>
      <input type="text" class="form-control border rounded" style="margin-top: .5rem;" placeholder="Product Type" name="product_type" required>
      <input type="text" class="form-control border rounded" style="margin-top: .5rem;" placeholder="Product Price" name="product_price" required>
      <input type="file" class="form-control border rounded" style="margin-top: .5rem;" name="image" required>
  
  <div style="display: flex; justify-content: center;">
    <button type="addproduct" class="btn btn-outline-secondary" name="addproduct" id="addproduct">Add Job</button></form> 
  </div>
</div> 
  </div> 

<!--End Modal Add Job-->

<!--Modal--> 
<div id="myModal" class="modal">
  <div class="modal-content"> 
      <span class="close text-dark" id="closeModalBtn">&times;</span> 
      <h3 style="font-family: 'Poppins', Sans-serif;">App</h3>
      
      <table class="table" style="margin-top: 3rem;">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th>File</th>
          </tr>
        </thead>
        <?php
        include_once "db.php";
        $sql = "SELECT * FROM applicant";
        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {   
        ?>
        <tbody>
          <tr>
            <td><?=$row["firstname"]?></td>
            <td><?=$row["lastname"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["phonenumber"]?></td> 
            <td><?=$row["file"]?></td>
          </tr>
        </tbody>
        <?php
        $count++;
        }
        }   
        ?>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!--End Modal App-->

<!--Modal size prob--> 

<div class="modal-dialog" id="modalcon" >
    <div class="card" style="overflow-y: auto;">
        <a href="" class="modal-close text-dark">x</a>
        <h3>Feedbacks</h3> 
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phonenumber</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>

            <?php 

            include_once "db.php";
            $sql = "SELECT * FROM contact";
            $result = $conn->query($sql);
            $count = 1;

            If ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tbody>
                        <tr>
                            <th style="border: #1c3347 solid .5px"><?=$row["name"]?></th>
                            <th style="border: #1c3347 solid .5px;"><?=$row["phonenumber"]?></th>
                            <th style="border: #1c3347 solid .5px"><?=$row["email"]?></th>
                            <th style="border: #1c3347 solid .5px;"><?=$row["message"]?></th>
                        </tr>
                    </tbody>

                    <?php
                    $count++; 
                }
            } else {
                echo "<tr><th>No data found.</th></td>";
            }
            ?>
        </table>
    </div> 
</div>
<!--End Modal Feedback-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    
  <script> 
    document.getElementById('openModalBtn').onclick = function() {
      document.getElementById('myModal').style.display = "block";
    } 
    document.getElementById('closeModalBtn').onclick = function() {
      document.getElementById('myModal').style.display = "none";
    }
 
    window.onclick = function(event) {
      if (event.target == document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = "none";
      }
    }
  </script> 

<script>
document.querySelector('form').reset();

document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();  

    var jobTitle = document.querySelector('[name="job_title"]').value;
 
    fetch('check_job_title.php', {
        method: 'POST',
        body: JSON.stringify({ job_title: jobTitle }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            alert('This job title already exists.');
        } else { 
            e.target.submit();
        }
    });
});

</script>

<script>
        document.getElementById('nextMonth').addEventListener('click', function() { 
    window.location.href = "?month=" + (currentMonth + 1);
});

document.getElementById('prevMonth').addEventListener('click', function() { 
    window.location.href = "?month=" + (currentMonth - 1);
});

    </script>
<script>
  $(document).ready(function () {
    $('.applicant-btn').click(function () {
        var jobId = $(this).data('job-id');
        var applicantId = $(this).data('applicant-id');
        $.ajax({
            url: 'get_app_details.php',
            type: 'POST',
            data: { job_id: jobId, id: applicantId },
            success: function (response) {
                $('#app-details-content').html(response);
                window.location.hash = 'applications';
            },
            error: function () {
                $('#app-details-content').html('<p>Error loading application details.</p>');
            }
        });
    });
  });
</script>  
  

<!--mail-->
<script>
document.querySelectorAll('.send-email-btn').forEach(button => {
    button.addEventListener('click', () => {
        const email = button.getAttribute('data-email');
        const name = button.getAttribute('data-name');
        const job = button.getAttribute('data-job');

        //fetch('send_interview_email.php', {
        fetch('send_mail.php', {
                    method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `email=${encodeURIComponent(email)}&name=${encodeURIComponent(name)}&job=${encodeURIComponent(job)}`
        })
        .then(response => response.text())
        .then(data => {
            alert(data); 
        })
        .catch(error => {
            alert('Error sending email.');
            console.error(error);
        });
    });
});
</script>
 
  
</body>
</html>