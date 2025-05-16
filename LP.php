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
        header("Location: Lp.php?SavedSuccessfully.");
    }
    else {
        header("Location: LP.php?FailedToSave.");
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
    $status = $_POST['status'];

    $sql = "INSERT INTO `applicant` (`job_id`, `firstname`, `lastname`, `age`, `phonenumber`, `email`, `file`, `self_desc`, `status`) 
    Values ('$job_id', '$firstname', '$lastname', '$age', '$phonenumber', '$email', '$file', '$self_desc', 'applicant')";

    $query = mysqli_query($conn, $sql);

    if ($query) { 
        header("Location: LP.php?saved=sucessfuly");
    } else { 
        header("Location: LP.php?FailedToSubmit");
    }
}
?>
 

 <?php

 include 'db.php';
 if (isset($_POST['contactsubmit'])) {
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`, `phonenumber`, `email`, `message`) VALUES ('$name', '$phonenumber', '$email', '$message')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: LP.php?saved=Successfully");
    } else {
        header("Location: LP.php?FailedToSubmit");
    }
 }
 ?>

<DOCTYPE html>
    <html>
        <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">
   
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
    
    <!--css-->
    <link rel="stylesheet" href="LP.css"> 
        </head>

<style>
     @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&family=Space+Mono:wght@400;700&display=swap");
.icon-box{
    border: #1c3347 .5px solid;
    background: white;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    padding: 30px;
    text-align: center;
    transition: transform 0.3s ease;
    box-shadow: 5px 0px 10px 0px #aaa;
}
.icon-box:hover {
    transform: translateY(-5px);
}
.icon-box i {
    font-size: 2rem;
    color: #1c3347;
    margin-bottom: 15px;
}
   
.hero-section {
    display: flex;
    flex-wrap: wrap;
    padding: 3rem 2rem; 
}

.hero-text {
    flex: 1;
    padding-right: 2rem;
} 
.hero-images {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.image-overlay {
    position: relative;
    width: 100%;
    max-width: 500px;
}

.image-overlay img {
    width: 100%;
    border-radius: 1rem;
}

.circle-img {
    position: absolute;
    border-radius: 50%;
    border: 5px solid #fff;
    overflow: hidden;
}

.circle-img.left {
    bottom: -40px;
    left: -40px;
    width: 160px;
    height: 160px;
}

.circle-img.right { 
    top: -40px;
    right: -40px;
    width: 130px;
    height: 130px;
}



.carousel {
	position: relative;
	width: 100%;
	max-width: 1400px;
	padding: 5vh 0;
    overflow: hidden;
    width: 100%;
    position: relative;
}

.carousel-track {
	display: flex;
	transition: transform ease;
	padding: 40px 0;
	gap: 40px;
    width: max-content;
}

.carousel-controls {
	display: flex;
	justify-content: center;
	gap: 20px;
	margin-top: 30px;
}

.carousel-button {
	background: #aaa;
	color:#fafafa;
	border: none;
	width: 50px;
	height: 50px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	transition: transform 0.3s ease, opacity 0.3s ease;
}

.carousel-button:hover {
	transform: translateY(-2px);
}

.carousel-button:active {
	transform: translateY(0);
}

.carousel-button svg {
	width: 24px;
	height: 24px;
}

.card-system {
	display: flex;
	gap: 40px;
}

.deconstructed-card {
	position: relative;
	width:  300px;
    height: 400px;
	cursor: pointer;
	transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
	transform-style: preserve-3d;
	flex-shrink: 0; 
}

.card-layer {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	transition: transform var(0.8s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.8s cubic-bezier(0.16, 1, 0.3, 1));
}

.card-image {
	overflow: hidden;
	z-index: 1;
}

.wave-svg {
	width: 100%;
	height: 100%;
	transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
}

.card-frame {
	z-index: 3;
	pointer-events: none;
}

.frame-path {
	fill: none;
	stroke: rgba(8, 8, 8, 0.8);
	stroke-width: 1;
	stroke-dasharray: 1520;
	stroke-dashoffset: 1520;
	transition: stroke-dashoffset 1.5s cubic-bezier(0.16, 1, 0.3, 1);
}

.card-background {
	z-index: 0;
	background-color: #fafafa;
}

.bg-grid {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.grid-line {
	position: absolute;
	background-color: rgba(0, 0, 0, 0.08);
	transition: transform var(0.8s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.grid-line.horizontal {
	width: 100%;
	height: 1px;
	transform: scaleX(0.3);
	transform-origin: left;
}

.grid-line.vertical {
	height: 100%;
	width: 1px;
	transform: scaleY(0.3);
	transform-origin: top;
}

.bg-objects {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	pointer-events: none;
}

.bg-object {
	position: absolute;
	opacity: 0.3;
	transition: transform var(0.8s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.bg-object.circle {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	border: 1px solid rgba(0, 0, 0, 0.1);
	bottom: 40px;
	left: -30px;
	transform: translateY(20px);
}

.bg-object.square {
	width: 60px;
	height: 60px;
	border: 1px solid rgba(0, 0, 0, 0.1);
	top: 40px;
	right: 30px;
	transform: rotate(45deg) translateY(-20px);
}

.bg-object.triangle {
	width: 0;
	height: 0;
	border-left: 40px solid transparent;
	border-right: 40px solid transparent;
	border-bottom: 70px solid rgba(0, 0, 0, 0.05);
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%) scale(0.5);
}

.card-content {
	z-index: 2;
	padding: 30px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	height: 100%;
}

.ocean-content {
	color:#fafafa;
}

.ocean-content .content-text,
.ocean-content .meta-text,
.ocean-content .cta-text {
	color:#fafafa;
	text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.ocean-content .meta-line {
	background-color:#fafafa;
}

.ocean-content .fragment-body {
	background: rgba(15, 30, 44, 0.5);
	padding: 10px;
	border-radius: 4px;
	backdrop-filter: blur(2px);
	margin-top: 1rem;
	margin-bottom: 1rem;
}

.content-fragment {
	position: relative;
}

.fragment-heading {
	margin-top: auto;
	margin-bottom: 1.5rem;
}

.content-text {
	font-size: 2rem;
	font-weight: 900;
	line-height: 1.2;
	letter-spacing: -0.02em;
	color: #080808;
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
	transform: translateY(10px);
	opacity: 0.7;
}

.content-subtext {
	font-size: 0.875rem;
	font-weight: 500;
	letter-spacing: 0.05em;
	margin-top: 1rem;
	color: #080808;
	opacity: 0.5;
	transform: translateY(10px);
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.fragment-meta {
	display: flex;
	align-items: center;
	gap: 10px;
	margin-bottom: 2rem;
}

.meta-line {
	width: 40px;
	height: 1px;
	background-color: #080808;
	transform: scaleX(0.5);
	transform-origin: left;
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.meta-text {
	font-family: "Space Mono", monospace;
	font-size: 0.75rem;
	letter-spacing: 0.05em;
	opacity: 0.6;
	transform: translateX(-5px);
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.fragment-body {
	max-width: 85%;
	margin: 1.5rem 0;
}

.fragment-body .content-text {
	font-size: 0.9rem;
	font-weight: 400;
	line-height: 1.5;
	letter-spacing: normal;
	opacity: 0.6;
}

.fragment-cta {
	margin-top: auto;
	overflow: visible;
}

.cta-link {
	text-decoration: none;
	position: relative;
	display: inline-flex;
	align-items: center;
	padding: 8px 0;
}

.cta-box {
	position: absolute;
	top: 0;
	left: -10px;
	width: calc(100% + 20px);
	height: 100%;
	background-color: #080808;
	transform: scaleX(0);
	transform-origin: left;
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.ocean-content .cta-box {
	background-color:#fafafa;
}

.cta-text {
	position: relative;
	font-family: "Space Mono", monospace;
	font-size: 0.75rem;
	font-weight: 700;
	letter-spacing: 0.1em;
	color: #080808;
	transition: color var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
	transform: translateX(-5px);
	opacity: 0.7;
	transition: transform var(0.4s cubic-bezier(0.16, 1, 0.3, 1)), opacity var(0.4s cubic-bezier(0.16, 1, 0.3, 1)),
		color var(0.4s cubic-bezier(0.16, 1, 0.3, 1));
}

.ocean-content .cta-text {
	color:#fafafa;
}

.ocean-content .cta-link:hover .cta-text {
	color: #080808 !important;
}

.align-right {
	text-align: right;
}

.text-align-right {
	align-self: flex-end;
	text-align: right;
}

.text-align-right .meta-line {
	transform-origin: right;
}

.text-align-right .cta-box {
	transform-origin: right;
}

.text-align-right .meta-text {
	transform: translateX(5px);
}

.text-card .content-text,
.text-card .content-subtext {
	color: #080808;
}

.deconstructed-card:hover .frame-path {
	stroke-dashoffset: 0;
}

.deconstructed-card:hover .content-text,
.deconstructed-card:hover .content-subtext {
	transform: translateY(0);
	opacity: 1;
	transition-delay: 0.05s;
}

.deconstructed-card:hover .fragment-body .content-text {
	transition-delay: 0.1s;
	opacity: 1;
}

.deconstructed-card:hover .meta-text {
	transform: translateX(0);
	opacity: 1;
	transition-delay: 0.15s;
}

.deconstructed-card:hover .meta-line {
	transform: scaleX(1);
	transition-delay: 0.05s;
}

.deconstructed-card:hover .wave-svg {
	transform: scale(1.05);
}

.deconstructed-card:hover .cta-text {
	transform: translateX(0);
	opacity: 1;
	transition-delay: 0.2s;
}

.deconstructed-card:hover .cta-link:hover .cta-box {
	transform: scaleX(1);
}

.deconstructed-card:hover .cta-link:hover .cta-text {
	color:#fafafa;
}

.text-card:hover .grid-line.horizontal {
	transform: scaleX(1);
}

.text-card:hover .grid-line.vertical {
	transform: scaleY(1);
}

.text-card:hover .bg-object {
	opacity: 1;
	transform: translate(0, 0) rotate(0);
}

.text-card:hover .bg-object.square {
	transform: rotate(45deg) translate(0, 0);
}

.text-card:hover .bg-object.triangle {
	transform: translate(-50%, -50%) scale(1);
}

.deconstructed-card:hover .grid-line:nth-child(1) {
	transition-delay: 0.1s;
}

.deconstructed-card:hover .grid-line:nth-child(2) {
	transition-delay: 0.2s;
}

.deconstructed-card:hover .grid-line:nth-child(3) {
	transition-delay: 0.3s;
}

.deconstructed-card:hover .grid-line:nth-child(4) {
	transition-delay: 0.15s;
}

.deconstructed-card:hover .grid-line:nth-child(5) {
	transition-delay: 0.25s;
}
 
.dots-container {
	display: flex;
	justify-content: center;
	gap: 8px;
	margin-top: 20px;
}

.dot {
	width: 8px;
	height: 8px;
	background-color: #080808;
	border-radius: 50%;
	opacity: 0.3;
	transition: transform 0.3s ease, opacity 0.3s ease;
	cursor: pointer;
}

.dot.active {
	opacity: 1;
	transform: scale(1.3);
}

.attribution {
	position: absolute;
	bottom: 20px;
	right: 20px;
	font-size: 12px;
	opacity: 0.7;
}

.attribution a {
	color: #080808;
	text-decoration: none;
}

@media (max-width: 768px) {
	:root {
		--card-width: 280px;
		--card-height: 380px;
	}

	.card-content {
		padding: 20px;
	}

	.content-text {
		font-size: 1.8rem;
	}
}
 
.image-content img {
    max-width: 400px;
    max-height: 400px;
    border-radius: 10px;
} 
</style>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: flex; justify-content: center; font-family: 'Poppins', Sans serif;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="data:image/png;base64,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" alt="" style="height: 30px; width: 30px; border-radius: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="LP.php" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Product.php" >Product</a>
        </li> 
        <li class="nav-item">
            <a href="Job.php" class="nav-link" >Job</a>
        </li>
        <li class="nav-item">
            <a href="#contactus" class="nav-link" >Contact Us</a>
        </li> 
      </ul> 
    </div>
  </div>
</nav>

<div class="modal-window" id="contact" >
    <div>
        <form action="Lp.php" method="post" >
        <a href="#" class="modal-close text-dark" title="close">X</a>
        <h4 style="text-align: center;">Contact Us</h4>
            <?php
        if (isset($alert)) {
            echo $alert;
        }
        ?>
        <div class="form-group">  
            <label class="form-label text-white fs-7"></label>
            <input type="text" class="form-control border rounded" placeholder="Name" value="" name="name" required>
        </div> 

        <div class="form-group">
            <label class="form-label text-white fs-7"></label>
            <input type="text" class="form-control border rounded" placeholder="Phonenumber" value="" name="phonenumber" required>
        </div>

        <div class="form-group">
            <label class="form-label text-white fs-7"></label>
            <input type="email" class="form-control border rounded" placeholder="Email" value="" name="email" requuiured>
        </div>

        <div class="mb-3"> 
            <textarea class="form-control border rounded" id="exampleFormControlTextarea1" placeholder="Message" name="message" required></textarea>
        </div>

        <div class="form-group">
            <!--<a href="#" class="btn-outline-light btn-outline-light-secondary text-dark" style="margin-left: 12rem;">Submit</a>-->
            <button type="submit" class="btn btn-outline-light" aria-pressed="true" name="submit" id="contact-submit" style="width: 150px; height: 45px; border: none; outline: none; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; -ms-border-radius: 50px;
            -o-border-radius: 50px;  cursor: pointer; margin-top: .5rem; font-size: .7rem; background-color: var(--button); color:#fafafa; box-shadow: 0px 12px 12px 0px rgba(0, 0, 0, .15);
            transition: all .3s ease; -webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; margin-left: 11rem">Submit</button></form>
        </div>
    </div>
</div> 

    <!---->
<div class="modal-window" id="contact">
    <div style="display: flex; justify-content: center; box-shadow: 5px 0px 10px 0px #aaa;">
        <a href="#" class="modal-close text-dark" title="close">x</a>
        <div class="form-group">
            <div class="col-md-6">
                <input type="text" class="form-control border rounded" style="border: #1c3347 .5px solid; border-radius: 15px;" placeholder="Title" name="job_title" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control border rounded" placeholder="Type" name="job_type" style="border: #1c3347 .5px solid; border-radius: 15px;" required>
            </div>
            <div class="col-md-12">
                <textarea name="job_desc" id="" class="form-control border rounded" placeholder="Description" style="border: #1c3347 .5px solid; border-radius: 15px;" required></textarea>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control border rounded" style="border: #1c3347 .5px solid; border-radius: 15px;" placeholder="Salary" name="salary" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control border rounded" style="border: #1c3347 .5px solid; border-radius: 15px;" placeholder="Benefits" name="benefits" required>
            </div>

            <div style="display: flex; justify-content: right;">
                <a href="#" class="btn btn-outline-secondary btn-sm text-darl bg-light" style="border: none; box-shadow: 5px 0px 10px 0px #aaa;">Submit</a>
            </div>
        </div>
    </div>
</div>

<div class="hero-section container-fluid">
    <div class="hero-text" style="font-family: 'Poppins', Sans serif;"> 
    <h1 class="display-4 fw-bold">Fuji Industries Manila Corporations</h1>
        <p class="lead">Manufacturing high-quality rubber products for automobiles, motor scooters and appliances.</p> 
        <a href="#" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 .5px solid; background-color: white; border-radius: 15px; box-shadow: 5px 0px 10px 0px #aaa;">More Info</a>
    </div>

    <div class="hero-images">
      <div class="image-overlay" > 
        <img src="https://i.pinimg.com/736x/aa/65/0d/aa650d9bd2a1071ec7afe45979379f12.jpg" alt="">
        <div class="circle-img left" style="box-shadow: 5px 0px 10px 0px #aaa;">
          <img src="https://i.pinimg.com/736x/44/f5/9c/44f59c8a6b8184551fe181f885a6e556.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="circle-img right" style="box-shadow: 5px 0px 10px 0px #aaa;">
          <img src="https://i.pinimg.com/736x/44/f5/9c/44f59c8a6b8184551fe181f885a6e556.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
      </div> 
    </div>
</div> 
 
    <?php
    include_once 'db.php';
    $sql = "SELECT * FROM announcement";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="container py-5" style="border: none; diplay: flex; justify-content: center; font-family: 'Poppins', Sans serif;" id="getintouch"> 
                <div class="row contact-section p-4" style="border-radius: 15px; box-shadow: 15px 10px 20px 10px #aaa;"> 
                    <h1 class="fw-bold display-6 mb-3" style="font-family: 'Poppins', Sans serif; color:rgb(65, 23, 21); text-align: center;">Announcement!</h1>
                    <div class="col-lg-6 mb-4 mb-lg-0 d-flex flex-column justify-content-center" >
                        <h1 style="text-align: center;"><?= htmlspecialchars($row['title'])?></h1>
                        <h5 style="text-align: center;"><?= htmlspecialchars($row['desc'])?></h5><br>
                        <p class="text-muted mb-4"><i class="fa fa-solid fa-map-marker"></i> <?= htmlspecialchars($row['location'])?></p>
                        <p class="text-muted mb-4"><i class="fa fa-solid fa-clock"></i><?= htmlspecialchars($row['datetime'])?></p>
                    </div>
                    <div class="col-lg-6" style="display: flex; justify-content: center;"> 
                        <div class="image-content mt-5 mt-lg-0" >
                            <img src="https://i.pinimg.com/736x/04/09/6e/04096e0c91e09fff685488b59df2154c.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <?php
        } 
    } 
    ?>
        
<div class="modal-window" id="prodinfooo">
    <div>
        <a href="#" class="modal-close text-dark" title="close">x</a>
        <div id ="prod-info-content">
            <p>Select product to see more info.</p>
        </div>
         <?php 
         include_once 'db.php';

         if (isset($_POST['prod_id'])) {
            $prod_id = intval($_POST['prod_id']);
            $sql = "SELECT * FROM product WHERE prod_id = ?";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $prod_id);
                $stmt->execute();
                $stmt = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <h5 class="text-center"><?= htmlspecialchars($row['prod_name'])?></h5>
                    <p><strong>Description: </strong><?= htmlspecialchars($row['prod_desc'])?></p>
                    <p><strong>Product Type: </strong><?= htmlspecialchars($row['product_type'])?></p>
                    <?php
                }
            }
         }
         ?>
    </div>
</div>  

&nbsp
<section class="colored-section2 d-flex justify-content-center" id="carousel-services" style="background-color: white; display: flex; align-items: center;"> 
    <div class="container" style="font-family: 'Poppins', Sans serif;"> 
      <h1 class="section-heading text-center text-dark" style="font-family: 'Poppins', Sans serif; font-style: bold;">Featured Products</h1> 
      <div id="carousel" class="carousel  slide d-none d-sm-block" data-bs-ride="carousel">
      <div class="carousel-inner">
<?php
include_once 'db.php'; 
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        if ($counter % 3 == 0) {
            if ($counter > 0) echo '</div></div>'; 
            echo '<div class="carousel-item' . ($counter == 0 ? ' active' : '') . '" >';
            echo '<div class="d-flex justify-content-center gap-4 px-5" >';
        }
        ?>
        <div class="card" style="width: 18rem; height: 100%; border: #1c3347 .5px solid; box-shadow: 5px 0px 10px 0px #aaa; border-radius: 15px;">
            <div class="image-wrapper" style="height: 180px; overflow: hidden; margin-top: .5rem;">
                <img src="https://i.pinimg.com/236x/3f/a8/dc/3fa8dce29396b888738d33bdcfd7d07f.jpg" alt="" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-body d-flex flex-column justify-content-between text-center" style="font-family: 'Poppins', Sans serif;">
                <div>
                    <h5 class="card-title"><?= htmlspecialchars($row['prod_name']) ?></h5>
                    <p><small><?= htmlspecialchars($row['prod_desc']) ?></small></p>
                    <p><small><?= htmlspecialchars($row['product_type']) ?></small></p>
                    <p><small><?= htmlspecialchars($row['product_price'])?></small></p>
                </div>
 
                <!--<div style="display: flex; justify-content: center;"> 
                    <a href="#info" class="btn btn-outline-secondary btn-sm text-dark bg-light app-btn" data-prod-id="<?=$row['prod_id']?>" style="box-shadow: 5px 0px 10px 0px #aaa; border-radius: 15px;">More Info</a>                
                </div>-->
                
            </div>
        </div>
        <?php
        $counter++;
    }      
    echo '</div></div>'; // Close last carousel item
}
?>
</div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev" >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>
     
    <?php
    include_once 'db.php';
    
    $sql = "SELECT * FROM product"; 
    $result = mysqli_query($conn, $sql);

    $products = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    ?>

<section>

  <div id="carouselSmallScreen" class="carousel slide d-sm-none" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $chunks = array_chunk($products, 3); // Group into 3 items per slide 
      foreach ($chunks as $index => $group) {
        ?>
        <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
          <div class="d-flex justify-content-center" style="height: 50%;">
            <?php foreach ($group as $product) { ?>
              <div class="card mx-2" style="margin: 0 1em; width: 70%;">
                <div style="display: flex; justify-content: center; "> 
                  <img src="https://i.pinimg.com/236x/3f/a8/dc/3fa8dce29396b888738d33bdcfd7d07f.jpg" alt="" style="margin-top: .5rem; border-radius: 10px; width: 70%; height: auto; object-fit: cover;">
                </div>
                <div class="card-body d-flex flex-column justify-content-between text-center" style="font-family: 'Poppins', Sans serif;">
                  <div>
                    <h5><?= htmlspecialchars($product['prod_name'])?></h5>
                    <p><small><?= htmlspecialchars($product['prod_desc'])?></small></p>
                    <p><?= htmlspecialchars($product['product_type'])?></p>
                    <p><?= htmlspecialchars($product['product_price'])?><p>
                  </div> 
                </div> 
              </div>
              <?php 
            } 
            ?>
            </div>
          </div>
          <?php
          }
          ?>
          </div>

  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselSmallScreen" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselSmallScreen" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>
<!---->

<section class="colored-section2 d-flex justify-content-center" id="missionvision" style="shadow: 0 0 20px rgba(0, 0, 0, 0.1); background-size: cover; background-position: center; padding: 50px 0;">
  <div class="container" style="font-family: 'Poppins', Sans serif;">
    <div class="row "><br/> <br/>
      <div class="col-md-6 .d-none .d-sm-none d-md-block .d-xl-none .d-xxl-none" style="display: flex; justify-content: center;">
          <img src="https://i.pinimg.com/236x/1b/07/76/1b07760553cdf4984554d4f7f0113676.jpg" style="height: 350px; width: 300px; border-top-left-radius: 150px; border-top-right-radius: 150px; box-shadow: 5px 0px 10px 0px #aaa;" >
      </div>
       
      <div class="col-md-6" style="background-color: white;justify-content: center;"><br/><br/>
        <h3>Mission</h3> 
        <p><small>To manufacture high-quality rubber products for automobiles, motor scooters, and apliances, ensuring customer satisfation through innovation and excellence</small></p> 
         
        <h3>Vision</h3><br/>
        <p><small>To be a global leader in the rubber manufacturing industry, recognized for our commitment to quality, sustainability, and continuous improvement.</small>
        </p><br/><br/>
      </div>
    </div>
  </div> 
</section> 

<div class="container">
    <div class="card" style="border: 15px; box-shadow: 5px 0px 10px 0px #aaa;"> 
        <div style="display: flex; justify-content: center; font-family: 'Poppins', Sans serif; margin-top: .5rem;">
            <h1 class="text-dark text-center">Core Values</h1>
        </div>
        <div class="container-md" style="font-family: 'Poppins', Sans serif;">
            <div class="row"> 
                <div class="col"> 
                    <div class="card" style="border: none;">
                        <i class="fa fa-solid fa-heart" style="display: flex; justify-content: center; color: #1c3347;"></i>
                        <p class="mt-2 text-center text-dark"><strong>Integrity: </strong>We conduct our business with honesty and transparency.</p>
                    </div> 
                </div>

                <div class="col">
                    <div class="card" style="border: none;">
                        <i class="fa fa-solid fa-star" style="display: flex; justify-content: center; color: #1c3347;"></i>
                        <p class="mt-2 text-center text-dark"><strong>Quality: </strong>We are committed to delivering products that meet the highest standards.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="border: none;">
                        <i class="fa fa-solid fa-lightbulb" style="display: flex; justify-content: center; #1c3347;"></i>
                        <p class="mt-2 text-center text-dark"><strong>Innovation: </strong>We continuosly seek new ways to improve our products and processes.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="card" style="border: none;">
                        <i class="fa fa-solid fa-user" style="display: flex; justify-content: center; color: #1c3347;"></i>
                        <p class="mt-2 text-center text-dark"><strong>Customer Focus: </strong>We prioritize the needs of our customers in everything we do.</p>
                    </div>
                    </div>

                <div class="col">
                    <div class="card" style="border: none;">
                       <i class="fa fa-solid fa-heart" style="display: flex; justify-content: center; color: #1c3347;"></i>
                        <p class="mt-2 text-center text-dark"><strong>Sustainability: </strong>We strive to minimize our environmental impact and promote sustainable practices.</p>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
</div>
 
<div class="container" style="font-family: 'Poppins', Sans serif; ">
    <div class="row align-items-center">
        <div class="carousel">
            <div class="carousel-track">
                <?php
                include_once 'db.php';
                $sql = "SELECT * FROM jobOffer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <article class="deconstructed-card" style="display: flex; justify-content: center; box-shadow: 5px 0px 10px 0px #aaa;">
                    <div class="card-layer card-image" >
                        <svg class="wave-svg" viewBox="0 0 300 400" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="ageGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#D9EAE6" />
                                    <stop offset="100%" stop-color="#93AFBC" />
                                </linearGradient> 
                            </defs>
                            <rect width="100%" height="100%" fill="url(#ageGradient)" />
                            <path d="M0,230 C30,220 60,240 90,230 C120,220 150,240 180,230 C210,220 240,240 270,230 C290,225 295,230 300,225 L300,400 L0,400 Z" fill="url(#waveAgeGradient1)" opacity="0.8" />
                            <path d="M0,260 C40,250 80,270 120,260 C160,250 200,270 240,260 C280,250 290,260 300,255 L300,400 L0,400 Z" fill="url(#waveAgeGradient2)" opacity="0.9" />
                            <path d="M0,290 C50,280 100,300 150,290 C200,280 250,300 300,290 L300,400 L0,400 Z" fill="#A9BFC9" opacity="0.7"/>
                        </svg>
                    </div>
                    
                    <div class="card-layer card-frame">
                    <svg viewBox="0 0 300 400" preserveAspectRatio="none">
                        <path class="frame-path" d="M 20,20 H 280 V 380 H 20 Z" />
                    </svg>
                </div>

                <div class="card-layer card-content fuji-content" >  
                    <div class="content-fragment fragment-heading">
                        <input type="hidden" value="<?= htmlspecialchars($row['job_id']) ?>">
                        <h2 class="content-text text-center" style="color: #1c3347;"><?= htmlspecialchars($row['job_title']) ?></h2>
                        <h1 class="content-subtext text-center" style="color: #1c3347;"><?= htmlspecialchars($row['job_desc']) ?></h1>
                    </div> 
                    <div class="content-fragment fragment-body">
                        <p class="content-text" style="margin-left: 1rem; font-size: 18px; color: #1c3347;"><?= htmlspecialchars($row['job_type'])?></p>
                        <p class="content-text " style="margin-left: 1rem; font-size: 18px; color: #1c3347;"><?= htmlspecialchars($row['educ_back'])?></p>
                        <p class="content-text " style="margin-left: 1rem; font-size: 18px; color: #1c3347;"><?= htmlspecialchars($row['experience'])?></p>
                    </div>
                    <div class="content-fragment fragment-cta" style="display: flex; justify-content: right; margin-bottom: .5rem; margin-right: .5rem;">
                        <a href="apply.php?job_id=<?= $row['job_id'] ?>" class="cta-link">
                            <div class="cta-box"></div> 

                        <a href="#info" class="btn btn-outline-secondary btn-sm app-btn" data-job-id="<?= $row['job_id'] ?>" 
                            style="border: #1c3347 .5px solid; border-radius: 15px; background: transparent; color: #1c3347; margin-botton: .5rem; margin-right: .5rem;">Apply now</a> 
                    </div>
                </div>
            </article> 

            <?php
                }
            }
            ?>
        </div> 

        <div class="carousel-controls" style="display: flex; justify-content: center;">
            <button class="carousel-button prev" style="background-color: #a9bfc9;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="carousel-button next" style="background-color: #a9bfc9;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button> 
        </div> 

        <div class="dots-container" style="display: flex; color: #6184ac;"></div>
    </div> 
    </div> 
</div>
  
<div class="modal-window" id="jobinfo" style="font-family: 'Poppins', Sans serif;">
    <div class="row" style="box-shadow: 15px 10px 10px 0px #93AFBC">
        <a href="#" class="modal-close text-dark" title="close">x</a>
        <div id="job-info-content">
            <p>Select job to see more info</p>
        </div>
    </div>
</div> 

<!--<div class="modal-window" id="productinfo">
    <div style="box-shadow: 5px 0px 10px 0px #aaa;">
        <a href="#" class="modal-close text-dark" title="close">x</a> 
        <div id="prod-info-content">
            <p>Select product to see more info.</p>
        </div>
    </div>
</div>-->
   
<!--<div class="card" style="border: #1c3347 .5px solid; border-radius: 20px; display: flex; box-shadow: 5px 0px 10px 0px #aaa;">
    <div class="company-profile" id="values" style="margin-right: 5rem; margin-left: 5rem">
        <h2 class="section-title" style="font-family: 'Poppins', Sans serif;">Core Values</h2>
        <p class="company-profile__text">
            <small>
                <ul class="company-profile__text" style="font-family: 'Poppins', Sans serif;">
                    <p><strong>Integrity: </strong>We conduct our business with honesty and transparency.</p>
                    <p><strong>Quality: </strong>We are committed to delivering products that meet the highest standards.</p>
                    <p><strong>Innovation: </strong>We continously seek new ways to improve our products and processes.</p>
                    <p><strong>Customer Focus: </strong>We prioritize the needs of our customers in everthing we do.</p>
                    <p><strong>Sustainability: </strong>We strive to minimize our environmental impact and promote sustainable practices.</p>
                </ul>
            </small>
        </p>        
    </div>
</div>-->

  <div class="container py-5" style="border: none; diplay: flex; justify-content: center; font-family: 'Poppins', Sans serif; margin: none;" id="contactus"> 
    <div class="row contact-section p-4" style="border-radius: 15px; box-shadow: 15px 10px 20px 10px #aaa;"> 
      <div class="col-lg-6 mb-4 mb-lg-0 d-flex flex-column justify-content-center"> 
        <h1 class="fw-bold display-6 mb-3" style="font-family: 'Poppins', Sans serif;">Get in Touch</h1>
        <p class="text-muted mb-4"> <!--change font-->
          Use our contact form for all information requests or contact us directly using the contact information below. 
          <!--<a href="#" class="text-success">data protection statement</a>-->
        </p> 
        <p class="info-text">
          Feel free to get in touch with us via email or phone:<br />
          <a href="#"><i class="fa fa-solid fa-envelope"></i> fuji-inds-m.com</a><br/>
          <a href=""><i class="fa fa-solid fa-phone"></i> +0</a>
        </p>
      </div>
 
      <div class="col-lg-6">
        <form action="LP.php" method="POST">
            <?php
            if (isset($alert)) {
                echo $alert;
            }
            ?>
          <div class="row g-3 mb-3">
            <div class="col-md-12">
                <input type="text" class="form-control border rounded" style="box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Name" name="name" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control border rounded" style="box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Email" name="email" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control border rounded" style="box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Phonenumber" name="phonenumber" required>
            </div> 
            <div class="col-md-12">
              <textarea class="form-control border rounded" rows="4" style="box-shadow: 5px 0px 10px 0px #aaa;" placeholder="Message" name="message" required></textarea>
            </div> 
            <div style="display: flex; justify-content: right;">
              <button type="submit" name="contactsubmit" class="btn btn-outline-secondary btn-sm text-dark" style="border: #1c3347 .5px solid; border-radius: 15px; 
              background-color: white; margin-bottom: .5rem; margin-right: .5rem;">Submit</button>
            </div> 
          </div> 

        </form>
      </div>
    </div>
  </div>     
 
  <!-- Map -->
<div class="company-profile text-center" style="font-family: 'Poppins', Sans serif;">
  <h2 class="section-title" >Our Location</h2> 
<div class="mapswrapper" style="display: flex; justify-content: center;">
    <iframe width="600" height="450" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=Fuji%20Industries%20Manila%20Corporation%2C%2044RH%2BHFM%2C%20Santo%20Tomas%2C%20Batangas&zoom=15&maptype=roadmap">
    </iframe>
</div>
<!-- End Map -->

</div> &nbsp
  
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


<script>
$(document).ready(function () {
    $('.app-btn').on('click', function (e) {
        e.preventDefault(); 
        const jobId = $(this).data('job-id');

        $.ajax({
            url: 'get_application_form.php',
            type: 'POST',
            data: { job_id: jobId },
            success: function (response) {
                $('#job-info-content').html(response);
                //$('#info').fadeIn();
                $('#info').fadeIn();
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

<!--<script>
    $(document).ready(function () {
        $('.prod-btn').on('click', function (e) {
            e.preventDefault();
            const prodId = $(this).data('prod_id');

            $.ajax({
                url: 'get-prod-details.php',
                type: 'POST',
                data: { prod_id: prodid },
                success: function (response) {
                    $('#prod-info-content').html(response);
                    $('productinfo').fadeIn();
                    window.location.hash = 'productinfo';
                },
                error: function () {
                    $('#prod-info-content').html('<p>Error loading product details.</p>'); 
                }
            });
        });

        $('#modal-close').on('click', function () {
            $('productinfo').fadeOut();
        });
    });
</script>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
  
  <!--Product Carousel-->
  <script>
    class Slider {
      constructor(slider) {
          this.slider = slider;
          this.display = slider.querySelector(".image-display");
          this.navButtons = Array.from(slider.querySelectorAll(".nav-button"));
          this.prevButton = slider.querySelector(".prev-button");
          this.nextButton = slider.querySelector(".next-button");
          this.sliderNavigation = slider.querySelector(".slider-navigation");
          this.currentSlideIndex = 0;
          this.preloadedImages = {};
  
          this.initialize();
      }
  
      initialize() {
          this.setupSlider();
          this.preloadImages();
          this.eventListeners();
      }
  
      setupSlider() {
          this.showSlide(this.currentSlideIndex);
      }
  
      showSlide(index) {
          this.currentSlideIndex = index;
          const navButtonImg = this.navButtons[
              this.currentSlideIndex
          ].querySelector("img");
          if (navButtonImg) {
              const imgClone = navButtonImg.cloneNode();
              this.display.replaceChildren(imgClone);
          }
          this.updateNavButtons();
      }
  
      updateNavButtons() {
          this.navButtons.forEach((button, buttonIndex) => {
              const isSelected = buttonIndex === this.currentSlideIndex;
              button.setAttribute("aria-selected", isSelected);
              if (isSelected) button.focus();
          });
      }
  
      preloadImages() {
          this.navButtons.forEach((button) => {
              const imgElement = button.querySelector("img");
              if (imgElement) {
                  const imgSrc = imgElement.src;
                  if (!this.preloadedImages[imgSrc]) {
                      this.preloadedImages[imgSrc] = new Image();
                      this.preloadedImages[imgSrc].src = imgSrc;
                  }
              }
          });
      }
  
      eventListeners() {
          document.addEventListener("keydown", (event) => {
              this.handleAction(event.key);
          });
  
          this.sliderNavigation.addEventListener("click", (event) => {
              const targetButton = event.target.closest(".nav-button");
              const index = targetButton
                  ? this.navButtons.indexOf(targetButton)
                  : -1;
              if (index !== -1) {
                  this.showSlide(index);
              }
          });
  
          this.prevButton.addEventListener("click", () =>
              this.handleAction("prev")
          );
          this.nextButton.addEventListener("click", () =>
              this.handleAction("next")
          );
      }
  
      handleAction(action) {
          if (action === "Home") {
              this.currentSlideIndex = 0;
          } else if (action === "End") {
              this.currentSlideIndex = this.navButtons.length - 1;
          } else if (action === "ArrowRight" || action === "next") {
              this.currentSlideIndex =
                  (this.currentSlideIndex + 1) % this.navButtons.length;
          } else if (action === "ArrowLeft" || action === "prev") {
              this.currentSlideIndex =
                  (this.currentSlideIndex - 1 + this.navButtons.length) %
                  this.navButtons.length;
          }
  
          this.showSlide(this.currentSlideIndex);
      }
  }
  
  const ImageSlider = new Slider(document.querySelector(".image-slider"));
  
  </script>
<!--End Product Carousel --> 

<script> 
document.addEventListener("DOMContentLoaded", () => {
	const track = document.querySelector(".carousel-track");
	const cards = document.querySelectorAll(".deconstructed-card");
	const prevBtn = document.querySelector(".carousel-button.prev");
	const nextBtn = document.querySelector(".carousel-button.next");
	const dotsContainer = document.querySelector(".dots-container");

	cards.forEach((_, index) => {
		const dot = document.createElement("div");
		dot.classList.add("dot");
		if (index === 0) dot.classList.add("active");
		dot.addEventListener("click", () => goToCard(index));
		dotsContainer.appendChild(dot);
	});

	const dots = document.querySelectorAll(".dot");

	const cardWidth = cards[0].offsetWidth;
	const cardMargin = 40;
	const totalCardWidth = cardWidth + cardMargin;

	let currentIndex = 0;

	cards.forEach((card) => {
		card.addEventListener("mousemove", (e) => {
			const rect = card.getBoundingClientRect();
			const x = (e.clientX - rect.left) / rect.width;
			const y = (e.clientY - rect.top) / rect.height;
			const xDeg = (y - 0.5) * 8;
			const yDeg = (x - 0.5) * -8;
			card.style.transform = `perspective(1200px) rotateX(${xDeg}deg) rotateY(${yDeg}deg)`;
			const layers = card.querySelectorAll(".card-layer");
			layers.forEach((layer, index) => {
				const depth = 30 * (index + 1);
				const translateZ = depth;
				const offsetX = (x - 0.5) * 10 * (index + 1);
				const offsetY = (y - 0.5) * 10 * (index + 1);
				layer.style.transform = `translate3d(${offsetX}px, ${offsetY}px, ${translateZ}px)`;
			});
			const waveSvg = card.querySelector(".wave-svg");
			if (waveSvg) {
				const moveX = (x - 0.5) * -20;
				const moveY = (y - 0.5) * -20;
				waveSvg.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.05)`;
				const wavePaths = waveSvg.querySelectorAll("path:not(:first-child)");
				wavePaths.forEach((path, index) => {
					const factor = 1 + index * 0.5;
					const waveX = moveX * factor * 0.5;
					const waveY = moveY * factor * 0.3;
					path.style.transform = `translate(${waveX}px, ${waveY}px)`;
				});
			}
			const bgObjects = card.querySelectorAll(".bg-object");
			bgObjects.forEach((obj, index) => {
				const factorX = (index + 1) * 10;
				const factorY = (index + 1) * 8;
				const moveX = (x - 0.5) * factorX;
				const moveY = (y - 0.5) * factorY;
				if (obj.classList.contains("square")) {
					obj.style.transform = `rotate(45deg) translate(${moveX}px, ${moveY}px)`;
				} else if (obj.classList.contains("triangle")) {
					obj.style.transform = `translate(calc(-50% + ${moveX}px), calc(-50% + ${moveY}px)) scale(1)`;
				} else {
					obj.style.transform = `translate(${moveX}px, ${moveY}px)`;
				}
			});
		});

		card.addEventListener("mouseleave", () => {
			card.style.transform = "";
			const layers = card.querySelectorAll(".card-layer");
			layers.forEach((layer) => {
				layer.style.transform = "";
			});
			const waveSvg = card.querySelector(".wave-svg");
			if (waveSvg) {
				waveSvg.style.transform = "";
				const wavePaths = waveSvg.querySelectorAll("path:not(:first-child)");
				wavePaths.forEach((path) => {
					path.style.transform = "";
				});
			}
			const bgObjects = card.querySelectorAll(".bg-object");
			bgObjects.forEach((obj) => {
				if (obj.classList.contains("square")) {
					obj.style.transform = "rotate(45deg) translateY(-20px)";
				} else if (obj.classList.contains("triangle")) {
					obj.style.transform = "translate(-50%, -50%) scale(0.5)";
				} else {
					obj.style.transform = "translateY(20px)";
				}
			});
		});
	});

	function goToCard(index) {
		index = Math.max(0, Math.min(index, cards.length - 1));

		currentIndex = index;
		updateCarousel();
	}

	function updateCarousel() {
		const translateX = -currentIndex * totalCardWidth;

		track.style.transform = `translateX(${translateX}px)`;

		dots.forEach((dot, index) => {
			dot.classList.toggle("active", index === currentIndex);
		});
	}

	prevBtn.addEventListener("click", () => {
		goToCard(currentIndex - 1);
	});

	nextBtn.addEventListener("click", () => {
		goToCard(currentIndex + 1);
	});

	document.addEventListener("keydown", (e) => {
		if (e.key === "ArrowLeft") {
			goToCard(currentIndex - 1);
		} else if (e.key === "ArrowRight") {
			goToCard(currentIndex + 1);
		}
	});

	let touchStartX = 0;
	let touchEndX = 0;

	track.addEventListener("touchstart", (e) => {
		touchStartX = e.changedTouches[0].screenX;
	});

	track.addEventListener("touchend", (e) => {
		touchEndX = e.changedTouches[0].screenX;
		handleSwipe();
	});

	function handleSwipe() {
		if (touchStartX - touchEndX > 50) {
			goToCard(currentIndex + 1);
		} else if (touchEndX - touchStartX > 50) {
			goToCard(currentIndex - 1);
		}
	}

	window.addEventListener("resize", () => {
		const newCardWidth = cards[0].offsetWidth;
		const newTotalCardWidth = newCardWidth + cardMargin;

		const translateX = -currentIndex * newTotalCardWidth;
		track.style.transition = "none";
		track.style.transform = `translateX(${translateX}px)`;

		setTimeout(() => {
			track.style.transition = "transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)";
		}, 50);
	});

	updateCarousel();
});

</script>
        </body>
    </html>

