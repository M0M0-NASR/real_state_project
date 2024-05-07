<!DOCTYPE html>

<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homeverse - Find your dream house</title>

        <!--
          - favicon
        -->
        <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

        <link rel="stylesheet" href="./assets/css/styleRent.css">
        <link rel="stylesheet" href="./assets/css/style.css">

        <!--
          - google font link
        -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
          href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">
          <script src="./assets/js/Property.js"></script>
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

              <span>{{session('UserName')??'Guest'}}</span>

            </a>
          </li>

          <li>
            <a href="#" class="header-top-link">
              <ion-icon name="location-outline"></ion-icon>

              <address>15/A,Cairo,Egypt</address>
            </a>
          </li>

        </ul>

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

          <button class="header-top-btn" @if(session('UserId')) onclick="location.href='AddHome'"@else onclick="LoginAlert()" @endif>Add Home</button>
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

          <button class="header-bottom-actions-btn" aria-label="Profile" @if(session('UserId'))onclick="location.href='Profile'" @else onclick="LoginAlert()" @endif>
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
              <div class="notifi-item" style="position: absolute">


                <div class="text" style="position: absolute">

                    @foreach ($Payments as $Payment)
                  <h4> {{$Payment->User_Name}}</h4>
                   <p>Purshased your property {{$Payment->PropertyStatus}} {{$Payment->Cash}} $ {{$Payment->Type_name}} </p>
                   @endforeach
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


<!--
   -#Rent Filter
              -->

<form id="header-bottom-bottom" method="post" action="RentFilter">
    @csrf
  <div class="filter-group">
    <label>
      Property Type
      <select id="property-type" class="property-type-class" name="PropertyType" >
<option value ="" >All</option>
        @foreach ($PropertyType as $type)
            <option value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
        @endforeach
      </select>
    </label>
  </div>

  <label class="bedrooms-label" for="bedrooms-select">Bedrooms</label>
      <select class="bedrooms-select-class" id="bedrooms-select" name="bedrooms">
          <option value="">Any</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7-or-more">7+</option>  <!-- select to view 7 beds or more than 7 -->
      </select>

  <label class="bathrooms-label" for="bathrooms-select">Bathrooms</label>
      <select id="bathrooms-select" class="bathrooms-select-class" name="bathrooms">
          <option value="">Any</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4-or-more">4+</option>  <!-- select to view 4 baths or more than 4 -->
      </select>

  <div class="amenities-filter">
    <select  name="SortFilter" id="">
        <option value="" disabled hidden selected>SortBy</option>
        <option value="created_at-asc">From Oldest to latest</option>
        <option value="Price-desc">From Highest Price to lowesr</option>
        <option value="Bedrooms-asc">low number of rooms to highest</option>
        <option value="Bedrooms-desc">Largest number of rooms to lowest</option>


 </select>

  </div>
  <label class="min-price-label" for="min-price-select">Min Price</label>
    <select id="min-price-select" class="min-price-select-class" name="MinPrice">
    <option value="">Any</option>
    <option value="500">500</option>
    <option value="1000">1000</option>
    <option value="1500">1500</option>
    <option value="2000">2000</option>
    <option value="3000">3000</option>
    <option value="10000">10000</option>
    <option value="100000">100000</option>
    </select>

<label class="max-price-label" for="max-price-select">Max Price</label>
    <select id="max-price-select" class="max-price-select-class" name="MaxPrice">
    <option value="">Any</option>
    <option value="1500">1500</option>
    <option value="2000">2000</option>
    <option value="3000">3000</option>
    <option value="4000">4000</option>
    <option value="5000">5000</option>
    <option value="6000">6000</option>
    <option value="100000">100000</option>
    <option value="500000">500000</option>
    <option value="700000">700000</option>
    <option value="1000000">1000000</option>
    <option value="7000-or-more">7000+</option>
    </select>

  <button class="find-btn" type="submit" value="Submit">Find</button>
</form>
<section class="filterb">
<div class="filter" >
    <h5 class="label">{{$ItemsNumber}} Results</h5>
      <p class="pfilter"> {{$ItemsNumber}} results</p>

