<?php

session_start();

// connection file
include("connection.php");

// saving revive form
if (isset($_POST['btnconfirm'])) {

    $treatment = $_POST['treatment'];
    $service = $_POST['service'];
    $location = $_POST['location'];
    $addons = $_POST['addons'];
    $yz = implode(",", $addons);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $res_date = $_POST['res_date'];
    $res_time = $_POST['res_time'];

    $sql = "INSERT INTO `guest`  ( `first_name`, `last_name`, `email`, `address`, `service`, `treatment`, `location`, `contact_no`, `addons`, `res_date`, `res_time` ) VALUES ('" .  $first_name . "', '" . $last_name . "',  '" . $email . "', '" . $address . "','" .  $service . "', '" . $treatment . "',  '" . $location . "', '" . $contact_no . "', '" .  $yz . "', '" . $res_date . "', '" . $res_time. "')";

    if (mysqli_query($conn, $sql)) {

        $row_id = mysqli_insert_id($conn);

        $redirect_url = 'confirmationpage.php?guest_id=' . $row_id;

        redirect($redirect_url);
    } else {
        $alert = '<div class="alert failed">
            <strong>Oops!</strong> Your Appointment Form has not been submitted.
         </div>';
    }
}

// for redirection
function redirect($url)
{
    header('Location: ' . $url);
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>

    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Montserrat:wght@400;500&family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!--Font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Boxicons-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />


    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/Index.css" />
</head>

<body class="text-center">
    <!--Navigation Bar-->
    <header>
        <nav class="my-navbar navbar navbar-expand-lg navbar-light p-0 mb-2 fixed-top">
            <div class="container-fluid container1">
                <a class="navbar-brand d-block" href="#">
                    <img src="./images/Newlogo.png" alt="site icon" width="" height="60px"> &nbsp; &nbsp; &nbsp; &nbsp;
                    <label class="logo" id="logolabel">Blissful Bali Massage Spa</label>
                </a>
                <!--Toggle Buttons-->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                 aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--NavBar Menu-->

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
                            <a class="btn btn-primary btn-md fw-normal" href="#signup-modal" data-bs-toggle="modal" data-bs-target="#signup-modal" role="button" id="nav-btn">Be A Member</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--  End of Navigation Bar-->
    <br />

    <!-- CONTENT OF WEBPAGE-->
    <!--LANDING PAGE-->
    <section id="first">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <br />
                        <br />
                        <br />
                        <br />
                        <p class="fs-3 text-white">THE BEST IN TOWN</p>
                        <h1 class="display-4 text-white" style="font-family: 'Playfair Display', serif;">Revive. Retreat, Rejuvenate</h1>
                        <p class="lead fs-5 text-white">Celebrate your day with us. You can revive your day, retreat from struggles, and rejuvenate your life in our service. Treat yourself with a relaxing day. You deserve it.</p>
                        <br />
                        <div class="row">
                            <p class="lead">
                                <a class="btn btn-primary btn-md fw-bold" href="#carousel-services" role="button" id="jumbo-btn1" style="padding: 10px;">Book Services</a> &nbsp; &nbsp; &nbsp;
                            </p>
                        </div>
                    </div>
                    <div class="col-md-7 d-sm-7">
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Services-->
    <section class="colored-section1 d-flex justify-content-center" id="carousel-services">
        <div class="container">
            <h1 class="text-center">Treatments</h1> <br />
            <div id="carouselExampleControls" class="carousel  slide d-none d-sm-block" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <p class="text-center fs-4"> Packages</p>
                        <div class="cards-wrapper">
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/ss.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Revive Package</h5>
                                    <p class="card-text">With the help of this luxurious treatment and massage components, unwind and revitalize your body. Enjoy a peaceful back and back of legs massage with calming jade
                                        stones and reviving body oils, followed by a warm foot soak. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Revivemodal" data-bs-toggle="modal" data-bs-target="#Revivemodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="image-wrapper">
                                    <img src="images/kyut.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Retreat Package</h5>
                                    <p class="card-text">With the help of this luxurious treatment and massage components, Before a soothing massage employing a series of rhythmic, calming strokes, take a shower.</p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Retreatmodal" data-bs-toggle="modal" data-bs-target="#Retreatmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/akyut.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Rejuvenate Package</h5>
                                    <p class="card-text">A very rejuvenating full-body experience that combines the advantages of a nourishing facial, warm oil cocoon, body massage, and creamy body scrub. We start with a foot soak and then use coffee and coconut husks to gently resurface and tone the entire body. Before a soothing massage employing a series of rhythmic, calming strokes, take a shower.</p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Rejuvenatemodal" data-bs-toggle="modal" data-bs-target="#Rejuvenatemodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item text-center ">
                        <p class="text-center fs-4"> Refresh Packages</p>
                        <div class="cards-wrapper">
                            <div class="card">
                                <div class="image-wrapper">
                                    <img src="images2/compress.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Warm Compress</h5>
                                    <p class="card-text text-center f-6"> 1 hour for <strong> P399.00</strong> </p>
                                    <p class="card-text">The deep-relaxing warm compress back, neck, and shoulder massage will leave you feeling utterly restored and revived. A delightful treatment for knots and tight muscles. With warm oil, strong, thoroughly calming massage strokes are used. Your muscles will feel fluid and relaxed after a deeper massage thanks to the application of hot lava stones to particular places. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/cupping.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Cupping</h5>
                                    <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">A suction is created on the skin during cupping therapy by using heat and alternate pressure. Blood stasis can be effectively treated with this method, which also clears the meridians and evaporates the body's chilly dampness. This helps people feel less worn out and improves their physical fitness. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image-wrapper">
                                    <img src="images2/ventus.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Ventusa</h5>
                                    <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">Ventusa is an ancient Chinese alternative treatment that uses local suctions on the skin to address the stagnation of the blood flow. It soothes muscle pain and promotes healing. There will be skin bruising where the suctions were placed but this is normal. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item text-center ">
                        <p class="text-center fs-4"> Refresh Packages</p>
                        <div class="cards-wrapper">
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images2/ear-candle-treatment.jpeg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Ear Candle</h5>
                                    <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">By stimulating ears to create new, healthy wax while shedding old wax, ear candling aids in the removal of debris that cotton swabs and other instruments leave behind. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/hotstone.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Hot Stone</h5>
                                    <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">To balance the blood circulation, hot stones are placed on strategic body locations. Our therapists can reach deeper muscle layers since the stones' heat relaxes the muscle and widens the blood vessels. When used in conjunction with a full-body massage, the therapy offers an extremely restorative and powerful experience. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images2/compress.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Warm Compress</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                    <p class="card-text">The deep-relaxing warm compress back, neck, and shoulder massage will leave you feeling utterly restored and revived. A delightful treatment for knots and tight muscles. With warm oil, strong, thoroughly calming massage strokes are used. Your muscles will feel fluid and relaxed after a deeper massage thanks to the application of hot lava stones to particular places. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item text-center ">
                        <p class="text-center fs-4"> Refresh Packages</p>
                        <div class="cards-wrapper">
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images2/ventus.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Ventusa</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                    <p class="card-text">Ventusa is an ancient Chinese alternative treatment that uses local suctions on the skin to address the stagnation of the blood flow. It soothes muscle pain and promotes healing. There will be skin bruising where the suctions were placed but this is normal. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image-wrapper">
                                    <img src="images/cupping.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Cupping</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                    <p class="card-text">A suction is created on the skin during cupping therapy by using heat and alternate pressure. Blood stasis can be effectively treated with this method, which also clears the meridians and evaporates the body's chilly dampness. This helps people feel less worn out and improves their physical fitness. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="image-wrapper">
                                    <img src="images2/headm.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Head Massage</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                    <p class="card-text">A head massage may ease tension and lessen stress. Additionally, it could reduce blood pressure, enhance circulation to the head and neck, lessen the discomfort of a headache or migraine, and encourage hair growth. Make sure to dilute essential oils before using them, and test a small area of skin first with a patch test. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item text-center ">
                        <p class="text-center fs-4"> Refresh Packages</p>
                        <div class="cards-wrapper">
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/reflex.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Foot Reflex</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                    <p class="card-text">Foot Reflexology and a full body massage with special focus on foot reflexology. It begins with the feet soak in herbal tea, while the therapist massages the head, shoulder, and arms. The therapist then performs the relaxing foot reflexology. The final part is the back massage using gliding pressure which concludes with a satisfying body stretch. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images/hotstone.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Massage + Hot Stone</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P649.00</strong> </p>
                                    <p class="card-text">To balance the blood circulation, hot stones are placed on strategic body locations. Our therapists can reach deeper muscle layers since the stones' heat relaxes the muscle and widens the blood vessels. When used in conjunction with a full-body massage, the therapy offers an extremely restorative and powerful experience. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                                </div>
                            </div>
                            <div class="card" >
                                <div class="image-wrapper">
                                    <img src="images2/bodyscrub.jpg" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Body Scrub</h5>
                                    <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P699.00</strong> </p>
                                    <p class="card-text">Body scrub massage is a type of exfoliation treatment that uses a Body Scrub to remove dead skin cells and promote circulation. Body scrubs are usually made with natural ingredients such as sugar, salt, coffee, or oats. They can also be infused with essential oils for an added therapeutic benefits. </p>
                                </div>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
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
                        <div class="card" style="width:20rem; height:32rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Revive Package</h5>
                                <p class="card-text">With the help of this luxurious treatment and massage components, unwind and revitalize your body. Enjoy a peaceful back and back of legs massage with calming jade
                                        stones and reviving body oils, followed by a warm foot soak. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Revivemodal" data-bs-toggle="modal" data-bs-target="#Revivemodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:32rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Retreat Package</h5>
                                <p class="card-text">With the help of this luxurious treatment and massage components, Before a soothing massage employing a series of rhythmic, calming strokes, take a shower.</p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Retreatmodal" data-bs-toggle="modal" data-bs-target="#Retreatmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:32rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Rejuvenate Package</h5>
                                <p class="card-text">A very rejuvenating full-body experience that combines the advantages of a nourishing facial, warm oil cocoon, body massage, and creamy body scrub. We start with a foot soak and then use coffee and coconut husks to gently resurface and tone the entire body. Before a soothing massage employing a series of rhythmic, calming strokes, take a shower.</p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Rejuvenatemodal" data-bs-toggle="modal" data-bs-target="#Rejuvenatemodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <!--//Refresh2//-->
                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Warm Compress</h5>
                                <p class="card-text text-center f-6"> 1 hour for <strong> P399.00</strong> </p>
                                    <p class="card-text">The deep-relaxing warm compress back, neck, and shoulder massage will leave you feeling utterly restored and revived. A delightful treatment for knots and tight muscles. With warm oil, strong, thoroughly calming massage strokes are used. Your muscles will feel fluid and relaxed after a deeper massage thanks to the application of hot lava stones to particular places. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Cupping</h5>
                                <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">A suction is created on the skin during cupping therapy by using heat and alternate pressure. Blood stasis can be effectively treated with this method, which also clears the meridians and evaporates the body's chilly dampness. This helps people feel less worn out and improves their physical fitness. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Ventusa</h5>
                                <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                <p class="card-text">Ventusa is an ancient Chinese alternative treatment that uses local suctions on the skin to address the stagnation of the blood flow. It soothes muscle pain and promotes healing. There will be skin bruising where the suctions were placed but this is normal. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <!--//REfresh3//-->

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Ear Candle</h5>
                                <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                    <p class="card-text">By stimulating ears to create new, healthy wax while shedding old wax, ear candling aids in the removal of debris that cotton swabs and other instruments leave behind. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Hot Stone</h5>
                                <p class="card-text text-center f-6"> 1 hour for <strong> P499.00</strong> </p>
                                <p class="card-text">To balance the blood circulation, hot stones are placed on strategic body locations. Our therapists can reach deeper muscle layers since the stones' heat relaxes the muscle and widens the blood vessels. When used in conjunction with a full-body massage, the therapy offers an extremely restorative and powerful experience. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Warm Compress</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                <p class="card-text">The deep-relaxing warm compress back, neck, and shoulder massage will leave you feeling utterly restored and revived. A delightful treatment for knots and tight muscles. With warm oil, strong, thoroughly calming massage strokes are used. Your muscles will feel fluid and relaxed after a deeper massage thanks to the application of hot lava stones to particular places. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <!--//REfresh4//-->

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Ventusa</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                <p class="card-text">Ventusa is an ancient Chinese alternative treatment that uses local suctions on the skin to address the stagnation of the blood flow. It soothes muscle pain and promotes healing. There will be skin bruising where the suctions were placed but this is normal. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Cupping</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                <p class="card-text">A suction is created on the skin during cupping therapy by using heat and alternate pressure. Blood stasis can be effectively treated with this method, which also clears the meridians and evaporates the body's chilly dampness. This helps people feel less worn out and improves their physical fitness. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Head Massage</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                <p class="card-text">A head massage may ease tension and lessen stress. Additionally, it could reduce blood pressure, enhance circulation to the head and neck, lessen the discomfort of a headache or migraine, and encourage hair growth. Make sure to dilute essential oils before using them, and test a small area of skin first with a patch test. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <!--//REfresh5//-->
                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Foot Reflex</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P599.00</strong> </p>
                                <p class="card-text">Foot Reflexology and a full body massage with special focus on foot reflexology. It begins with the feet soak in herbal tea, while the therapist massages the head, shoulder, and arms. The therapist then performs the relaxing foot reflexology. The final part is the back massage using gliding pressure which concludes with a satisfying body stretch. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Massage + Hot Stone</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P649.00</strong> </p>
                                <p class="card-text">To balance the blood circulation, hot stones are placed on strategic body locations. Our therapists can reach deeper muscle layers since the stones' heat relaxes the muscle and widens the blood vessels. When used in conjunction with a full-body massage, the therapy offers an extremely restorative and powerful experience. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card" style="width:20rem; height:35rem">
                            <div class="image-wrapper">
                                <img src="images/ventusa.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Body Scrub</h5>
                                <p class="card-text text-center f-6"> 1 hour & 30 minutes for <strong> P699.00</strong> </p>
                                    <p class="card-text">Body scrub massage is a type of exfoliation treatment that uses a Body Scrub to remove dead skin cells and promote circulation. Body scrubs are usually made with natural ingredients such as sugar, salt, coffee, or oats. They can also be infused with essential oils for an added therapeutic benefits. </p>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-md " href="#Refreshmodal" data-bs-toggle="modal" data-bs-target="#Refreshmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
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
    <section class="colored-section5 d-flex justify-content-center" id="Therapeutic"><br /><br />
        <div class="container text-center">
            <p class="text-black text-capitalize text-center fs-4"><strong>Therapeutic Massage</strong></p> <br />
            <div class="row gx-3 gy-2 text-center">
                <div class="col-sm-3 gy-3 text-center">
                    <div class="card h-85" >
                        <img src="images2/deeptissue.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Trigger Points</h5>
                            <p class="card-text text-center f-6"> 1 hour for <strong> P599.00</strong> </p>
                            <p class="card-text">Trigger points and other myofascial pains are benign, but the pain they cause can be intense and debilitating. Luckily, trigger point massage is a simple, non-invasive way to release those tight spots and alleviate your pain. </p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Therapeuticmodal" data-bs-toggle="modal" data-bs-target="#Therapeuticmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3 text-center">
                    <div class="card  h-85" >
                        <img src="images2/triggerpoints.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Trigger Points with Warm Compress</h5>
                            <p class="card-text text-center f-6"> 1 hour and 30 minutes for <strong> P899.00</strong> </p>
                            <p class="card-text">It is easier to break down the cold lumps in the body using the trigger point massage with a warm compress bag on the back of the body. It melts down the complex nodes at the back of the body, making it easier to break down using the traditional trigger point massage.</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Therapeuticmodal" data-bs-toggle="modal" data-bs-target="#Therapeuticmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3 text-center">
                    <div class="card h-85" >
                        <img src="images2/prenatal-massage.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Pre-Natal</h5>
                            <p class="card-text text-center f-5"> 1 hour and 30 minutes for <strong> P699.00</strong> </p>
                            <p class="card-text">Pre-natal massage can reduce stress hormones in your body and relax and loosen your muscles. It can also increase blood flow, which is so important when you're pregnant, and keep your lymphatic system working at peak efficiency.</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Therapeuticmodal" data-bs-toggle="modal" data-bs-target="#Therapeuticmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3 text-center">
                    <div class="card h-85" >
                        <img src="images2/postnatalmasasge.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Post-Natal</h5>
                            <p class="card-text text-center f-5"> 1 hour and 30 minutes for <strong> P999.00</strong> </p>
                            <p class="card-text">Post-natal massage is a type of massage therapy used to aid the body's recovery after giving birth. The massage can help your aching muscles to relax, promote lymphatic drainage and may help you to process the emotional side of birth too. </p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Therapeuticmodal" data-bs-toggle="modal" data-bs-target="#Therapeuticmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <br />

            <p class="text-black text-capitalize text-center fs-4"><strong>Wellness Massage</strong></p> <br />
            <div class="row  gx-3 gy-2">
                <div class="col-sm-3 gy-3">
                    <div class="card h-85" >
                        <img src="images2/commasssage.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Combination Massage</h5>
                            <p class="card-text text-center f-6"> 1 hour for <strong> P349.00</strong> </p>
                            <p class="card-text">This is a combination of relaxation based massage and deep tissue work, designed for clients seeking pain relief in specific muscle areas while still desiring the grounding and relaxation. </p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Wellnessmodal" data-bs-toggle="modal" data-bs-target="#Wellnessmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3">
                    <div class="card h-85" >
                        <img src="images2/Herbal-Body-Scrub.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Body Scrub</h5>
                            <p class="card-text text-center f-6"> 1 hour &30 minutes for <strong> P899.00</strong> </p>
                            <p class="card-text">Body scrub massage is a type of exfoliation treatment that uses a Body Scrub to remove dead skin cells and promote circulation. Body scrubs are usually made with natural ingredients such as sugar, salt, coffee, or oats. They can also be infused with essential oils for an added therapeutic benefits.</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Wellnessmodal" data-bs-toggle="modal" data-bs-target="#Wellnessmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3">
                    <div class="card h-85" >
                        <img src="images2/deeps.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center"> Deep Tissue Massage</h5>
                            <p class="card-text text-center f-5"> 1 hour & 15 minutes for <strong> P699.00</strong> </p>
                            <p class="card-text">Deep tissue massage therapy isn't just a Swedish massage with deeper strokes or harder pressure. Deep tissue massages use firm pressure and slow stroked to massage deep layers of muscle and fascia, which is the connective tissue that surrounds your muscles.</p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Wellnessmodal" data-bs-toggle="modal" data-bs-target="#Wellnessmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 gy-3">
                    <div class="card h-85" >
                        <img src="images2/kids1.jpg" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center"> Kids Massage</h5>
                            <p class="card-text text-center f-5"> 30 minutes for <strong> P199.00</strong> </p>
                            <p class="card-text">Kids massage is an effective therapy for relieving anxiety and reducing stress, which helps lower cortisol levels in the body. Since massage inhibits cortisol release, your child’s mood automatically improves after a good massage session. </p>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-md " href="#Wellnessmodal" data-bs-toggle="modal" data-bs-target="#Wellnessmodal" role="button" style="padding: 5px; background-color:  #781C68;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <br />
        </div>
    </section>
    <!--end of services-->
    <!--PHILOSOPHY-->
    <section class="colored-section2 d-flex justify-content-center" id="ourphilosophy">
        <div class="container">
            <div class="row "><br /> <br />
                <div class="col-md-6">
                    <div class="container">
                    <img src="images/vio.jpg"  width="100%" height="90%">
                    </div>
                </div>
                <div class="col-md-6"><br /><br />
                    <h3>Home Service</h3><br />
                    <p>Aside from our physical location, we also offer our valuable services in the comfort of your own home.
                        In Blissful Bali Massage, we will serve you with our utmost sincerity to achieve the relaxation you
                        deserve even on your own home.
                    </p><br /><br />

                    <h3>What We Use</h3><br />
                    <p>We use different kind of tools such as Foot Reflex Stick, Ear Candle, Cups for ventusa and cupping theraphy. Aromatic oils for more relaxing environment. Lavender oil, Peppermint and Tea tree oil are the most favorite.
                        Stones are also highly in demand due to it's healing capabilities. Lepidolite is our most used stone for our hotstone massage.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--End of Philosophy-->
    <!--ABOUT US-->
    <section class="colored-section3 d-flex justify-content-center" id="aboutus">
        <div class="container-fluid" id="aboutus-container">
            <div class="row ">
                <div class="col-sm-6">
                    <br />
                    <h1 class="text-white fw-normal">ABOUT US</h1> <br />
                    <p class="text-white fs-6">
                        We offer the Best Massage and Indonesian Foot Spa in town!
                        Get away from all the noise and problems around you! You need to give your body the break and relaxation it deserves.
                        So get a soothing massage today only from the Most Trusted Spa in Batangas and reap the benefits of having a regular massage:
                        Reduces stress and boost immunity,
                        Decreases anxiety and depression,
                        Relieves muscle tension and pain,
                        Improves quality of sleep,
                        Instant relief against headache,
                        Lowers blood pressure,
                        Promotes overall well-being.
                        So what are you waiting for? Visit the Ultimate Spa Destination in Batangas City or book your home service massage today and experience total relaxation!
                    </p>
                </div>
                <div class="col-sm-6">
                    <img src="images/iris2.png" width="100%" height="90%">
                </div>
            </div>
        </div>
    </section>
    <!--end of about us-->
    <!--GOALS MISSION VISSION-->
    <section class="colored-section4 d-flex justify-content-center " id="GoalsMissionVission">
        <br /><br />
        <div class="container-fluid" id="gmscontainer"><br /><br />
            <div class="row g-3 gy-2">
                <div class=" col-sm-4 gy-3">
                    <div class="card  h-100 d-flex p-4 flex-column align-items-center" >
                        <div class="card-body">
                            <div class="image-wrapper">
                                <img src="images/iris1.png" alt="...">
                            </div><br />
                            <h1 class="card-title fs-5 text-center">Relax</h1>
                            <p class="card-text">Give yoursefl a break. Put your mind at ease. Where the mind goes, the body follows. Let things flow the way the need to. You'll get there. Somehow. </p>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-4 gy-3 ">
                    <div class="card h-100 d-flex p-4 flex-column align-items-center" >
                        <div class="card-body">
                            <div class="image-wrapper">
                                <img src="images/iris5.png" alt="...">
                            </div><br />
                            <h1 class="card-title fs-5 text-center">Live</h1>
                            <p class="card-text">Live like you never live before. Live like flowers on the field. Stop the worries, rejuvenates your thoughts and start to live your life in tranquility. Live with us.</p>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-4 gy-3">
                    <div class="card  h-100 d-flex p-4 flex-column align-items-center" >
                        <div class="card-body">
                            <div class="image-wrapper">
                                <img src="images/iris3.png" alt="...">
                            </div><br />
                            <h1 class="card-title fs-5 text-center">Grow</h1>
                            <p class="card-text">Grow as you are planted. Just like plants, care for yourself is the foundation of strong roots. It is the beauty of live. Always choose to experience it.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br /><br />
    </section>
    <!--End content-->

    <!---------------------- MODAL ------------------------------>

    <!--start of login/signin-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php
                        if(isset($_GET['error1'])){

                        //script for modal to appear when error
                        echo '  <script>
                                $(document).ready(function(){
                                $("#login-modal").modal("show");
                                });
                                </script> ';


                        //error handling of log in

                        if($_GET['error1'] == "emptyfields") {
                        echo '<h5 class="text-danger text-center">Fill all fields, Please try again!</h5>';
                        }
                        else if($_GET['error1'] == "error") {
                        echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                        }
                        else if($_GET['error1'] == "wrongpwd") {
                            echo '<h5 class="text-danger text-center">Wrong Password, Please try again!</h5>';
                        }
                        else if($_GET['error1'] == "error2") {
                            echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                        }
                        else if($_GET['error1'] == "nouser") {
                            echo '<h5 class="text-danger text-center">Username or email not found, Please try again!</h5>';
                            }
                        }
                        echo'<br>';
                    ?>
                    <div class="container-fluid">
                        <form action="signin.php" method="POST">
                        <div class="row">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                                </div>
                            <div class=" col">
                                <div class="top-text">
                                    <h2 class="modal-title pt-4 pb-3 text-center fw-bold" id="ModalCenter">Welcome!!!</h2>
                                    <h4 class="text pb-4 pt-1 text-center"> Glad to see you again.</h4>
                                </div>

                                <div class="form-group pl-5 pr-5">
                                    <div class="form-element pb-3">
                                        <input class="form-control" type="text" name="acc_username" placeholder="Username" required>
                                    </div>
                                    <div class="form-element pb-3">
                                        <input id="pass-placeholder" class="form-control" type="password" name="acc_password" placeholder="******" required>
                                    </div>
                                    <div>
                                        <button type="submit" name="login-submit" id="login-button-modal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white">Log-in</button>
                                    </div>
                                </div>
                                <br />
                                </form>
                                <div class="bottom-part pt-1 pb-1 pr-1 pl-1">
                                    <h6>Don't have an account? <a href="#signup-modal" data-bs-toggle="modal" data-bs-target="#signup-modal" class="text-white pl-5">Sign Up for free</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- signup modal -->
    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <?php
                        if(isset($_GET['error'])){
                            //script for modal to appear when error
                            echo '  <script>
                                        $(document).ready(function(){
                                        $("#signup-modal").modal("show");
                                        });
                                    </script> ';


                            //error handling for errors and success --sign up form

                            if($_GET['error'] == "emptyfields") {
                                echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "invalidemailusername") {
                                echo '<h5 class="bg-danger text-center">Username or Email are taken!</h5>';
                            }
                            else if($_GET['error'] == "invalidemail") {
                                echo '<h5 class="bg-danger text-center">Invalid Email, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "usernameemailtaken") {
                                echo '<h5 class="bg-danger text-center">Username or email is taken, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "invalidusername") {
                                echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "invalidpassword") {
                                echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "passworddontmatch") {
                                echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
                            }
                            else if($_GET['error'] == "error1") {
                                echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                            }
                            else if($_GET['error'] == "error2") {
                                echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                            }
                        }
                        if(isset($_GET['signup'])) {
                                //script for modal to appear when success
                            echo '  <script>
                                        $(document).ready(function(){
                                        $("#signup-modal").modal("show");
                                        });
                                    </script> ';

                            if($_GET['signup'] == "success"){
                                echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
                            }
                        }
                        echo'<br>';
                    ?>
                    <div class="container">
                        <form action="signup.inc.php" method="POST">
                        <div class="row">
                            <div class=" col">
                                <div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                                    </div>
                                    <div class="top-text">
                                        <h2 class="modal-title text-white pt-4 pb-3 text-center" id="ModalCenter">Be Our Member</h2>
                                        <p class="text-center">We'll look after you!</p>
                                    </div>
                                </div>
                                <div class="form-group pl-5 pr-5">

                                    <div class="form-element form-control-sm pb-3">
                                        <input class="form-control " type="text" name="reg_fname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-element form-control-sm pb-3">
                                        <input class="form-control " type="text" name="reg_lname" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-element form-control-sm pb-3">
                                        <input class="form-control " type="text" name="reg_username" placeholder="Username must be 4-20 characters long" required>
                                    </div>
                                    <div class="form-element form-control-sm pb-3">
                                        <input class="form-control " type="text" name="phonenumber" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-element form-control-sm pb-3">
                                        <input class="form-control " type="text" name="reg_email" placeholder="Email" >
                                    </div>
                                    <div class="form-element  form-control-sm pb-3">
                                        <input class="form-control " type="text" name="address" placeholder="Address" required>
                                    </div>
                                    <div class="form-element form-control-sm">
                                            <p class="input-group">
                                                <input id="passInput" class="form-control" placeholder="Password" name="reg_pwd" type="password" aria-required="false" required>
                                                <span class="btn-outline input-group-text" role="button" title="view password" id="passBtn">
                                                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                </span>
                                            </p>
                                    </div>
                                    <div class="form-element form-control-sm pb-3">
                                        <input id="pass-placeholder " class="form-control" type="password" name="reg_cfpwd" placeholder="Confirm Password" required>
                                    </div>

                                    <div class="align-content-center">
                                        <button type="submit" name="signup-submit" id="signup-button-modal" class="btn align-content-center mt-2 mb-2 pt-1 pb-1 pl-5 pr-5">Sign Up</button>
                                    </div>
                                </div>
                                </form>

                                <div class="bottom-part pt-1 pb-1 pr-1 pl-1">
                                    <h6>Already have an account? <a href="login-modal" data-bs-toggle="modal" data-bs-target="#login-modal" class="text-white pl-5">Log-in</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                            </div>
                        </div>
                    </div>

    <!--end of loGin/signin modal-->


    <!--confirmationmodal-->
    <div class="modal fade" id="Confirmationform" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                    </div>
                    <div class="top-text">
                        <h5 class="modal-title pt-4 pb-3">Your appointment has been <strong>CONFIRMED!</strong></h5>
                    </div>

                    <div class="table-responsive-sm text-start fs-6">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Details</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Reservation Number:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row"> First Name:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row"> Last Name:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">Address:</th>
                                    <td class="text-white"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email Address:</th>
                                    <td class="text-white"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">Time:</th>
                                    <td class="text-white"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">Location:</th>
                                    <td class="text-white"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Payment to be Paid:</th>
                                    <td class="text-white"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="bottom-part pt-4 pb-4 pl-5 pr-5">
                            <table>
                                <tr>
                                    <td>
                                        <h6> Please be on time on your appointment. See you soon!</h6>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="ModalTAC" tabindex="-1" aria-labelledby="terms" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
              
                <div class="modal-body">
                  <div class="modal-header">
                    <h5 class="modal-title" id="terms">Terms and Conditions by Blissful Bali Massage Spa
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <h6>Each time you use this website, you agree to completely comply with and be governed by the
                        accompanying Agreement. Please don't use the website if you don't agree to these terms and
                        conditions.The Terms and Conditions ("Terms") for our website are set forth on this website and
                        constitute legal documentation. You agree to fully abide by and be bound by the following
                        Agreement each time you use our website by utilizing it. Please carefully read the following
                        definitions. Acceptance is hereby strictly restricted to these Terms and Conditions, in the
                        event that these Terms and Conditions are deemed an offer.</h6>

                    <br />
                    <p>1. General Conditions</p>
                    <ul>
                        <li>We have the right to refuse service to anybody at any time for any reason.
                            You acknowledge that your content (except credit card information) may be transported
                            unencrypted and may entail (a) transmissions across different networks and (b) modifications
                            to meet and adapt to technical requirements of connected networks or devices. Payment card
                            information is always encrypted during network transfer.
                            Without our express written consent, you undertake not to replicate, duplicate, copy, sell,
                            resell, or exploit any portion of the Service or Content, use of the Service or Content, or
                            access to the Service, Content, or any contact on the website through which the service is
                            offered.</li>
                        <li>
                            Any new features or tools introduced to the current store will be subject to the Terms and
                            Conditions as well. The most recent version of the Terms & Conditions can be seen on this
                            page at any time. By making updates and/or changes to our website, we retain the right to
                            update, amend, or replace any portion of these Terms and Conditions. It is your duty to
                            check this page for updates on a regular basis. Your continued use or access to the website
                            after any changes are posted implies acceptance of those changes.
                        </li>
                        <li>We are not liable if the information on this site is not accurate, complete, or up to date.
                            The content on this website is for general information purposes only and should not be
                            relied on or used as the sole basis for making decisions without accessing primary, more
                            accurate, more complete, or more timely sources of information. Any reliance on the
                            information on this website is entirely at your own risk.</li>
                    </ul>
                    <p>2. Price and Payment</p>
                    <ul>
                        <li>
                            The cost of the Services will be as specified in the confirmation slip.
                        </li>
                        <li>The price:
                            <ul>
                                <li>excludes any reasonable service-related expenses that will be charged separately
                                </li>
                            </ul>
                        </li>
                        <li> You agree to compensate Blissful Bali Massage Spa for all reasonable expenses incurred in
                            providing the Services, including but not limited to travel, lodging, and sustenance
                            charges.</li>
                    </ul>
                    <p>3. Provision of services</p>
                    <ul>
                        <li>We will provide the Services to You in accordance with the Appointment Date and Time.</li>
                        <li>The spa consultant provides all services and goods with the explicit goal of developing,
                            managing, and operating a spa. The spa consultant accepts no responsibility for the
                            repercussions or impacts on business (good or bad) as a result of any service or product
                            recommended, hired, or handled by the spa consultant on behalf of the client by management,
                            employees, contractors, or outside consultants.</li>
                        <li>We will not be liable for any delay or inability to perform the Services as a result of
                            third-party delays or Your failure to appear at the appointment.</li>
                        <li>We reserve the right to make modifications to the Services we provide which do not have a
                            major impact on the nature or quality of the Services and will notify You of such changes in
                            advance.</li>
                    </ul>
                    <p>4. Cancellation</p>
                    <ul>
                        <li>In the event of cancellation and change of mind, You cannot show up to a cancelled
                            appointment</li>
                        <li> The Spa will not disclose any information even after cancellation of appointment.</li>
                    </ul>
                    <p>5. Your Obligation</p>
                    <ul>
                        <li>You will pay the Appointment Information-specified fee for the Services.</li>
                        <li>You will:<ul>
                                <li> grant Us access to the location and other sites and prepare them for the provision
                                    of Services; and</li>
                                <li>provide Us with all essential information and assistance (ensuring that information
                                    is complete and accurate); in each case, as reasonably necessary to allow Us to
                                    perform the Services.</li>
                                <li>You must pay in the counter or physical location or in the individual.</li>
                                <li>You must not distribute any worms, viruses, or other disruptive code.
                                    Your Services will be immediately terminated if any of the Terms are broken or
                                    violated.

                                    The following terms apply to all users of the Site, including all content contained
                                    here and all online services offered by us, whether made available for purchase or
                                    not. All users of the site, including customers and other users, are subject to
                                    these Terms. You acknowledge reading these Terms and agree to them without change by
                                    using the Site or Service.</li>
                                <li>You agree that your comments will not violate any right of any third-party,
                                    including copyright, trademark, privacy, personality or other personal or
                                    proprietary right. You further agree that your comments will not contain libelous or
                                    otherwise unlawful, abusive or obscene material, or contain any computer virus or
                                    other malware that could in any way affect the operation of the Service or any
                                    related website. You may not use a false e‑mail address, pretend to be someone other
                                    than yourself, or otherwise mislead us or third-parties as to the origin of any
                                    comments. You are solely responsible for any comments you make and their accuracy.
                                    We take no responsibility and assume no liability for any comments posted by you or
                                    any third-party. </li>
                            </ul>
                        </li>
                        <li>The Services are supplied at Your request, and You are responsible for ensuring that the
                            Services meet Your requirements.</li>
                    </ul>
                    <p>6. Our Responsibility & Liability</p>
                    <ul>
                        <li>We are responsible with the information you gave to use during the appointment beginning and
                            end.</li>
                        <li>Our product prices are subject to change without notice. We retain the right to alter or
                            discontinue the Service (or any part or content thereof) at any time and without notice. We
                            will not be accountable to you or any third person if the Service is modified, priced,
                            suspended, or discontinued.</li>
                        <li>If we amend or cancel an order, we may attempt to tell you by contacting the email address
                            and/or billing address/phone number supplied at the time the transaction was placed.</li>
                        <li>Our party will be liable for:
                            <ul>
                                <li>providing confirmation information</li>
                                <li>sending updates in case of changes</li>
                            </ul>
                        </li>
                    </ul>
                    <p>7. Intellectual Property Rights</p>
                    <ul>
                        <li>
                            The Site and/or Service contain intellectual property owned by Blissful Bali Massage
                            Spa Batangas City, including, without limitation, trademarks, copyrights, proprietary
                            information, and other intellectual property, as well as Elements Spa Essentials, Inc's
                            name, logo, all designs, text, graphics, other files, and the selection and arrangement
                            thereof, also known as the "look and feel."

                        </li>
                        <li>
                            Without our prior written authorization, you may not edit, publish, transmit, participate in
                            the transfer or sale of, create derivative works from, distribute, display, reproduce or
                            perform, or otherwise exploit any of the Site, Service, Content, or intellectual property,
                            in whole or in part. If you are discovered to be in violation of this intellectual property
                            policy, we reserve the right to promptly remove you from the Site and/or Service without
                            reimbursement.
                        </li>
                        <li>You may use the content on our website for personal, non-commercial purposes as long as you
                            give full attribution and credit by name, keep all copyright, trademark, and other
                            proprietary notices intact, and, if used electronically, include a link back to the website
                            page from which the content was obtained.</li>
                    </ul>
                    <p>8. Entire Agreement</p>
                    <ul>
                        <li> We shall not be deemed to have waived any right or provision of these Terms and Conditions
                            if we fail to exert or enforce such right or provision. These Terms and Conditions, as well
                            as any policies or operating rules posted by us on this site or in relation to The Service,
                            represent the entire agreement and understanding between you and us and govern your use of
                            the Service, superseding any prior or contemporaneous agreements, communications, and
                            proposals, whether oral or written, between you and us (including, but not limited to, any
                            prior versions of the Terms and Conditions). Any ambiguities in the interpretation of these
                            Terms and Conditions will not be used against the party who wrote them.</li>
                    </ul>
                    <div>

                        <button type="button" value="" id="flexCheckDefault" data-bs-target="#Revivemodal" data-bs-toggle="modal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" style="background-color: #6f1f5e; color: white;" required>Agree</button>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>
    <!--Revival-->
    <div class="modal fade" id="Revivemodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row text-right">
                            <div class="d-grid gap-2 justify-content-sm-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5" style="background: rgba(255, 204, 244, 0.692); border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/ventusa.jpg" alt="...">
                                </div>
                                <form action="index.php" method="POST">
                                <h5 class=" text-center"><input type="hidden" name="treatment" value="Revive Package">Revive Package</h5>
                                <p class="fs-6"> Duration: 1 hour and 3O mins </p>
                                    <p class="fs-6"> Free Hot Tea and Hot Towel</p>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                        <option value="">Select...</option>
                                        <option value="Single - ₱644.00">Single P644.00</option>
                                        <option value="Couple - ₱677.00">Couple P677.00</option>
                                    </select>
                                    <br />
                                    <div class="row ">
                                        <p class="text-black fw-bold">Choose Location</p>
                                        <div class="col-6 text-start text-black fs-6">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                                <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                    Onsite
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-start text-black fs-6">
                                            <div class="form-check mb-1">
                                                <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                                <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                    Home Service
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="fs-6 fw-bold"> Choose 2 Add Ons </p>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" onclick="return chkcontrol2()"id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex"
                                                onclick="return chkcontrol2()" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                    <br />

                            </div>
                            <div class="col-sm-7 ">

                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="email" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Retreat-->
    <div class="modal fade" id="Retreatmodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-grid gap-2  justify-content-sm-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5 " style="background-color:#ffd6f8; border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/ventusa.jpg" alt="...">
                                </div>
                                <form action="index.php" method="POST">
                                <h5 class=" text-center"><input type="hidden" name="treatment" value="Retreat Package">Retreat Package</h5>
                                <p class="fs-6"> Duration: 2 hours </p>
                                    <p class="fs-6"> Free Hot Tea and Hot Towel</p>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                        <option value="">Select...</option>
                                        <option value="Single - ₱644.00">Single P644.00</option>
                                        <option value="Couple - ₱677.00">Couple P677.00</option>
                                    </select>
                                    <br />
                                <div class="row ">
                                    <p class="text-black fw-bold">Choose Location</p>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Onsite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Home Service
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-6 fw-bold"> Choose 3 Add Ons </p>
                                <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" onclick="return chkcontrol3()"
                                                id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex"
                                                onclick="return chkcontrol3()" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" onclick="return chkcontrol3()"
                                                id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" onclick="return chkcontrol3()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" onclick="return chkcontrol3()" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" onclick="return chkcontrol3()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" onclick="return chkcontrol3()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" onclick="return chkcontrol3()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                <br />

                            </div>
                            <div class="col-sm-7 ">
                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Rejuvenate-->
    <div class="modal fade" id="Rejuvenatemodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-grid gap-2  justify-content-sm-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5 " style="background-color:#ffd6f8; border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/ventusa.jpg" alt="...">
                                </div>
                                <form action="index.php" method="POST" >
                                <h5 class=" text-center"><input type="hidden" name="treatment" value="Rejuvenate Package">Rejuvenate Package</h5>
                                <p class="fs-6"> Duration: 2 hours </p>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                    <option value="">Select...</option>
                                    <option value="Whole Body Massage">Whole Body Massage</option>
                                    <option value="Combination Massage">Combination Massage</option>
                                    <option value="Foot Massage">Foot Massage</option>
                                    <option value="Face Massage">Face Massage</option>
                                </select>
                                <br />
                                <div class="row ">
                                    <p class="text-black fw-bold">Choose Location</p>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Onsite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Home Service
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-6 fw-bold"> Choose 2 Add Ons </p>
                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex" onclick="return chkcontrol2()" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" onclick="return chkcontrol2()" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" onclick="return chkcontrol2()" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                <br />

                            </div>
                            <div class="col-sm-7 ">
                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                 <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Refresh Modal-->
    <div class="modal fade" id="Refreshmodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-grid gap-2  justify-content-sm-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5 " style="background-color: #FFE9FB; border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/lotuslogo.png" alt="blissfulbalibatangas" height="auto" width="300px">
                                </div>
                                <form action="index.php" method="POST">
                                <h5 class=" text-center">Blissful Bali Massage Spa</h5>
                                <p class="fs-6 text-center"> The Best in Town </p><br />
                                <input type="hidden" name="treatment" value="Refresh Package">
                                <p class="fs-6"> Free Hot Tea and Hot Towel</p>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                    <option value="">Select Treatment...</option>
                                    <option value="1hr Massage + Warm Compress"> 1hr Massage + Warm Compress </option>
                                    <option value="1hr Massage + Cupping"> 1hr Massage + Cupping </option>
                                    <option value="1hr Massage + Ventusa"> 1hr Massage + Ventusa </option>
                                    <option value="1hr Massage + Ear Candle"> 1hr Massage + Ear Candle </option>
                                    <option value="1hr Massage + Hot Stone"> 1hr Massage + Hot Stone</option>
                                    <option value="1hr & 30mins Massage + Warm Compress"> 1hr & 30mins Massage + Warm Compress</option>
                                    <option value="1hr & 30mins Massage + Cupping"> 1hr & 30mins Massage + Cupping</option>
                                    <option value="1hr & 30mins Massage + Ventusa"> 1hr & 30mins Massage + Ventusa</option>
                                    <option value="1hr & 30mins Massage + Foot Reflex"> 1hr & 30mins Massage + Foot Reflex </option>
                                    <option value="1hr & 30mins Massage + Hot Stone"> 1hr & 30mins Massage + Hot Stone</option>
                                    <option value="1hr & 30mins Massage + Head Massage"> 1hr & 30mins Massage + Head Massage</option>
                                </select>
                                <br />
                                <div class="row ">
                                    <p class="text-black fw-bold">Choose Location</p>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Onsite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Home Service
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-6 fw-bold"> Add ons for 15 mins for only 149 </p>
                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                <br />

                            </div>
                            <div class="col-sm-7 ">
                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                 <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Therapeutic Modal-->
    <div class="modal fade" id="Therapeuticmodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-grid gap-2  justify-content-sm-end">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5 " style="background-color: #FFE9FB; border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/lotuslogo.png" alt="blissfulbalibatangas" height="auto" width="300px">
                                </div>
                                <form action="index.php" method="POST">
                                <h5 class=" text-center">Blissful Bali Massage Spa</h5>
                                <p class="fs-6 text-center"> The Best in Town </p>
                                <input type="hidden" name="treatment" value="Therapeutic Massage">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                    <option value="">Select Treatment...</option>
                                    <option value="1hr Trigger Points">1hr Trigger Points</option>
                                    <option value="1hr & 30 mins Trigger Points w/ Warm Compress">1hr & 30 mins Trigger Points w/ Warm Compress</option>
                                    <option value="1hr & 30 mins Pre-natal">1hr & 30 mins Pre-natal</option>
                                    <option value="1hr & 30 mins Post-natal">1hr & 30 mins Post-natal</option>
                                </select>
                                <br />

                                <div class="row ">
                                    <p class="text-black fw-bold">Choose Location</p>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Onsite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Home Service
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-6 fw-bold"> Add ons for 15 mins for only 149 </p>
                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                <br />
                            </div>
                            <div class="col-sm-7 ">
                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                 <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Wellness Modal-->
    <div class="modal fade" id="Wellnessmodal" tabindex="-1" role="dialog" aria-labelledby="ModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-md-down" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-grid gap-2  justify-content-sm-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-sm-5 " style="background-color: #FFE9FB; border-radius: 15px;"> <br />
                                <div class="image-wrapper">
                                    <img src="images/lotuslogo.png" alt="blissfulbalibatangas" height="auto" width="300px">
                                </div><br />
                                <form action="index.php" method="POST">
                                <h5 class=" text-center">Blissful Bali Massage Spa</h5>
                                <p class="fs-6 text-center"> The Best in Town </p>
                                <input type="hidden" name="treatment" value="Wellness Massage">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service" required>
                                    <option value="">Select Treatment...</option>
                                    <option value="1hr Combination Massage">1hr Combination Massage</option>
                                    <option value="1hr & 30 mins Body Scrub">1hr & 30 mins Body Scrub</option>
                                    <option value="1hr & 15 mins Deep Tissue Massage">1hr & 15 mins Deep Tissue Massage</option>
                                    <option value="30 mins Kids Massage">30 mins Kids Massage</option>
                                </select>
                                <br />

                                <div class="row ">
                                    <p class="text-black fw-bold">Choose Location</p>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Onsite" id="flexRadioDefault1" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Onsite
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-start text-black fs-6">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="location" value="Home Service" id="flexRadioDefault2" required>
                                            <label class="form-check-label fs-6" for="flexRadioDefault1" id="formtextstart">
                                                Home Service
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-6 fw-bold"> Add ons for 15 mins for only 149 </p>
                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Hot Stone" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Hot Stone
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Foot Reflex" id="flexChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Foot Reflex
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Back Massage" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Back Massage
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ventusa" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Ventusa
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-start text-black fs-6">
                                            <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="addons[]" value="Cupping" id="flexCheckChecked">
                                                    <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                        Cupping
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Warm Compress" id="flexCheckDefault">
                                                <label class="form-check-label fs-6" for="flexCheckDefault" id="formtextstart">
                                                    Warm Compress
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Ear Candle" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Ear Candle
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="addons[]" value="Head Massage" id="flexCheckChecked">
                                                <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                                    Head Massage
                                                </label>
                                            </div>
                                            <div class="col text-start text-danger fs-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="addons[]" value="No Add Ons" id="flexCheckChecked">
                                        <label class="form-check-label fs-6" for="flexCheckChecked" id="formtextstart">
                                            No AddOns
                                        </label>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                <br />
                            </div>
                            <div class="col-sm-7 ">
                                <div class="top-text">
                                    <h4 class="modal-title pt-4 pb-3">APPOINTMENT FORM</h4>
                                    <h6 class="text pb-4 pt-1">Please fill out the form below to make an appointment!</h6>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="First name" aria-label="First name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Last name" aria-label="Last name" name="last_name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Address" aria-label="Address" name="address" required>
                                    </div>
                                </div>


                                 <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone Number" aria-label="Phone Number" name="contact_no" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-sm" placeholder="Email" aria-label="Email" name="email" required>
                                    </div>
                                </div>


                                <div class="row mb-3 ">
                                    <div class="col">
                                       <input type="text" class="form-control form-control-sm" placeholder="Preferred Date"  id="appt_date" name="res_date" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="time" class="form-control form-control-sm" placeholder="Preferred Time" aria-label="Preferred Time" name="res_time" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col text-start text-white">
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#ModalTAC" class="link-info" data-bs-toggle="modal" data-bs-target="#ModalTAC" style="color: black;">Terms and Conditions
                                                    Agreement</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="confirmationbuttonmodal" class="btn mt-3 mb-2 pt-1 pb-1 pl-5 pr-5 text-white" name="btnconfirm">Confirm Appointment</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!---------------- ENDMODALS ----------------------->


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
                <p class="text-white  text-center">
                    <i class='bx bxl-gmail'></i> blissfulbali.batangas@gmail.com
                </p>
                <p class="text-white  text-center">
                    <i class='bx bxl-facebook-circle'></i> @blissfulbalibatangas
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center text-white" style="color: black;"> © Copyright 2022: </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom JS -->

    <script>
const PassBtn = document.querySelector('#passBtn');
PassBtn.addEventListener('click', () => {
    const input = document.querySelector('#passInput');
    input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');

   if (input.getAttribute('type') === 'text'){
     PassBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
  } else{
     PassBtn.innerHTML = '<i class="fa fa-eye fa-fw" aria-hidden="true"></i>';
  }

});
</script>

    <script type="text/javascript">
        function chkcontrol2() {
            var a = document.getElementsByName('addons[]')
            var newvar = 0;
            var count;
            for (count = 0; count < a.length; count++) {
                if (a[count].checked == true) {
                    newvar = newvar + 1;
                }
            }

            if (newvar > 2) {
                alert("Please Select Only Two")
                return false;
            }
        }
        function chkcontrol3() {
            var a = document.getElementsByName('addons[]')
            var newvar = 0;
            var count;
            for (count = 0; count < a.length; count++) {
                if (a[count].checked == true) {
                    newvar = newvar + 1;
                }
            }

            if (newvar > 3) {
                alert("Please Select Only Three")
                return false;
            }
        }
        const navbarItems = document.querySelectorAll('.navbar-nav .nav-link');

        navbarItems.forEach(item => {
            item.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                navbarCollapse.classList.remove('show');
            });
        });
    </script>

    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

</body>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
        $(function () {
            var selectedDates;
            datePicker = $('[id*=appt_date]').datepicker({
                startDate: new Date(),
                minDate: 0,
                format: "mm/dd/yyyy",
                daysOfWeekHighlighted: "0",
                language: 'en',
                daysOfWeekDisabled: [0]
            });
        });
    </script>


</html>
