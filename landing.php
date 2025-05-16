<?php

require 'db.php';
if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'" );

  if(mysqli_num_rows($duplicate) > 0) {
    echo "<script> alert ('Email has already taken'); </script>";
  }
  else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO users VALUES('', '$firstname', $lastname', $email', '$password')";
      mysqli_query($conn, $query);
      echo "<scriot> alert('Peistration Successfull'); </scriot>";
    }
    else {
      echo "<script> alert('Email has already taken'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Landing Page</title>

  <!--Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Montserrat:wght@400;500&family=Prata&display=swap" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!--Font-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Boxicons-->
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  

  <link rel="stylesheet" href="LandingPage.css" />

</head>

<body>
<!--Navigation Bar-->
<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarSupportedContent" 
     aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
          role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <!--<nav class="my-navbar navbar navbar-expand-lg navbar-light p-0 mb-2 fixed-top">
    <div class="container1 container-fluid">
      <a class="navbar-brand ms- d-none d-sm-none d-md-block" href="#">
        <img src="images/logo.png" alt="site icon" width="" height="60">  &nbsp; &nbsp;  &nbsp; &nbsp;
        <label class="logo">Blissful Bali Massage Spa</label>
      </a> 

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
 

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav pe-2 ms-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link mb-2 fs-6" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mb-2 fs-6" href="#carousel-services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mb-2 fs-6" href="#aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mb-2 fs-6" href="#login-modal" data-bs-toggle="modal" data-bs-target="#login-modal">Log-in</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary btn-md fw-normal" href="#signup-modal" data-bs-toggle="modal" data-bs-target="#signup-modal" role="button" id="nav-btn">Book Appointment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->
</header>

<br/>
<!--MODAL-->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid" >
              <div class="row g-3"> 
                <div class="col-7 col-sm-6 "> 
                  <img src="images/ss.jpg"  width="100%" height="100%">
                </div>

                <div class="col-5 col-sm-6">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close" ></button>
                  </div>
                  <div class="top-text">
                    <form action=" " method="post">
                      <h2 class="modal-title pt-4 pb-3 text-center fw-bold" id="ModalCenter">Welcome!!!</h2>
                      <h4 class="text pb-4 pt-1 text-center"> Glad to see you again.</h4>
                  </div>
                  <br/>

                  <div class="form-group pl-5 pr-5">
                      <div class="form-element pb-3"> 
                        <input class="form-control" type="email" name="email"  placeholder="Input Email" required>
                      </div> 

                      <div class="form-element pb-3">
                        <input id="pass-placeholder" class="form-control" type="password" name="password"  placeholder="*******" required>

                      </div>
                  </div>
                  <div class="container">
                    <div class="row align-items-start">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="RememberCheckbox">
                          <label class="form-check-label fs-6" for="RememberCheckbox" id="checkboxlabel">
                            Remember
                          </label>
                        </div>
                      </div>
                      <div class="col">
                        <div id="forgot-password">
                          <a href="#" class="text-dark"><small>Forgot Password</small></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <div>
                  <button type="login" id="login-button-modal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="login"  >Log-in</button>
                  </div> <br/> <br/><br/>
                  <div class="bottom-part pt-1 pb-1 pr-1 pl-1">
                    <h6>Don't have an account? <a href="#signup-modal" data-bs-toggle="modal" data-bs-target="#signup-modal" class="text-white pl-5" >Sign Up for free</a></h6>
                  </div>
                </div>
              </div>
            </div>
         </div>
       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
            <div class="modal-body">
            <div class="container-fluid">
              <div class="row"> 
                <div class="col-7 col-sm-6"> 
                  <img src="images/ss.jpg"  width="100%" height="100%" border-radius="5px">
                </div>

                <div class="col-5 col-sm-6">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close" ></button>
                  </div>
                  <div class="top-text">
                    <form action="authentication.php" method="post">
                    <h2 class="modal-title text-white pt-4 pb-3 text-center" id="ModalCenter">Be Our Member</h2>
                    <p class="text-center">We'll look after you!</p>
                    <br>
                  </div>
                  <div class="form-group pl-5 pr-5">
                    <div class="form-element pb-3">
                      <input class="form-control" type="text" name="firstname"  placeholder="First Name" required>
                    </div>

                    <div class="form-element pb-3">
                      <input class="form-control" type="text" name="lastname"  placeholder="Last Name" required>
                    </div>

                    <div class="form-element pb-3">
                      <input class="form-control" type="email" name="email"  placeholder="Email" required>
                    </div>

                    <div class="form-element pb-3">
                      <input id="pass-placeholder" class="form-control" type="password" name="password"  placeholder="Password" required>
                    </div>

                    <div class="form-element pb-3">
                      <input id="pass-placeholder" class="form-control" type="password" name="cpassword"  placeholder="Confirm Password" required>
                    </div>

                    <div class="align-content-center">
                        <button type="submit" id="signup-button-modal" class="btn align-content-center mt-2 mb-2 pt-1 pb-1 pl-5 pr-5" name="submit" >Sign Up</button>
                        <a href="login-modal"></a>
                    </div>
                  </div>
        </form>
                  <div class="bottom-part pt-1 pb-1 pr-1 pl-1">
                          <h6>Already have an account? <a href="login-modal" data-bs-toggle="modal" data-bs-target="#login-modal" class="text-white pl-5" >Log-in</a></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>
</div>   
<!--end of modal-->


<!-- Content -->
<!--LANDING PAGE-->
<section id="first">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-sm-5">
              <br/>
              <br/>
              
              <p class="h6 text-white">THE BEST IN TOWN</p>
                <h1 class="display-4 text-white" style="font-family: 'Playfair Display', serif;">Revive. Retreat, Rejuvenate</h1>
                  <p class="lead fs-5 text-white">Celebrate your day with us. You can revive your day, retreat from struggles, and rejuvenate your life in our service. Treat yourself with a relaxing day. You deserve it.</p>
                  <br/>
                  <div class="row">
                    <p class="lead">
                    <a class="btn btn-primary btn-md fw-bold" href="#" role="button" id="jumbo-btn1" style="padding: 10px;">View Services</a> &nbsp &nbsp &nbsp

                    
                    <a class="btn btn-primary btn-md fw-bold"  href="#signup-modal" data-bs-toggle="modal" data-bs-target="#signup-modal" role="button" id="jumbo-btn2" style="padding: 10px;">Be A Member</a>
                    </p>
                  </div> 
            </div>
            <div class="col-md-7 d-sm-inline-block">
              <br/>
              <br/>
              <br/>
              <br/>
              
            </div>
          </div>
        </div>
    </div>
    <br/>
    <br/>
</section>
<!--SERVICES-->
<section class="colored-section1 d-flex justify-content-center" id="carousel-services">
  <div class="container">
    <h1 class="text-center">SERVICES</h1> <br/> 
    <div id="carouselExampleControls" class="carousel  slide d-none d-sm-block" data-bs-ride="carousel">
      <div class="carousel-inner">

          <div class="carousel-item active">
              <div class="cards-wrapper">
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Back Massage</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                      </div>
                  </div>
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Head Massage</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
                  <div class="card">
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Body Massage</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="carousel-item">
              <div class="cards-wrapper">
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Ventusa</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Warm Compress</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Cupping</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="carousel-item">
              <div class="cards-wrapper">
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Hot Stone</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg"  alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Foot Reflex</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
                  <div class="card" >
                      <div class="image-wrapper">
                          <img src="images/ventusa.jpg" alt="...">
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center">Ear Candle</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      </div>
                  </div>
              </div>
              
          </div>

          <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg"  alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Deep Tissue Massage</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg"  alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Trigger Points</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Kids Massage</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
            
          </div>

          <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg"  alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Pre-Natal Massage</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg"  alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Post-Natal Massage</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="card" >
                    <div class="image-wrapper">
                        <img src="images/ventusa.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Body Scrub</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
            
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <div id="carouselExampleControlsSmallScreen" class="carousel slide d-sm-none" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Back Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Head Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Body Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Ventusa</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Warm Compress</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Cupping</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Hot Stone</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Foot Reflex</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Ear Candle</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Deep Tissue Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Trigger Points</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Pre-Natal Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Post-Natal Massage</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card" >
              <div class="image-wrapper">
                  <img src="images/ventusa.jpg"  alt="...">
              </div>
              <div class="card-body">
                  <h5 class="card-title text-center">Body Scrub</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
          </div>
        </div>
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsSmallScreen" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsSmallScreen" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <hr>
</section>
<!--end of services-->
<!--PHILOSOPHY-->
<section class="colored-section2 d-flex justify-content-center" id="our philosophy">
  <div class="container">
    <div class="row "><br/> <br/>
      <div class="col-md-6 .d-none .d-sm-none d-md-block .d-xl-none .d-xxl-none">
          <img src="images/vio.jpg" style="height: 550px; width:500px" >
      </div>
      <div class="col-md-6"><br/><br/>
        <h3>Home Service</h3><br/>
        <p>Aside from our physical location, we also offer our valuable services in the comfort of your own home.
           In Blissful Bali Massage, we will serve you with our utmost sincerity to achieve the relaxation you 
           deserve even on your own home. 
        </p><br/><br/>
        
        <h3>What We Use</h3><br/>
        <p>We use different kind of tools such as Foot Reflex Stick, Ear Candle, Cups for ventusa and cupping theraphy. Aromatic oils for more relaxing environment. Lavender oil, Peppermint and Tea tree oil are the most favorite.
          Stones are also highly in demand due to it's healing capabilities. Lepidolite is our most used stone for our hotstone massage. 
        </p><br/><br/>
      </div>
    </div>
  </div>
</section>
<!--End of Philosophy-->
<!--ABOUT US-->
<section class="colored-section3 d-flex justify-content-center" id="aboutus">
  <div class="container-fluid" id="aboutus-container">
    <div class="row "> 
      <div  class="col-md-6">
              <br/>
              <h1 class="text-white fw-normal">ABOUT US</h1> <br/>
              <p class="text-white fs-6" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      <div class="col-md-6">
          <img src="images/iris2.png" width="100%" height="90%">
      </div>
    </div>
  </div>
</section>
<!--end of about us-->
<!--Goals Mission Vission-->
<section class="colored-section4 d-flex justify-content-center " id="GoalsMissionVission">
    <br/><br/>
    <div class="container-fluid" id="gmscontainer"><br/><br/>
        <div class="row g-3 gy-2">
          <div class=" col-sm-4 gy-3">
            <div class="card  h-100 d-flex p-4 flex-column align-items-center" style="width: 20rem;" >
              <div class="card-body">
                <div class="image-wrapper">
                  <img src="images/iris1.png"  alt="...">
                </div><br/>
                <h1 class="card-title fs-5 text-center">Relax</h1>
                <p class="card-text">Give yoursefl a break. Put your mind at ease. Where the mind goes, the body follows. Let things flow the way the need to. You'll get there. Somehow. </p>
              </div>
            </div>
          </div>
          <div class=" col-sm-4 gy-3 ">
            <div class="card h-100 d-flex p-4 flex-column align-items-center" style="width: 20rem;" >
              <div class="card-body">
                <div class="image-wrapper">
                  <img src="images/iris5.png"  alt="...">
                </div><br/>
                <h1 class="card-title fs-5 text-center">Live</h1>
                <p class="card-text">Live like you never live before. Live like flowers on the field. Stop the worries, rejuvenates your thoughts and start to live your life in tranquility. Live with us.</p>
              </div>
            </div>
          </div>
          <div class=" col-sm-4 gy-3">
            <div class="card  h-100 d-flex p-4 flex-column align-items-center" style="width: 20rem;" >
              <div class="card-body">
                <div class="image-wrapper">
                  <img src="images/iris3.png"  alt="...">
                </div><br/>
                <h1 class="card-title fs-5 text-center">Grow</h1>
                <p class="card-text">Grow as you are planted. Just like plants, care for yourself is the foundation of strong roots. It is the beauty of live. Always choose to experience it.</p>
              </div>
            </div>
        </div>
    </div>
    <br/><br/>
</section>
<!--End content-->



<!-- Footer -->
<footer class="text white pt-5 pb-4">
  <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">
         
              <h3 class=" mb-4 fw-bold text-white" id="footerh5">Blissful Bali Massage Spa</h3>
     
      </div>
      <div class="row text-center text-md-left">
        
            <p class="text-white text-center">
              <i class='bx bxs-home-smile'></i> 2F Andrea, Bldg. #43 P. Gomez St. Batangas City. Batangas
            </p>
            <p class="text-white  text-center">
              <i class='bx bxs-phone-call'></i> 09690481276/ 09163318162
            </p>
            <p  class="text-white  text-center">
              <i class='bx bxl-gmail' ></i> 09690481276/ 09163318162
            </p>
            <p class="text-white  text-center">
              <i class='bx bxl-facebook-circle' ></i> @blissfulbalibatangas
            </p>
    </div>
    <div class="row">  
      <div class="col-md-12 copy">  
      <p class="text-center text-white" style="color: black;"> © Copyright 2022: </p>  
      </div>  
    </div>
  </div>
</footer>

<!-- Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>

</html>