</div>
</section>
        <!--
        - #PROPERTY For Rent
      -->

      <section class="property" id="property">
        <div class="container">
          <p class="section-subtitle">For Rent</p>
          <h2 class="h2 section-title">Properties For Rent</h2>
        <ul class="property-list has-scrollbar">

          <!-- Properties will be inserted here -->
          @if (session('Successful Payment'))
                  {{session('Successful Payment')}}
         @endif
         @if (session('Failed Payment'))
                  {{session('Failed Payment')}}
         @endif
          @if (session('message'))
              {{session('message')}}
          @endif
          @if(session('AddedtoFavourites'))
            {{session('AddedtoFavourites')}}
         @endif
         @if(session('NotAddedtoFavourites'))
            {{session('NotAddedtoFavourites')}}
        @endif
          <li>
            @foreach ($Property as $P)


            <div class="property-card" >
                {{$P->created_at->DiffForHumans(now())}}
                {{$P->created_at}}
              <figure class="card-banner">

                <a href="ViewProperty/{{$P->id}}">

                 <img src="{{asset('Properties/'.$P->Property_Image)}}" alt="Comfortable Apartment" class="w-100">

                  <br>

                </a>

                <div class="card-badge green">For Rent</div>


                <div class="banner-actions">

                  <button class="banner-actions-btn">
                    <ion-icon name="location"></ion-icon>

                    <address>{{$P->Location}}</address>
                  </button>

                  <button class="banner-actions-btn">
                    <ion-icon name="camera"></ion-icon>

                    <span>4</span>
                  </button>

                  <button class="banner-actions-btn">
                    <ion-icon name="film"></ion-icon>

                    <span>2</span>
                  </button>

                </div>

              </figure>

              <div class="card-content">

                <div class="card-price">
                  <strong>{{$P->Price}}</strong>/Month
                </div>
                <div class="card-price">
                    <strong>

                    </strong>
                  </div>

                <h3 class="h3 card-title">
                  <a href="ViewProperty/{{$P->id}}">{{$P->PropertyType->Type_name}}</a>
                </h3>

                <p class="card-text">
                    {{$P->Description}}.
                </p>

                <ul class="card-list">

                  <li class="card-item">
                    <strong>{{$P->Bedrooms}}</strong>

                    <ion-icon name="bed-outline"></ion-icon>

                    <span>Bedrooms</span>
                  </li>

                  <li class="card-item">
                    <strong>{{$P->Bathrooms}}</strong>

                    <ion-icon name="man-outline"></ion-icon>

                    <span>Bathrooms</span>
                  </li>

                  <li class="card-item">
                    <strong>{{$P->Area}}</strong>

                    <ion-icon name="square-outline"></ion-icon>

                    <span>Square Ft</span>
                  </li>

                </ul>

              </div>

              <div class="card-footer">

                <div class="card-author">

                  <figure class="author-avatar">
                    <img @if ($P->PropertyPublisher->UserProfileInfo->ProfileImg ??'') src="{{asset('ProfileImages/'.$P->PropertyPublisher->UserProfileInfo->ProfileImg)}}" @else src ="{{asset('AltPhotos/Person.jpg')}}"@endif
                    alt="William Seklo" class="w-100">
                  </figure>

                  <div>
                    <p class="author-name">
                      <a href="#">{{$P->PropertyPublisher->User_Name}}</a>
                    </p>

                    <p class="author-title">{{$P->PublisherType}}</p>
                  </div>

                </div>

                <div class="card-footer-actions">

                  <button class="card-footer-actions-btn">
                    <ion-icon name="resize-outline"></ion-icon>
                  </button>
                  <form @if(session('UserId')) action="AddtoFavs" @else onsubmit="LoginAlert()" @endif>
                  <input type="hidden" name="PropertyID"value="{{$P->id}}">



                  <button class="card-footer-actions-btn">
                    <ion-icon name="heart-outline"></ion-icon>
                  </button>

                </form>
                @if(!IsPurshased($P->id))  <button class="card-footer-actions-btn"  @if(session('UserId') && session('UserId') != $P->Publisher_id)onclick="location.href='Pay/{{$P->id}}'"@endif>
                    <ion-icon name="add-circle-outline"></ion-icon>
                  </button>
                  @else <b style="background-color: red">Sold Out</b>
                  @endif

                </div>

              </div>
              @if (session('UserId') ==$P->Publisher_id ||session('Admin'))


                        <form action="Update" method="get">
                            @csrf
                            <input type="hidden" name="PropertyId" value="{{$P->id}}">
                            <button type="submit">Edit</button>
                        </form>
                        <form action="DeleteProperty/{{$P->id}}" method="post" id="PropertyDelete">
                            @csrf
                            <button type="submit" id="DeleteProperty">Delete</button>
                        </form>
                        @endif
            </div>
          </li>
          <li>
            @endforeach

        </div>

        <div id="Pagination">{{$Property->links()}}</div>
      </section>

    <!--
        - #SERVICE
      -->

      <section class="service" id="service">
        <div class="container">

          <p class="section-subtitle">Our Services</p>

          <h2 class="h2 section-title">Our Main Focus</h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-1.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="#">Buy a home</a>
                </h3>

                <p class="card-text">
                  Discover your dream home with ease on our website! Browse our extensive selection of
                   properties for sale to call home.
                </p>

                <a href="#" class="card-link">
                  <span>Find A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-2.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="Rent.html">Rent a home</a>
                </h3>

                <p class="card-text">
                  Discover your dream home with ease on our website! Browse our extensive selection of
                   properties for rent to call home.
                </p>

                <a href="RentPage" class="card-link">
                  <span>Find A Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-3.png" alt="Service icon">
                </div>

                <h3 class="h3 card-title">
                  <a href="AddHome">Add Home</a>
                </h3>

                <p class="card-text">
                  Unlock the potential of your real estate with us! List your properties for sale or rent on
                   our website and reach a wider audience today.
                </p>

                <a href="AddHome" class="card-link">
                  <span>Add Home</span>

                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </a>

              </div>
            </li>

          </ul>

        </div>
      </section>

