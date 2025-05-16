<?php
include "db.php";
if (isset($_POST['submit'])) { 
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`, `email`, `phonenumber`, `message`) Values ('$name', '$email', '$phonenumber', '$message')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        $alert = '<div class="alert success">
        <strong> Saved successfully! </strong></div>';
    }
    else {
        $alert = '<div class="alert failed">
        <strong> Failed to saved. </strong></div>';
    }
}
?>

<?php
include "db.php";
if (isset($_POST['ok'])) { 
    $job_id = $_POST['job_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $file = $_POST['file']; //undefined
    $self_desc = $_POST['self_desc'];  
    $sql = "INSERT INTO `applicant` (`job_id`, `firstname`, `lastname`, `age`, `phonenumber`, `email`, `file`, `self_desc`, `status`) 
    Values ('$job_id', '$firstname', '$lastname', '$age', '$phonenumber', '$email', '$file', '$self_desc', 'applicant')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        $alert = '<div class="alert success">
        <strong>Your applicant has been submitted.</strong></div>';
    } else {
        $alert = '<div class="alert failed">
        <strong>Opps! Your applicant has not been submitted.</strong></div>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <!--logo--> 
    <link rel="icon" href="data:image/png;base64,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">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!--CSS-->
    <link rel="stylesheet" href="job.css">
</head> 

<style> 
.card {
    border-radius: 20px;
    padding: 15px;
    color: white;
} 
.hiring-tag {
    background-color: #1c3347;
    border-radius: 50%;
    color: #333;
    padding: 10px 20px;
    font-weight: bold;
    font-size: 16px;
    position: absolute;
    right: -10px;
    top: -10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
<body>

<!--need to change navbar-->
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
 
          <ul class="menu-items" >
              <li class="nav-item">
                  <a class="nav-link" href="LP.php" style="font-family: 'Poppins', Sans serif; color: #1c3347;">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="Product.php" style="font-family: 'Poppins', Sans serif; color: #1c3347;">Product</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="Job.php" style="font-family: 'Poppins', Sans serif; color: #1c3347">Job</a>
              </li>
              <li class="nav-item">
                <a href="#getintouch" class="nav-link" style="font-family: 'Poppins', Sans serif; color: #1c3347">Contact</a>
              </li>
          </ul> 
      </div>
    </nav>

<!-- Contact Modal --> 
<div class="modal-window" id="contact">
    <div>
        <form action="Job.php" method="post" >
        <a href="#" class="modal-close text-dark" title="close">X</a>
        <h4 style="text-align: center;">Contact Us</h4>
            <?php
        if (isset($alert)) {
            echo $alert;
        }
        ?>
        <div class="col">   
            <input type="text" class="form-control" placeholder="Name" value="" name="name" required>
        </div> 

        <div class="col"> 
            <input type="text" class="form-control border rounded"  placeholder="Phonenumber" value="" name="phonenumber" required>
        </div>

        <div class="col"> 
            <input type="email" class="form-control border rounded" placeholder="Email" value="" name="email" requuiured>
        </div>

        <div class="mb-3"> 
            <textarea class="form-control border rounded" id="exampleFormControlTextarea1"  placeholder="Message" name="message" required></textarea>
        </div>

        <div class="mb-3">
            <!--<a href="#" class="btn-outline-light btn-outline-light-secondary text-dark" style="margin-left: 12rem;">Submit</a>-->
            <button type="submit" class="btn btn-outline-light" aria-pressed="true" name="submit" id="contact-submit" style="width: 150px; height: 45px; border: #1c3347 .5px solid; outline: none; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; -ms-border-radius: 50px;
            -o-border-radius: 50px;  cursor: pointer; margin-top: .5rem; font-size: .7rem; background-color: var(--button); color: var(--white); box-shadow: 0px 12px 12px 0px rgba(0, 0, 0, .15);
            transition: all .3s ease; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; margin-left: 11rem">Submit</button></form>
        </div>
    </div>
</div>  
<!-- Contact Modal End --> 
 
<!--<header class="py-5" style="background-image: url('https://i.pinimg.com/736x/bf/59/d6/bf59d663df3fc56367557f472cebad75.jpg');">
    <div class="container text-center">
        <h1 class="fw-fold">Fuji Industries Manila Corporations</h1>
        <p class="text-muted">We`re manufacturing high-quality rubber products for automobiles, motor scooters and appliances.</p>
        <div style="display: flex; justify-content: center;">
            <a href="#" class="btn btn-outline-secondary btn-sm" role="button" style="border: #1c3347 .5px solid; background-color: white; border-radius: 15px;">Know more</a>
        </div>
    </div>
</header>-->
 
<section class="main-section container-fluid" style="font-family: 'Poppins', sans-serif;">
  <div class="row d-flex align-items-center">
    <div class="col-md-6 d-flex flex-column justify-content-center" style="min-height: 100%;">
      <h1 class="display-4 fw-bold">Fuji Industries Manila Corporations</h1>
      <p class="lead">Manufacturing high-quality rubber products for automobiles, motor scooters and appliances.</p>
      <div style="display: flex; justify-content: center;">
        <a href="#" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 .5px solid; background-color: white; border-radius: 15px;">More Info</a>
      </div>
      </div>
    <div class="col-md-6 text-center">
      <img src="https://i.pinimg.com/736x/aa/65/0d/aa650d9bd2a1071ec7afe45979379f12.jpg" alt="" class="main-img" style="max-width: 100%; height: auto;">
    </div>
  </div>
</section> 

<section class="py-5">
    <div class="container" style="font-family: 'Poppins', Sans-serif;">
        <div class="row g-4 text-center">
            <?php
            include_once 'db.php';
            $sql = "SELECT * FROM jobOffer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?> 
                    <div class="col-md-4">
                        <div class="icon-box">
                            <div class="card" style="box-shadow: 5px 0px 10px 0px #aaa;">   
                                <div class="hiring-tag"></div>
                                <div class="image-wrapper">
                                    <img src="" alt="">
                                </div>
                                <h5 style="color: #1c3347;"><?= htmlspecialchars($row['job_title']) ?></h5>
                                <p style="color:rgba(28, 51, 71, 0.8)"><?= htmlspecialchars($row['job_desc']) ?></p>
                                <p style="color: rgba(28, 51, 71, 0.8)"><i class="fa fa-solid fa-clock" style="color: #1c3347;"></i> <?= htmlspecialchars($row['job_type'])?></p>
                                <p style="color: rgba(28, 51, 71, 0.8)"><i class="fa fa-solid fa-location-pin" style="color: #1c3347;"></i> <?= htmlspecialchars($row['location'])?></p>
                                <p style="color: rgba(28, 51, 71, 0.8)"><?= htmlspecialchars($row['educ_back'])?></p>
                                <p style="color: rgba(28, 51, 71, 0.8)"><?= htmlspecialchars($row['description'])?></p>
                                <div style="display: flex; justify-content: center"> 
                                    <a href="#jobinfo" 
                                        class="btn btn-outline-secondary btn-sm text-dark app-btn" 
                                        data-job-id="<?= $row['job_id'] ?>" 
                                        style="border: #1c3347 .5px solid; background-color: white; border-radius: 15px;">
                                        Apply now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </div>
</section>

<!-- Job Modal --> 
<div class="modal-window" id="jobinfo">
    <div>
        <a href="#" class="modal-close text-dark" title="close">x</a>
        <div id="job-info-content"> 
        </div>
    </div>
</div>

<div class="container mt-5" style="display: flex; justify-content: center;">
     <div class="row">
        <div class="col-md-4 mb-4" > 
            <div class="img-fluid rounded shadow stry-img"></div>
            <p class="mt-2 text-center" style="font-family: 'Poppins', Sans serif">Coming soon</p>
        </div>
 
        <div class="col-md-4 mb-4"> 
          <div class="img-fluid rounded shadow stry-img"></div>
            <p class="mt-2 text-center" style="font-family: 'Poppins', Sans serif;">Coming Soon</p>
        </div>

        <div class="col-md-4 mb-4"> 
          <div class="img-fluid rounded shadow stry-img"></div>
            <p class="mt-2 text-center" style="font-family: 'Poppins', Sans serif;">Coming Soon</p>
        </div>
 
        <div class="col-md-4 mb-4"> 
          <div class="img-fluid rounded shadow stry-img"></div>
            <p class="mt-2 text-center" style="font-family: 'Poppins', Sans serif;">Coming Soon</p>
        </div>
    </div> 

</div>

    <!--<div style="display: flex; justify-content: center;">
        <?php
        $sql = "SELECT * FROM jobOffer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                if ($counter % 3 == 0) {
                    if ($counter > 0) echo '</div></div>'; 
                    echo '<div class="carousel-item' . ($counter == 0 ? ' active' : '') . '"><div class="d-flex justify-content-center gap-3">';
                }
                ?>
                <div class="card" style="width: 18rem; position: relative; border: #1c3347 .5px solid;">
                    <img src="https://i.pinimg.com/736x/aa/65/0d/aa650d9bd2a1071ec7afe45979379f12.jpg" class="card-img-top rounded" alt="">
                    <div class="hiring-tag">Hiring<br><s></s></div>
                    <div class="card-body">
                        <h6 class="text-dark text-center"><?= htmlspecialchars($row['job_title'])?></h6> 
                        <p class="card-text text-dark text-center"><?= htmlspecialchars($row['job_desc'])?></p>
                        <div style="display: flex; justify-content: center;">
                            <a href="" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 .5px solid; background-color: white; border-radius: 15px;">Apply now</a>
                        </div>
                    </div>
                </div>
                <?php
                $counter++;
                }
                echo '</div></div>';
            }
            ?>
            </div>-->

    <!---->
    <section class="colored-section2 d-flex justify-content-center" id="missionvision" style="shadow: 0 0 20px rgba(0, 0, 0, 0.1); background-size: cover; background-position: center; padding: 50px 0;">
  <div class="container" style="font-family: 'Poppins', Sans serif;">
    <div class="row">
      <div class="col-md-6">
        <h3>We`re hiring</h3> 
        <p><small>To manufacture high-quality rubber products for automobiles, motor scooters, and apliances, ensuring customer satisfation through innovation and excellence</small></p> 
      </div>
      <div class="col-md-6 .d-none .d-sm-none d-md-block .d-xl-none .d-xxl-none" >
          <img src="https://i.pinimg.com/736x/aa/65/0d/aa650d9bd2a1071ec7afe45979379f12.jpg" style="height: 350px; width: 300px; border-bottom-left-radius: 150px; border-bottom-right-radius: 150px;" >
      </div>
    </div>
  </div> 
</section> 
   
<!--Modal-->
<div class="modal-window" id="app">
    <div>
        <form action="Job.php" method="post" id="applicationForm">
            <a href="#" class="modal-close text-dark" title="close" id="closeModal">X</a>
            <h4 style="text-align: center;">Application Form</h4>
            <hr>
            
            <?php
            if (isset($alert)) {
                echo $alert;
            }
            ?>

            <div class="form-group">   
                <input type="text" class="form-control border rounded" placeholder="Firstname" value="" name="firstname" required>
            </div>

            <div class="form-group"> 
                <input type="text" class="form-control border rounded" placeholder="Lastname" value="" name="lastname" required>
            </div>

            <div class="mb-3"> 
                <input type="text" class="form-control border rounded" placeholder="Age" value="" name="age" required>            
            </div>

            <div class="mb-3">
                <input type="text" class="form-control border rounded" placeholder="Phonenumber" value="" name="phonenumber" required>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control border rounded" placeholder="Email" value="" name="email" required>            
            </div> 

            <div class="mb-3">
                <textarea name="desc" id="" placeholder="Description" rows="3" class="form-control border rounded" required></textarea>
            </div>

            <div class="mb-3">
                <input type="file" class="form-control border rounded" placeholder="Attached file" value="" name="file" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-outline-light" aria-pressed="true" name="sbmt" id="contact-submit" style="width: 150px; height: 45px; border: none; outline: none; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; -ms-border-radius: 50px; -o-border-radius: 50px; cursor: pointer; margin-top: .5rem; font-size: .7rem; background-color: var(--button); color: var(--white); box-shadow: 0px 12px 12px 0px rgba(0, 0, 0, .15); transition: all .3s ease; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; margin-left: 11rem">Submit</button>
            </form>
        </div>
    </div>

    <script> 
        const closeModal = document.getElementById('closeModal');
        const form = document.getElementById('applicationForm');
 
        closeModal.addEventListener('click', function() {
            form.reset();  
        });
    </script>
</div>

<!--End Modal-->
 
<!--End Job Additional-->
  
    <!-- Footer Start -->
    <footer class="bg-light text-center text-lg-start" style="margin-top: 2rem;">
      <div class="row g-3">
        <div class="col">
          <img src="data:image/png;base64,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"
          style="height: 50px; width: 50px;"> 
        </div>

        <div class="col">
          <div class="row g-3">
            <div class="col">  
              <a href="#" style="color: #1c3347; font-family: 'Poppins', Sans serif;"><small>Home</small></a>
            </div>
            <div class="col">  
              <a href="#" style="color: #1c3347; font-family: 'Poppins', Sans serif;"><small>Product</small></a>
            </div>
            <div class="col">  
              <a href="#" style="color: #1c3347; font-family: 'Poppins', Sans serif;"><small>Job</small></a>
            </div>

            <p style="color:rgb(56, 56, 56); font-size: 11px; font-family: 'Poppins', Sans serif;">© 2025 Fuji Industries Manila Corporations. <i class="fa fa-regular fa-heart"></i></p> 
          </div>
        </div>

        <div class="col">
          <div class="row g-3">
            <p style="color: #1c3347; font-family: 'Poppins', Sans serif;"><small>Follow Us</small></p>
 
            <div class="col">  
            <a href=""><i class="fab fa-brands fa-facebook" style="color: #1c3347; margin-left: .2rem;"></i></a>
            <a href=""><i class="fab fa-brands fa-instagram" style="color: #1c3347; margin-left: .2rem;"></i></a>
            <a href=""><i class="fa fa-regular fa-envelope" style="color: #1c3347; margin-left: .2rem;"></i></a>
            </div> 
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->
       
</body>

<script>
$(document).ready(function () {
    $('.app-btn').on('click', function (e) {
        e.preventDefault(); 
        const jobId = $(this).data('job-id');

        $.ajax({
            url: 'get_job.php',
            type: 'POST',
            data: { job_id: jobId },
            success: function (response) {
                $('#job-info-content').html(response);
                //$('#info').fadeIn();
                window.location.hash = 'jobinfo';
            },
            error: function () {
                $('#job-info-content').html('<p>Error loading job details.</p>');
            }
        });
    });

    $('#modal-close').on('click', function () {
        $('#info').fadeOut();
    });
});
</script>

 
</html>