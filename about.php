<?php
  include "db.php";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];    
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `information`(`name`, `email`, `phonenumber`, `address`, `message`) VALUES ('$name', '$email', '$phonenumber', '$address', '$message')";
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>AboutPage</title>

  <!--Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Montserrat:wght@400;500&family=Prata&display=swap" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!--Font-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Boxicons-->
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
  

  <link rel="stylesheet" href="About.css" />

</head>

<body>
<!--Navigation Bar-->
<header>
  <nav class="my-navbar navbar navbar-expand-lg navbar-light p-0 mb-2 fixed-top">
    <div class="container1 container-fluid">
      <a class="navbar-brand ms- d-none d-sm-none d-md-block" href="#">
        <img src="images/logo.png" alt="site icon" width="" height="60">  &nbsp; &nbsp;  &nbsp; &nbsp;
        <label class="logo">Blissful Bali Massage Spa</label>
      </a>

      <!--Navigation Buttons-->

      <div class="nav-buttons order-lg-2">
        <div class="dropdown">
          <button type="button" class="btn position-relative dropdown-toggle text-dark" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-expanded="false" href='#'>
            <img src="images/profile.jpg" class="rounded-circle" height="40" width="sha384" />
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-xs-start" 
          aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">
                <table>
                  <tr id="user-top" class="tb-items">
                    <td class="user-icon pl-2 pr-1">
                      <img src="images/profile.jpg" alt="Account" height="50" width="50">
                    </td>
                    <td>
                    <td class="user-top pl-3 pr-1">
                      <h5 class="text mt-2">Iris Cagbabanua</h5>
                      <small class="text mt-1">@irisreyes</small><br/>
                      <small class="text mt-1">Account Settings</small>


                    </td>
                    </td>
                  </tr>
                </table>
              </a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><button class="dropdown-item ml-1 mr-1"><a href="LandingPage.php" id="logout-button"
                  class="btn pt-1 pb-1 ml-5 mr-5 text-white">Logout</a></button></li>
            <!--change href link to landing page-->
          </ul>
        </div>
      </div>
      <!--Toggle Buttons-->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--NavBar Menu-->

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav pe-2 ms-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link mb-2 fs-6" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mb-2 fs-6" href="treat2.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  mb-2 fs-6" href="Gallery.php">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active mb-2 fs-6" href="#">About Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<br/>
<br/>
<br/>
<!--Top-->
<section class="colored-section1 d-flex justify-content-center" >
    <div class="container" id="cont">
        <div class="row">
          <div class="col-6 col-sm-6 d-none d-sm-block"> 
            <div class="card h-100 d-flex p-4 flex-column align-items-end" style="width: 20rem;" id="cardtop"><br/>
                <div class="card-body"><br/>
                  <h4 class="card-title  text-center">The Franchise</h4><br/>
                  <p class="card-text  fs-6">"The Main Branch is from Blissful Bali Muntinlupa, it became famous for its therapeutic services we decided to invest, 
                    fanchise and establish the business. We started from 5 employees. The business is growing and now, the number of employees we have doubled.
                    We are offering diverse therapeutic massage and services and this diversity allows us to grow"
                  </p><br/>
                </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 justify-content-center text-white"><br/>
            <div class="card h-100 d-flex p-4 flex-column align-items-center" style="width: 20rem;" id="cardtop1">
              <div class="card-body"><br/><br/>
                <h4 class="card-title text-black text-center">Blissful Bali Massage Theraphy</h4><br/>
                <p class="card-text  fs-6">Bali Spa-Batangas is a provision that is composed of well-skilled therapists and
                    aims to help you relax and ease your burden for a period of time. Our spa uses unique massage technique that revives, retreats, and refreshes your body for a healthier and younger feeling.
                </p><br/>
              </div>
          </div>
        </div>
    </div>