<!--
        - #BLOG
      -->

      <section class="blog" id="blog">
        <div class="container">

          <p class="section-subtitle">News & Blogs</p>

          <h2 class="h2 section-title">Leatest News Feeds</h2>

          <ul class="blog-list has-scrollbar">

            <li>
              <div class="blog-card">

                <figure class="card-banner">
                  <img src="./assets/images/blog-1.png" alt="The Most Inspiring Interior Design Of 2021" class="w-100">
                </figure>

                <div class="blog-content">

                  <div class="blog-content-top">

                    <ul class="card-meta-list">

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="person"></ion-icon>

                          <span>by: Admin</span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="pricetags"></ion-icon>

                          <span>Interior</span>
                        </a>
                      </li>

                    </ul>

                    <h3 class="h3 blog-title">
                      <a href="#">The Most Inspiring Interior Design Of 2021</a>
                    </h3>

                  </div>

                  <div class="blog-content-bottom">
                    <div class="publish-date">
                      <ion-icon name="calendar"></ion-icon>

                      <time datetime="2022-27-04">Apr 27, 2022</time>
                    </div>

                    <a href="#" class="read-more-btn">Read More</a>
                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">
                  <img src="./assets/images/blog-2.jpg" alt="Recent Commercial Real Estate Transactions" class="w-100">
                </figure>

                <div class="blog-content">

                  <div class="blog-content-top">

                    <ul class="card-meta-list">

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="person"></ion-icon>

                          <span>by: Admin</span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="pricetags"></ion-icon>

                          <span>Estate</span>
                        </a>
                      </li>

                    </ul>

                    <h3 class="h3 blog-title">
                      <a href="#">Recent Commercial Real Estate Transactions</a>
                    </h3>

                  </div>

                  <div class="blog-content-bottom">
                    <div class="publish-date">
                      <ion-icon name="calendar"></ion-icon>

                      <time datetime="2022-27-04">Apr 27, 2022</time>
                    </div>

                    <a href="#" class="read-more-btn">Read More</a>
                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">
                  <img src="./assets/images/blog-3.jpg" alt="Renovating a Living Room? Experts Share Their Secrets"
                    class="w-100">
                </figure>

                <div class="blog-content">

                  <div class="blog-content-top">

                    <ul class="card-meta-list">

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="person"></ion-icon>

                          <span>by: Admin</span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="card-meta-link">
                          <ion-icon name="pricetags"></ion-icon>

                          <span>Room</span>
                        </a>
                      </li>

                    </ul>

                    <h3 class="h3 blog-title">
                      <a href="#">Renovating a Living Room? Experts Share Their Secrets</a>
                    </h3>

                  </div>

                  <div class="blog-content-bottom">
                    <div class="publish-date">
                      <ion-icon name="calendar"></ion-icon>

                      <time datetime="2022-27-04">Apr 27, 2022</time>
                    </div>

                    <a href="#" class="read-more-btn">Read More</a>
                  </div>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>



      <!--
        - #FEATURES
      -->

      <section class="features">
        <div class="container">

          <p class="section-subtitle">Our Aminities</p>

          <h2 class="h2 section-title">Building Aminities</h2>

          <ul class="features-list">

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="car-sport-outline"></ion-icon>
                </div>

                <h3 class="card-title">Parking Space</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="water-outline"></ion-icon>
                </div>

                <h3 class="card-title">Swimming Pool</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <h3 class="card-title">Private Security</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="fitness-outline"></ion-icon>
                </div>

                <h3 class="card-title">Medical Center</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="library-outline"></ion-icon>
                </div>

                <h3 class="card-title">Library Area</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="bed-outline"></ion-icon>
                </div>

                <h3 class="card-title">King Size Beds</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <h3 class="card-title">Smart Homes</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

            <li>
              <a href="#" class="features-card">

                <div class="card-icon">
                  <ion-icon name="football-outline"></ion-icon>
                </div>

                <h3 class="card-title">Kid’s Playland</h3>

                <div class="card-btn">
                  <ion-icon name="arrow-forward-outline"></ion-icon>
                </div>

              </a>
            </li>

          </ul>

        </div>
      </section>






           <!--
        - #ABOUT
      -->

      <section class="about" id="about">
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner-1.png" alt="House interior">

            <img src="./assets/images/about-banner-2.jpg" alt="House interior" class="abs-img">
          </figure>

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">The Leading Real Estate Rental Marketplace.</h2>

            <p class="about-text">
              Over 3000 people work for us in more than 70 countries all over the This breadth of global coverage,
              combined with
              specialist services
            </p>

            <ul class="about-list">

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>

                <p class="about-item-text">Smart Home Design</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <p class="about-item-text">Beautiful Scene Around</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="wine-outline"></ion-icon>
                </div>

                <p class="about-item-text">Exceptional Lifestyle</p>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <p class="about-item-text">Complete 24/7 Security</p>
              </li>

            </ul>

            <p class="callout">
              "Enimad minim veniam quis nostrud exercitation
              llamco laboris. Lorem ipsum dolor sit amet"
            </p>

            <a href="#service" class="btn">Our Services</a>

          </div>

        </div>
      </section>





      <!--
        - #CTA
      -->

      <section class="cta">
        <div class="container">

          <div class="cta-card">
            <div class="card-content">
              <h2 class="h2 card-title">Looking for a dream home?</h2>

              <p class="card-text">We can help you realize your dream of a new home</p>
            </div>

            <button class="btn cta-btn">
              <span>Explore Properties</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </button>
          </div>

        </div>
      </section>

    </article>
  </main>


        <!--
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="Home" class="logo">
            <img src="./assets/images/logo-light.png" alt="Homeverse logo">
          </a>

          <p class="section-text">
            Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.
          </p>

          <ul class="contact-list">

            <li>
              <a href="#" class="contact-link">
                <ion-icon name="location-outline"></ion-icon>

                <address>15/A,Cairo,Egypt</address>
              </a>
            </li>

            <li>
              <a href="tel:+0123456789" class="contact-link">
                <ion-icon name="call-outline"></ion-icon>

                <span>+01114751979</span>
              </a>
            </li>

            <li>
              <a href="mailto:contact@homeverse.com" class="contact-link">
                <ion-icon name="mail-outline"></ion-icon>

                <span>{{session('Email')}}</span>
              </a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Company</p>
            </li>

            <li>
              <a href="#" class="footer-link">About</a>
            </li>

            <li>
              <a href="#" class="footer-link">Blog</a>
            </li>

            <li>
              <a href="#" class="footer-link">All Products</a>
            </li>

            <li>
              <a href="#" class="footer-link">Locations Map</a>
            </li>

            <li>
              <a href="#" class="footer-link">FAQ</a>
            </li>

            <li>
              <a href="ContactUs" class="footer-link">Contact us</a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Services</p>
            </li>

            <li>
              <a href="#" class="footer-link">Order tracking</a>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="Login" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & Conditions</a>
            </li>

            <li>
              <a href="#" class="footer-link">Promotional Offers</a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Customer Care</p>
            </li>

            <li>
              <a href="Login" class="footer-link">Login</a>
            </li>

            <li>
              <a href="#" class="footer-link">My account</a>
            </li>

            <li>
              <a href="#" class="footer-link">Wish List</a>
            </li>

            <li>
              <a href="#" class="footer-link">Order tracking</a>
            </li>

            <li>
              <a href="#" class="footer-link">FAQ</a>
            </li>

            <li>
              <a href="ContactUs" class="footer-link">Contact us</a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="Home">Homeverse</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>





  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
  <script src="./assets/js/Renting.js"></script>
  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
function LoginAlert()
{
    alert('You have to login');
}
</script>
    </body>
</html>
