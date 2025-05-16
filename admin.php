<!DOCTYPE html>
<head>
    
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Admin Page</title>

  <!--Link-->
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
 
  <link href="samp.css" rel="stylesheet">
  
<body>
    
<div class="app">
    <header class="app-header">
        <div class="app-header-loho">
            <div class="logo">
                <span class="logo-icon">
                    <img src="https://i.pinimg.com/236x/65/0d/9b/650d9b2b3bd16d537d0bae4d0259d050.jpg" alt="">
                </span>
                <h1 class="logo-title">
                    <span>Admin</span>
                </h1>
            </div>
        </div>

        <div class="app-header-navigation">
            <div class="tabs">
                <a href="" class="active">Feedbacks</a>
                <a href="">Applications</a>
            </div>
        </div>

        <div class="app-header-actions">
            <button class="user-profile">
                <span>User</span>
                <span>
                    <img src="https://i.pinimg.com/236x/d7/1c/e2/d71ce2982ee7a0a3d6a3168c9e964c21.jpg" alt="">
                </span>
            </button>

            <div class="app-header-actions-buttons">
          <button class="icon-button large">
            <i class="ph-magnifying-glass"></i>
          </button>
          <button class="icon-button large">
            <i class="ph-bell"></i>
          </button>
        </div>
      </div>
      <div class="app-header-mobile">
        <button class="icon-button large">
          <i class="ph-list"></i>
        </button>
      </div>

    </header>

    <div class="app-body">
        <div class="app-body-navigation">
            <nav class="navigation">
                <a href="#">
                    <i class="ph-browsers"></i>
                    <span> Dashboard</span>
                </a>
                <a href="#">
                    <i class="ph-check-square"></i>
                    <span>Feedbacks</span>
                </a>
                <a href="#">
                    <i class="ph-swap"></i>
                    <span>Applications</span>
                </a>
            </nav>

            <div class="app-body-main-content">
                <section class="service-section">
                    <h2>Feedbacks</h2>
                    <div class="service-section-header">
                        <div class="search-file">
                            <i class="ph-magnifying-glass"></i>
                            <input type="text" placeholder="Name">
                        </div>

                        <div class="dropdown-field">
                            <select>
                                <option>View</option>
                                <option>Interview</option>
                                <option>Done</option>
                                <i class="ph-caret-down"></i>
                            </select>
                        </div>

                        <button class="flat-button">Search</button>
                    </div>

                    <div class="mobile-only">
                        <button class="flat button">
                            Search
                        </button>
                    </div>
 
                    <section class="transfer-section">
                        <div class="transfer-section-header">
                            <h2>Latest Feedbacks</h2>
                            <div class="filter-options">

                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</div> 

<nav> 

</body>
</head> 
</html>