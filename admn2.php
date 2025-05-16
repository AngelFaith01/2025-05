<?php
include "db.php";
if (isset($_POST['delete'])) {
    $job_id = $_POST['id']; 
    
    $sql = "DELETE FROM joboffer WHERE job_id = ?";   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $job_id);  

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job List</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 
    
    <link rel="stylesheet" href="style.css">
    </head>

    <style>
      
.modal-dialog {
  position: center;
  background-color: hsla(114, 4%, 76%, 0.329);  
  z-index: 999;
  visibility: hidden;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s;
  &:target {
    visibility: visible;
    opacity: 1;
    pointer-events: auto;
  }
  & > div {
    width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 2em;
    background: white;
  }
  header {
    font-weight: bold;
  }
  h1 {
    font-size: 150%;
    margin: 0 0 15px;
  }
}

.modal-close {
  color: #000000;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
  &:hover {
    color: black;
  }
}
 
.modal-dialog {
  & > div {
    border-radius: 1rem;
    border: #1c3347 solid 1px;
  }
}

.modal-dialog div:not(:last-of-type) {
  margin-bottom: 15px;
}

.modal {
  display: none; 
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  height: 80%;  
  display: flex;
  flex-direction: row;
  position: relative; 
  overflow-y: auto;
}
 
.modal-text {
  width: 60%;
  overflow-y: auto; 
  max-height: 100%;  
  padding-right: 15px;   
}

.close {
  position: absolute; 
  top: 10px;  
  right: 10px;  
  font-size: 30px;
  font-weight: bold;
  color: #333;
  cursor: pointer;
  background: none;
  border: none;
}

.close:hover,
.close:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}

    </style>
    <body>
        
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand text-dark" href="#"><img src="https://i.pinimg.com/236x/1b/07/76/1b07760553cdf4984554d4f7f0113676.jpg" alt="" class="rounded-circle" style="height: 40px; width: 40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="btn btn-outline-secondary btn-sm" href="admn.php" style="margin-right: 1.5rem; border: #1c3347 solid .5px; color: #1c3347;" >Home</a>
                </li> <br>
                <li class="nav-item">

                <a href="#newApp" class="btn btn-outline-secondary btn-sm position-relative" style="margin-right: 1.5rem;">
                    App
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        
                    <?php 
                        include_once "db.php";
                        $today = date('Y-m-d');
                         $sql = "SELECT COUNT(*) As total, DAY(datetime) AS Day, MONTH(datetime) AS MONTH, YEAR(datetime) AS YEAR FROM applicant WHERE DATE_FORMAT(datetime, '%Y-%m-%d') = '$today' GROUP By Year, month, day";
                        $result = $conn->query($sql); 

                        if ($result->num_rows > 0) { 
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . ""; 
                        } 
 
                        ?>
                        <span class="visually-hidden"> </span>
                    </span> </a>
                    <!--<a class="btn btn-outline-secondary btn-sm" href="#" style="margin-right: 1.5rem; border: #1c3347 solid .5px; color: #1c3347;">Users</a>-->
                </li> <br>
                <li class="nav-item">
                <a href="#" class="btn btn-outline-secondary btn-sm position-relative" style="margin-right: 1.5rem" >    
                Feed
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?php
                        include_once "db.php";
                        $month = date('Y-m-d');
                        $sql = "SELECT COUNT(*) As total, DAY(datetime) As Day, MONTH(datetime) As Month, YEAR(datetime) As year FROM contact WHERE DATE_FORMAT(datetime, '%Y-%m-%d') = '$month' Group by Year, month, day";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo "" . $row['total'] . ""; 
                        }  
                        ?>

                        <span class="visually-hidden"></span>
                        </span>
                    </a>
                </li> <br>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary btn-sm" href="#" style="border: #1c3347 solid .5px; color: #1c3347;">Reports</a>
                </li> 
            </ul>
        </div>
    </nav>

