<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homeverse - Find your dream house</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="./assets/css/profile.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/profile.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

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

              <span>{{session('Email')}}</span>
            </a>
          </li>

          <li>
            <a href="#" class="header-top-link">
              <ion-icon name="location-outline"></ion-icon>

              <address>{{$Address->Address ??'15/A,Cairo,Egypt'}}</address>
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

          <a href="AddHome"><button class="header-top-btn">Add Home</button></a>
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
                <a href="homeverse.html#about" class="navbar-link" data-nav-link>About</a>
              </li>

              <li>
                <a href="homeverse.html#service" class="navbar-link" data-nav-link>Service</a>
              </li>

              <li>
                <a href="homeverse.html#property" class="navbar-link" data-nav-link>Property</a>
              </li>

              <li>
                <a href="homeverse.html#blog" class="navbar-link" data-nav-link>Blog</a>
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

          <button class="header-bottom-actions-btn" aria-label="Profile">
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

<!--
  profile
-->
<!-- start setting box -->
<div class="setting-box">
  <div class="toggle-setting">
    <span class="material-symbols-outlined">
        settings
        </span>
  </div>
      <div class="setting-container">
          <div class="option-box">
             <ul>
              <li><button onclick="toggleAside('dashboard')">Dashboard</button></li>
              <li><button onclick="toggleAside('profile')">Profile</button></li>
              <li><button onclick="toggleAside('change-acc-info')">Change Profile</button></li>
              <li><button onclick="toggleAside('address-details')">Address</button></li>
              <li><button onclick="toggleAside('my-properties')">My Properties</button></li>
              <li><button onclick="toggleAside('favorited-properties')">Favorited Properties</button></li>
              <li><a href="AddHome"><button>Add Property</button></a></li>
              <li><button onclick="toggleAside('payments')">Payments</button></li>
              <li><button onclick="toggleAside('password-section')">Change Password</button></li>
              <li><form method="Post" @if(session('UserId'))action="Logout"  @else action="Login" @endif>@csrf<button type="submit">@if(session('UserId'))Log out @else Login @endif</button></form></li>
             </ul>
          </div>
      </div>
</div>
<!-- end setting box -->
<header class="aside-header">
      <h1>My Account</h1>
    </header>

    <aside id="dashboard" class="Profile">
      <div class="dash">
        <h2>Hello, {{session('UserName')}}</h2>
        <h3>not your account? <a href="Home">Log out</a></h3>
      </div>
      <div class="dash-content">
        <p>Profile Details: Users can update their personal information, contact details, and preferences on their profile page.

          New Property: Users can add new properties to their account, providing details such as the address, rental price, and available amenities.

          Change Password or User Name: Users can change their login credentials on the profile page for security reasons or if they wish to use a different username.

          Payments: Users can view their payment history and make payments for their properties through the site's payment gateway.

          Maintenance Requests: Users can submit maintenance requests for their properties, which are then processed by the property management team.

          Tenant Applications: Property owners can view and manage tenant applications for their properties, including screening tenants and accepting or rejecting applications.

          Notifications: Users can receive notifications for new messages, property updates, and other important events related to their properties.</p>
      </div>
    </aside>

    <aside id="profile" class="Profile">

      <div class="profile-information">
        <h2>Profile Information</h2>
        <div class="owner-image">

          <img @if ($UserInfo->UserProfileInfo) src="{{asset('ProfileImages/'.$UserInfo->UserProfileInfo->ProfileImg)}}" @endif alt="Profile Image">
        </div>
        <div class="owner-details">
          <h5>Account Owner</h5>
          <h2>User Name : {{session('UserName')}}</h2> <hr>
          <h5>Phone :@if($UserInfo->UserProfileInfo) {{$UserInfo->UserProfileInfo->Phone}}@endif</h5><hr>
          <h5>Address : @if($UserInfo->UserProfileInfo){{$UserInfo->UserProfileInfo->Address}}@endif</h5><hr>
          <h5>E-mail</h5>
        </div>
      </div>


    </aside>

