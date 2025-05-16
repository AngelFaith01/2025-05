<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us Section</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .about-section {
      background-color: #f8f9fa;
      padding: 60px 0;
    }
    .video-box {
      background-color: #ccc;
      border-radius: 15px;
      overflow: hidden;
    }
    .video-box img {
      width: 100%;
      height: auto;
    }
    .about-content {
      background-color: #4a5c6b;
      color: #fff;
      padding: 40px;
      border-radius: 15px;
      height: 100%;
    }
    .about-content h3 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .about-content p {
      font-size: 15px;
    }
    .about-content .btn {
      background-color: #1f2c38;
      border: none;
    }
    .choose-box {
      background-color: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(0,0,0,0.05);
      height: 100%;
    }
    .choose-box h5 {
      font-weight: 700;
      margin-bottom: 30px;
    }
    .choose-item {
      margin-bottom: 25px;
    }
    .choose-item i {
      font-size: 24px;
      color: #1f2c38;
      margin-right: 10px;
    }
    .choose-item strong {
      display: block;
      font-size: 16px;
    }
  </style>
</head>
<body>

<section class="about-section">
  <div class="container">
    <div class="row gy-4">
      <!-- Left Side: Video & Tools -->
      <div class="col-lg-4">
        <div class="video-box mb-3">
          <img src="https://via.placeholder.com/400x200?text=Video+Preview" alt="video">
        </div>
        <div class="video-box">
          <img src="https://via.placeholder.com/400x200?text=Tools+Image" alt="tools">
        </div>
      </div>

      <!-- Center: About Us Content -->
      <div class="col-lg-4">
        <div class="about-content">
          <h3>About Us</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
          <a href="#" class="btn btn-primary mt-3">Learn More</a>
        </div>
      </div>

      <!-- Right Side: Why Choose Us -->
      <div class="col-lg-4">
        <div class="choose-box">
          <h5>Why Choose Us</h5>
          <div class="choose-item d-flex align-items-start">
            <i class="bi bi-award"></i>
            <div>
              <strong>23 Years Experience</strong>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus.</p>
            </div>
          </div>
          <div class="choose-item d-flex align-items-start">
            <i class="bi bi-headset"></i>
            <div>
              <strong>24/7 Support</strong>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus.</p>
            </div>
          </div>
          <div class="choose-item d-flex align-items-start">
            <i class="bi bi-shield-check"></i>
            <div>
              <strong>Industry Certified</strong>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus luctus.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
