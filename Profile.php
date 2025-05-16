<?php
  include "connection.php";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `contact`(`name`, `email`, `phone_number`, `address`, `message`) VALUES ('$name', '$email', '$phonenumber', '$address', '$message')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
    $alert = '<div class="alert success">
      <strong>Hey!</strong> Your Contact Form has been submitted.
    </div>';
  } else {
    $alert = '<div class="alert failed">
      <strong>Oops!</strong> Your Contact Form has not been submitted.
    </div>';

}
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 

    <!--logo-->
    <link rel="icon" href="data:image/png;base64,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">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="animations.css">

    <style>
        .card {
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 16px;
        } 
        .company-profile {
            padding: 5px;
            text-align: center;
        }
        .company-profile__title {
            font-size: 32px;
            margin-bottom: 5px;
        }
        .company-profile__text {
            font-size: 16px;
            line-height: 1.5;
        }
        .section-title {
            font-size: 28px;
            margin-top: 40px;
            margin-bottom: 5px;
        }
        .contact-info {
            font-size: 16px;
            line-height: 1.5;
        }
        #map {
            height: 400px;
            width: 100%;
            margin-top: 5px;
        }
        .banner__overlay
        { position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner__text{
            color: #1c3347;
            text-align: center;
        }

        .banner__title{
            font-size: 2rem;
        }
        .banner{
            height: 50vh;
            position: relative;
            background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjkgMTI5IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMjkgMTI5IiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KICA8Zz4KICAgIDxwYXRoIGQ9Im0xMjEuMywzNC42Yy0xLjYtMS42LTQuMi0xLjYtNS44LDBsLTUxLDUxLjEtNTEuMS01MS4xYy0xLjYtMS42LTQuMi0xLjYtNS44LDAtMS42LDEuNi0xLjYsNC4yIDAsNS44bDUzLjksNTMuOWMwLjgsMC44IDEuOCwxLjIgMi45LDEuMiAxLDAgMi4xLTAuNCAyLjktMS4ybDUzLjktNTMuOWMxLjctMS42IDEuNy00LjIgMC4xLTUuOHoiIGZpbGw9IiNGRkZGRkYiLz4KICA8L2c+Cjwvc3ZnPgo=);
        }

        /* --Navbar --*/
        .navbar-minimal .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #333;
    background-color: transparent;
  }
  .navbar-minimal .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-minimal .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-minimal .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #555;
    background-color: #e7e7e7;
  }
  .navbar-minimal .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-minimal .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-minimal .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #ccc;
    background-color: transparent;
  } 
.navbar-minimal .navbar-link {
  color: #777;
}
.navbar-minimal .navbar-link:hover {
  color: #333;
}
.navbar-minimal .btn-link {
  color: #777;
}
.navbar-minimal .btn-link:hover,
.navbar-minimal .btn-link:focus {
  color: #333;
}
.navbar-minimal .btn-link[disabled]:hover,
fieldset[disabled] .navbar-minimal .btn-link:hover,
.navbar-minimal .btn-link[disabled]:focus,
fieldset[disabled] .navbar-minimal .btn-link:focus {
  color: #ccc;
} 

    </style>
    