<!--column-->
<div class="container px-4">
  <div class="row gx-5">
    <form action="admn2.php" method="POST">
      <h3 style="text-align: center;">Job Lists</h3>
      <div class="col">
        <?php
        include_once "db.php";
        $sql = "SELECT * FROM joboffer";
        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>  
          <div class="p-3 border bg-light">
            <p><?=$row["job_title"]?></p>
            <hr>
            <p class="mb-0">Job Type: <?=$row["job_type"]?></p>
            <p class="mb-0">Job Description: <?=$row["job_desc"]?></p>
            <p class="mb-0">Job Experience: <?=$row["experience"]?></p> 
            <p class="mb-0">Job Salary:<?=$row["salary"]?></p>

            <?php
            if (isset($alert)) {
              echo $alert;
            }
            ?>
 
            <input type="hidden" name="id" value="<?=$row['job_id']?>">

            <!-- The delete button should submit the form -->
            <button type="submit" class="btn btn-outline-secondary btn-sm" name="delete">Delete</button> 
            <a href="#list" class="btn btn-outline-secondary btn-sm">View</a>
          </div>
          <br>
        <?php
            $count++;
            }
        }
        ?> 
      </div>
    </form> 
  </div>
</div> 
<!--end column-->  

<!--Modaal--> 
  
<!--<div class="modal-dialog" id="list" style="align-items: center; justify-content: center;">
    <div style="border: #000000 solid .5px;">

    <form action="admn.php" method="POST">
    <a href="#" class="modal-close text-dark" title="close">x</a>
    <h3 style="text-align: center;">Job Requirement</h3>

    <?php
    if (isset($alert)) {
      echo $alert;
    }
    ?>
  <div class="col">
    <input type="text" class="form-control" placeholder="Job Title" name="jobtitle" value="" required >
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Job Type" name="jobtype" value="" required >
  </div> 
  <div class="mb-3">
    <textarea name="jobdesc" id="" class="form-control" placeholder="Job Description" rows="4" requied></textarea>
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Required Job Experience" name="jobexp" value="" required>
  </div> 
  <div class="col-md-4"> 
    <select id="inputState" class="form-select" name="gender" required >
      <option selected>Gender</option>
      <option>Male</option> 
      <option>Female</option>
    </select>
  </div>
  <div class="mb-3">
    <textarea name="educ_bck" id="" class="form-control" placeholder="Educational Background" rows="2" required></textarea>
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Salary" name="salary" value="" required>
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Benefits" name="benefits" value="" required>
  </div>
  
  <div class="mb-3">
    <button class="btn btn-outline-secondary" name="add" >Add Job</button></form> 
  </div>
</div>-->
<div class="modal-dialog" id="list" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1050;">
 <div class="row">
  <a href="#" class="modal-close text-dark">x</a>
  <p style="text-align: center;">Job Information</p>

  <div class="form-group"> 
    <?php
    include_once "db.php";
    if (isset($_SESSION['job_id'])) {
      $job_id = $_SESSION['job_id'];
      $sql = "SELECT * FROM joboffer As A Inner Join admin As B On A.admin_id = B.admin_id Where admin = 1 AND job_id = 'job_id' ";
      $result =  $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <p style="text-align: center; margin-top: .5rem;"><?=$row['job_title']?></p>
          <p style="margin-top: 1rem;"><?=$row['job_desc']?></p>
          <p style="margin-top: .5rem;"><?=$row['job_type']?></p>
          <p style="margin-top: .5rem;"><?=$row['educ_back']?></p>
          <p style="margin-top: .5rem;"><?=$row['expirence']?></p>
          <p style="margin-top: .5rem;"><?=$row['location']?></p>
          <p style="margin-top: .5rem;"><?=$row['salary']?><?=$row['benefits']?></p>
          <form action="admin2.php" method="POST">
            <?php
            if (isset($alert)) {
              echo $alert;
            }
            ?>
          </form>
          <?php
        }
      }
    }

    ?>
  </div>
 </div>
  </div>

<!--End Modaal-->
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    </body>
</html>