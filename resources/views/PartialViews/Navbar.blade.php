<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeverse - Find your dream house</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">


    <link rel="stylesheet" href="./assets/css/style.css">

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet">
  </head>

  <body>

    <!--
      - #HEADER
    -->

    <header class="header" data-header>

      <div class="overlay" data-overlay></div>

      <div class="header-top">
        <div class="container">

          <ul class="header-top-list">

            <li>
              <a href="mailto:info@homeverse.com" class="header-top-link">
                <ion-icon name="mail-outline"></ion-icon>

                <span>Welcome
                  {{session('UserName')}}
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="header-top-link">
                <ion-icon name="location-outline"></ion-icon>

                <address>15/A,Cairo,Egypt</address>
              </a>
            </li>

          </ul>
          <ul class="header-top-list">

              <li>
                <a href="mailto:info@homeverse.com" class="header-top-link">
                  <ion-icon name="mail-outline"></ion-icon>
                   <!--
      - #Logout
    -->
                  <span>
                      @if (session('UserName'))

                      <form action="{{Route('Logout')}}" method="post">
                          @csrf
                          <button type="submit">Logout</button>
                      </form>
                      @endif

                  </span>
                </a>
              </li>

              <li>

          <div class="wrapper">
            <ul class="header-top-social-list">

              <li>
                <a href="#" class="header-top-social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="header-top-social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="header-top-social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

            </ul>

            <button class="header-top-btn" onclick="">Add Ad</button>
          </div>

        </div>
      </div>

      <div class="header-bottom">
        <div class="container">

          <a href="Home" class="logo">
            <img src="./assets/images/logo.png" alt="Homeverse logo">
          </a>

          <nav class="navbar" data-navbar>

            <div class="navbar-top">

              <a href="Home" class="logo">
                <img src="./assets/images/logo.png" alt="Homeverse logo">
              </a>

              <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                <ion-icon name="close-outline"></ion-icon>
              </button>

            </div>

            <div class="navbar-bottom">
              <ul class="navbar-list">

                <li>
                  <a href="Home" class="navbar-link" data-nav-link>Home</a>
                </li>

                <li>
                  <a href="#about" class="navbar-link" data-nav-link>About</a>
                </li>

                <li>
                  <a href="#service" class="navbar-link" data-nav-link>Service</a>
                </li>

                <li>
                  <a href="#property" class="navbar-link" data-nav-link>Property</a>
                </li>

                <li>
                  <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
                </li>

                <li>
                  <a href="ContactUs" class="navbar-link" data-nav-link>Contact</a>
                </li>

                <li>
                  <a href="BuyPage" class="navbar-link" data-nav-link>Buy</a>
                 </li>

                 <li>
                   <a href="RentPage" class="navbar-link" data-nav-link>Rent</a>
                  </li>

              </ul>
            </div>

          </nav>

          <div class="header-bottom-actions">

            <button class="header-bottom-actions-btn" aria-label="Search" onclick="location.href='Srch'">
              <ion-icon name="search-outline"></ion-icon>

              <span>Search</span>
            </button>

            <button class="header-bottom-actions-btn" aria-label="Profile" onclick="location.href='Profile'">
              <ion-icon name="person-outline"></ion-icon>

              <span>Profile</span>
            </button>

            <button class="header-bottom-actions-btn" aria-label="Cart">
                <div class="iconn" onclick="toggleNotifi()">
                  <ion-icon class="icon" name="notifications-outline"></ion-icon>
                  <p>3</p>
                   </div>
                  <div class="notifi-box" id="boxx">
                  <h2>Notifications <span>3</span></h2>
                  <div class="notifi-item">
                      <img src="./assets/images/author3.jpg" alt="img">
                      <div class="text">
                         <h4>Elias Abdurrahman</h4>
                         <p>@lorem ipsum dolor sit amet</p>
                      </div>
                  </div>

                  <div class="notifi-item">
                      <img src="./assets/images/author2.jpg" alt="img">
                      <div class="text">
                         <h4>John Doe</h4>
                         <p>@lorem ipsum dolor sit amet</p>
                      </div>
                  </div>

                  <div class="notifi-item">
                      <img src="./assets/images/author4.jpg" alt="img">
                      <div class="text">
                         <h4>Emad Ali</h4>
                         <p>@lorem ipsum dolor sit amet</p>
                      </div>
                  </div>


                 </div>

                 <span id="notinf">Notifications</span>

                </button>


            <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu">
              <ion-icon name="menu-outline"></ion-icon>

              <span>Menu</span>
            </button>

          </div>

        </div>
      </div>

    </header>