</head>
<body>
 
    <!--<div class="banner">
        <div class="banner__overlay">
            <div class="banner__text">
                <h1 class="banner__title">Company Profile</h1> 
            </div>
        </div>
    </div>-->  
    <br>  
    <nav class="navbar navbar-minimal navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Fuji Industries Manila Corp.</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="LP.php" style="color: #1c3347;">Home</a></li>
                    <li><a href="Profile.php">Profile</a></li>
                    <li><a href="Product.php">Product</a></li>
                    <li><a href="Job.php">Job Offer</a></li>
                    <li><a href="#contactus">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-banner position-relative overflow-hidden">
        <div class="container">
          <div class="row d-flex flex-wrap align-items-center">
              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="position-relative left-hero-color">
                
                <!--Animate--> 
                <h4 data-aos="zoom-in-up" style="font-family: Railway;">Welcome to</h4>
                <h2 data-aos="zoom-in-up" style="font-family: Railway;">Fuji Industries Manila Corp</h2>
                <a href="#values" class="btn btn-secondary btn-hover-secondery">Read More</a>
              </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="position-relative right-hero-color">
                <img src="https://i.pinimg.com/236x/d3/1d/30/d31d30eb13094fa2f88ea481a2215c8d.jpg" class="img-fluid" 
                data-aos="fade-left" data-aos-duration="700" style="border-top-left-radius: 300px; border-top-right-radius: 300px; border: solid 1px gray; height: 40%; width: 50%; margin-left: 6rem;">
              </div> 
            </div>
          </div>
        </div>
      </section> 
  
    <!--<div class="container">
        <div class="company-profile">
            <h1 class="company-profile__title">Fuji Industries Manila Corporation</h1>
            <p class="company-profile__text">Fuji Industries Manila Corporation is dedicated to manufacturing high-quality rubber products for automobiles, motor scooters, and appliances. 
                Our commitment to innovation and excellence ensures customer satisfaction and drives our continuous improvement.</p>
        </div>-->
 
        <section class="justify content-center-center" style="background-color: #d6e6f5;" >
            <br>
            <div class="row">
                <div class="col-md-6-sm-4-center">
                    <h1 class="text-center">Fuji Industries Manila Corporations</h1>
                    <h5 class="text-center fs-4">Fuji Industries Manila Corporation is dedicated to manufacturing high-quality rubber products for automobiles, motor scooters and appliances. Our commitment to innovation and excellence ensures customer satisfaction and drives our continuous improvement.
                    </h5>
                </div>
            </div>
            <br>
        </section> 

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Our Mission</h3>
                        <p class="card-text">To manufacture high-quality rubber products for automobiles, motor scooters, and appliances, ensuring customer satisfaction through innovation and excellence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Our Vision</h3>
                        <p class="card-text">To be a global leader in the rubber manufacturing industry, recognized for our commitment to quality, sustainability, and continuous improvement.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="company-profile">
            <h2 class="section-title">Our History</h2>
            <p class="company-profile__text">Founded in 1985, Fuji Industries Manila Corporation has grown from a small manufacturing unit to a leading player in the rubber products industry. Over the years, we have expanded our product range and improved our processes to meet the evolving needs of our customers.</p>
        </div>

    <div class="card">
        <div class="company-profile" id="values">
            <h2 class="section-title">Core Values</h2>
            <p class="company-profile__text">Our core values are the foundation of our success. We believe in:</p>
            <ul class="company-profile__text">
                <li>Integrity: We conduct our business with honesty and transparency.</li>
                <li>Quality: We are committed to delivering products that meet the highest standards.</li>
                <li>Innovation: We continuously seek new ways to improve our products and processes.</li>
                <li>Customer Focus: We prioritize the needs of our customers in everything we do.</li>
                <li>Sustainability: We strive to minimize our environmental impact and promote sustainable practices.</li>
            </ul>
        </div>
    </div>

        <div class="company-profile">
            <h2 class="section-title">Contact Information</h2>
            <p class="contact-info">
                <strong>Address:</strong> Lot 15, Phase 1A, First Philippine Industrial Park, Barangay Sta. Anastacia Sto. Tomas, Batangas, 4234 Philippines<br>
                <strong>Phone:</strong> +63<br>
                <strong>Email:</strong> fm@fuji-inds-m.com<br> 
            </p>
        </div>

<!--Rounded images-->
<div class="row" style="margin-left: 5rem; margin-right: 5rem">
    <h3 class="section-title">People behind</h3>
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" style="margin: 10px; height: auto; width: 100;" class="rounded-circle">
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" class="rounded-circle" style="margin: 10px; height: auto; width: 100;">
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" style="margin: 10px; height: auto; width: 100;" class="rounded-circle">
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" class="rounded-circle" style="margin: 10px; height: auto; width: 100;">  
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" style="margin: 10px; height: auto; width: 100;" class="rounded-circle">
    <img src="https://i.pinimg.com/236x/5d/a1/01/5da101adae27f429e93d1b6da8520914.jpg" alt="" class="rounded-circle" style="margin: 10px; height: auto; width: 100;">      