@if (session('saved'))
    {{session('saved')}}
@endif
    <aside id="change-acc-info" class="Profile">
      <form class="change-prof-info" method="POST" action="SaveProfileData" enctype="multipart/form-data" >
        @csrf
        <h2>Change Profile Information</h2>
        <!--<label for="first-name">Name</label>
        <input type="text" id="first-name" name="first-name">
        -- -->
        <label for="image">Image</label>
        <input type="file" id="image" name="image" accept="image/*;capture=camera" onchange="getImagePreview(event)" >
        <label for="phone">Phone</label>
        <input type="number" min="0" id="phone" name="phone">
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
        <!--<label for="e-mail">E-mail</label>
        <input type="email" id="e-mail" name="e-mail">
        -- -->
        <button type="submit">Save</button>

      </form>
      <div id="Preview" ></div>
      <script>function getImagePreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imageDiv = document.getElementById('Preview');
        var NewImage = document.createElement('img');
        imageDiv.innerHTML = '';
        NewImage.src = image;
        NewImage.width = 200;
         NewImage.Height = 408
        imageDiv.appendChild(NewImage);
         };</script>
    </aside>
    <aside id="address-details" class="Profile">
      <div class="address-det">
        <h2>Address</h2>
        <h3>{{$Address->Country??'No Country'}}</h3>
        <h4>{{$Address->City??'No City'}}</h4>
        <p>{{$Address->Address??'No Address'}}</p>
      </div>

      <form class="change-pass" action="SaveAddress" method="POST">
        @if (session('AddressAdded'))
            {{session('AddressAdded')}}
        @endif
        @csrf
        <h2>Change Address</h2>

        <label for="country">Country</label>
        <input type="text" id="country" name="country" required>
        <label for="city">City</label>
        <input type="text" id="city" name="city" required>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>
        <button type="submit">Save</button>
      </form>
      @error('country')
          {{$message}}
      @enderror
      @error('city')
          {{$message}}
      @enderror
      @error('address')
          {{$message}}
      @enderror
    </aside>

    <aside id="my-properties" class="Profile">
      <div class="my-prop-main">
        <span class="my-prop-span"><h2>My Properties</h2></span>
        <span class="property-date"><h4 class="datee">Date</h4></span>
        <span><h4>Actions</h4></span>
        <span><h4 class="dd">Delete</h4></span>
        @foreach ($UserProperties as $P)

        <div class="my-prop">
          <div class="property-image">
            <img src="{{asset('Properties/'.$P->Property_Image)}}" alt="property image">
          </div>
          <div class="property-details">
            <h3>{{$P->PropertyType->Type_name}}</h3><hr>
            <h5>{{$P->Location}}</h5><hr>
            <h5>{{$P->Phone}}</h5><hr>
            <h5>{{$P->Area}}</h5><hr>
          </div>
          <div class="date-act-del">
            <div id="date-added2" class="prop-date-details">{{$P->created_at}}</div>
            <form action="Update" method="get">
                @csrf
                <input type="hidden" name="PropertyId" value="{{$P->id}}">
                <button type="submit">Edit</button>
            </form>
            <div class="delete-button">
                <a href="DeleteProperty/{{$P->id}}">
              <ion-icon class="trash" name="trash-outline"></ion-icon>

            </a>
            </div>
          </div>
        </div>

        @endforeach
        <div>{{$UserProperties->links()}}</div>
    <hr>