</section>
<!--endtop-->
<!--SERVICES-->
  <section class="colored-section3 d-flex justify-content-center" id="carousel-services">
    <hr>
    <div class="container"><br/><br/>
      <h1 class="text-center">Tools</h1> <br/> 
      <div id="carouselExampleControls" class="carousel  slide d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
  
            <div class="carousel-item active">
                <div class="cards-wrapper">
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/reflex.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Foot Reflex Stick</h5>
                            <p class="card-text">The stick is a way to use more pressure with less effort.</p>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/ear.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Ear Candle</h5>
                            <p class="card-text">Involves placing a lit, hollow candle in ear as a way to remove earwax.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                            <img src="images/vent.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Ventusa Glasses</h5>
                            <p class="card-text">It has a deep body in the form of an elongated ovoid, with a narrower mouth, neatly demarcated from the body, with a rim in a thin enough to hold. </p>
                        </div>
                    </div>
                </div>
            </div>
  
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/cupping.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Cupping Glasses</h5>
                            <p class="card-text "> A glass vessel from which air can be removed by suction or heat to create a partial</p>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/hot stone.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Hot Stone</h5>
                            <p class="card-text ">Massage therapists place stones, warmed to the proper heat, on specific parts of the body where they illicit calm and loosen up muscles for subsequent bodywork.</p>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/sodalite.jpeg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Lepidote Stone</h5>
                            <p class="card-text "> Lepidolite aids in overcoming emotional or mental dependency and helps treat addictions and all kinds conditions, including anorexia.</p>
                        </div>
                    </div>
                </div>
            </div>
  
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/lavender-uses-oil.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Lavender Oil</h5>
                            <p class="card-text">Distilled from the plant Lavandula angustifolia, the oil promotes relaxation and believed to treat anxiety, fungal infections, allergies, depression, insomnia, eczema, nausea, and menstrual cramps.</p>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/pepermint.jpg"  alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Peppermint Oil</h5>
                            <p class="card-text">Peppermint Essential Oil relieves fatigue, muscle spasms, muscle tension, flatulence, and fever. It is known to disinfect and soothe inflamed skin.
                               It boosts circulation, releases the feeling of tiredness, and soothes itchy skin.</p>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="image-wrapper">
                            <img src="images/tea tree.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Tea Tree Oil</h5>
                            <p class="card-text">Tea Tree Essential Oil detoxifies and disinfects the body, soothes inflammation, and relieves the pain of minor burns, sores, bites, and cuts.</p>
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
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card" >
                <div class="image-wrapper">
                    <img src="images/ventusa.jpg"  alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
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
    <hr><br/><br/>
  </section>
  <!--end of services-->
  <!--PHILOSOPHY-->
<section class="colored-section2 d-flex justify-content-center" id="our philosophy">
    <div class="row "><br/> <br/>
      <div class="col-md-5-sm-4-center"> <br/> <br/><br/>
        <h1 class="about1 text-center">OUR PHILOSOPHY</h1> <br/> <br/>
          <p class="about2 text-center fs-4">
           Living the life we deserve. Our Therapists are trained to give our customers the relaxation their body needed. Blissful Bali Massage Spa-Batangas 
           City will help you to get away from all the noise and problems around you. Our touch will help you forget everything but yourself. Choose the day you relax before 
           your body choose it itself. Providing the best service is our Philosophy and we live with it.
          </p><br/><br/>
      </div>
    </div>
  </section>
  <!--End of Philosophy-->
  <!--PHILOSOPHY-->
<section class="colored-section4 d-flex justify-content-center" id="contact">
    <div class="container">
      <form id="contact" action="About.php" method="post">
        <div class="row">
            <div class="col-lg-6"><br/>
                <img src="images/Background.jpg" style="height: 499px; width:500px">
            </div>
            <div class="col-lg-6"><br/><br/>
                <h1 class="text-center">Contact Us</h1><br/>

                <?php

                  if (isset($alert)) {
                  echo $alert;
                }

                ?>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phonenumber" name="phonenumber" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Type your message here....." name="message" rows="5" required></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button type="submit" class="btn btn-sm text-white text-center"  style="background-color:#bb71af" aria-pressed="true" name="submit" id="contact-submit">Submit</button></form>
                </div>
             </div>
        </div>
    </div>    
</section>
  <!--End of Philosophy-->
<br/>
<br/>
<br/>
 
<!-- Footer -->
<!--<footer class="text white pt-5 pb-4"> 
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
              <i class='bx bxl-gmail' ></i>blissfulbali.batangas@gmail.com
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
</footer>-->
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>


</body>

</html>