</div> 
<!--End Rounded images-->

        <div class="company-profile">
            <h2 class="section-title">Our Location</h2>
            <!--<div id="map"></div>-->
            <div class="embed-map-responsive">
                <div class="embed-map-container">
                    <iframe class="embed-map-frame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&height=400&hl=en&q=Fuji%20Industries%20Manila%20Corporation&t=&z=14&ie=UTF8&iwloc=B&output=embed"></iframe><a href="https://sprunkiretake.net" style="font-size:2px!important;color:gray!important;position:absolute;bottom:0;left:0;z-index:1;max-height:1px;overflow:hidden">sprunki retake</a></div><style>.embed-map-responsive{position:relative;text-align:right;width:100%;height:0;padding-bottom:66.66666666666666%;}.embed-map-container{overflow:hidden;background:none!important;width:100%;height:100%;position:absolute;top:0;left:0;}.embed-map-frame{width:100%!important;height:100%!important;position:absolute;top:0;left:0;}</style></div>
        </div>
    </div>

<!--Modal-->
    <div class="modal-window" id="contactform">
        <div class="row">
            <a href="#" class="btn btn-outline-secondary" style="width: 2%; height: auto; text-align: center; margin-left: 17rem;">x</a>
            <h3>Contact us</h3>
            <hr>

            <?php

            if (isset($alert)) {
            echo $alert;
          }

          ?>
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" required>
            </div>
            <div class="mb-3" >
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phonenumber" name="Phonenumber" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email" required>
            </div> 
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="msg" required></textarea>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Attachment" name="attachment"> 
            </div>
            <a href="#" class="btn btn-outline-secondary" style="width: 30%; height: auto; text-align: center; margin-left: 7rem; border-radius: 10px;">Submit</a>

        </div>
    </div>
<!--End Modal-->


<!--Footer-->

<footer class="footer">
    <div class="footer-left col-md-4 col-sm-6">
        <p class="about" style="color: black;"><span style="color: black;">About the Company</span>
            Manufacturing rubber products for automobiles, motor scooters and appliances.</p>
        <div class="icons">
            <a href="#"><i class="fab fa-facebook fa-2x" style="color: #1c3347;"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x" style="color: #1c3347;"></i></a>
            <a href="#"><i class="fab fa-envelope fa-2x" style="color: #1c3347;"></i></a>
        </div>
    </div>

    <div class="footer-center col-md-4 col-sm-6">
        <div>
            <i class="fa fa-map-marker" style="color: #1c3347;"></i>
            <p style="color: black;"><span style="color: black;"></span><small>Sto. Tomas Batangas</small></p>
        </div>

        <div>
            <i class="fa fa-phone" style="color: #1c3347;"></i>
            <p style="color: black;"><span style="color: black;"></span><small>(+000)</small></p>
        </div>

        <div>
            <i class="fa fa-envelope fa-2x" style="color: #1c3347;"></i>
            <p style="color: black;"><span style="color: black;"></span><small>@</small></p>
        </div>
    </div>

    <div class="footer-right col-md-4 col-sm-6">
        <h2 style="font-size: 20px; color: black;">Fuji Industries Manila Corp.</h2>
        <p class="menu" style="font-size: 15px;">
            <a href="Home.html" style="color: black;"> Home |</a>
            <a href="Product.html" style="color: black;"> Product |</a>
            <a href="Job2.html" style="color: black;"> Job Offers |</a> 
            <a href="#contact" style="color: black;"> Contact Us</a>
        </p>
        <br>
        <p class="name" style="color: #1c3347;">Fuji Industries Manila &copy; 2024</p>
    </div>
 </footer>
<!--End Footer-->

    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function initMap() {
            var location = {lat: 14.1085, lng: 121.1381};  
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>-->
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
 
</body>
</html>