</div>
</div>
    </aside>
    <aside id="favorited-properties" class="Profile">


      <div class="my-prop-main">
        <span class="my-prop-span"><h2>Favourite Properties</h2></span>
        <span class="property-date"><h4>Date</h4></span>
        <span><h4>Delete</h4></span>
        @foreach ($Favourites as $F)
        <div class="my-prop">

          <div class="property-image">
            <img src="{{asset('Properties/'.$F->FavouriteProperties->Property_Image)}}" alt="property image">
          </div>



          <div class="property-details">
            <h3>Property-name :{{$F->FavouriteProperties->PropertyType->Type_name}}</h3><hr>
            <h5>Address</h5><hr>
            <h5>Phone</h5><hr>
          </div>
          <div class="date-act-del">
            <div id="date-added2" class="prop-date-details2">{{$F->created_at}}</div>

            <div class="delete-button2">
              <a href="DeleteFavProperty/{{$F->id}}"> <ion-icon class="trash2" name="trash-outline"></ion-icon>
              </i></a>
            </div>
          </div>
        </div>
       @endforeach
    <hr>
    <div>{{$Favourites->links()}}</div>
  </div>
</div>
    </aside>
    <aside id="payments" class="Profile">
      <h2>Payments</h2>
      <div class="pay-coupon">
        <h3>Do you have a coupon?</h3>
        <button onclick="toggleAside('coupon')">Click here to enter your code</button>

      </div>
      @if (session('PaymentDetailedSaved'))
      {{session('PaymentDetailedSaved')}}
      @endif
      <form class="pay" method="Post" action="StorePaymentInfo">
        @csrf
        <h3>Billing Details</h3>
        <label for="Name">Name</label>
        <input type="text" id="first-name" name="UserName">
        <label for="phone">Phone</label>
        <input type="number" min="0" id="phone" name="Phone">
        <label for="address">Address</label>
        <input type="text" id="address" name="Address">
        <select name="BillingMethod" id="">
            <option value="Cash on delivery">Cash on delivery</option>
            <option value="Personal Bank Account">Personal Bank Account</option>
            <option value="PayPal">PayPal</option>
        </select>

        <button type="submit">Save</button>
    </form>
      <div class="pay-method">
        <h3>Billing Methods</h3>
        <input type="radio" id="method-1" name="method" onclick="uncheckRadios(this)">
        <label for="method-1">Cash on delivery</label>
        <input type="radio" id="method-2" name="method" onclick="uncheckRadios(this)">
        <label for="method-2">Personal Bank Account</label>
        <input type="radio" id="method-3" name="method" onclick="uncheckRadios(this)">
        <label for="method-3">PayPal</label>
      </div>
      @php
      $x =0;
      @endphp
      <div class="pay-method">
        <h3>Cart totals</h3>
        <ul>
            @foreach ($Transactions as $T)

          <li>Property ID :{{$T->Property_ID}} Cash {{$T->Cash}} Transaction Date: {{$T->created_at}}</li>
          @php
          $x += $T->Cash
          @endphp
          @endforeach
        </ul>
        <h3>order total {{$x}}</h3>
      </div>
    </aside>
    <aside id="coupon" class="Profile">
      <div class="pay">
        <h2>Enter your code</h2>
        <input type="text" required name="Coupon">
        <button type="submit">Send</button>
        <button type="submit" onclick="toggleAside('payments')">Return</button>
      </div>
    </aside>
    <aside id="password-section" class="Profile">
        @if (session('PasswordUpdate'))
        {{session('PasswordUpdate')}}
        @endif
        @if (session('PasswordFailedUpdate'))
        {{session('PasswordFailedUpdate')}}
        @endif
        @if (session('WrongPassword'))
        {{session('WrongPassword')}}
        @endif
      <form class="change-pass" method="POST" action="UpdatePassword">
        @csrf
        <h2>Change Password</h2>
        <label for="old-password">Current Password</label>
        <input type="password" id="old-password" name="oldpassword" required>
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="newpassword" required>
        <label for="confirm-new-password">Confirm New Password</label>
        <input type="password" id="confirm-new-password" name="confirmnewpassword" required>
        <button type="submit">Save</button>
      </form>
    </aside>

<!-- End setting box -->
 <!--
    - #FOOTER
  -->

@include('PartialViews.footer')
