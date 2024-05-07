<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="{{asset('Admin/assets/css/profile.css')}}">
  <link rel="stylesheet" href="{{asset('Admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('Admin/assets/css/font-awesome.min.css')}}">
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


<!--admin -->

<header class="header" data-header>
<div class="header-top">
  <div class="container">

    <a href="#" class="logo">
      <img src="{{asset('Admin/assets/images/logo-light.png')}}" alt="Homeverse logo">
    </a>

    <nav class="navbar" data-navbar>


      <div class="navbar-bottom">
        <ul class="navbar-list">

          <li><a href="Home" class="navbar-link" data-nav-link>Home</a></li>
          <li><button onclick="toggleAside('dashboard')" class="navbar-link" data-nav-link>Dashboard</button></li>
          <li><button onclick="toggleAside('users')" class="navbar-link" data-nav-link>Users</button></li>
          <li><button onclick="toggleAside('edit-properties')" class="navbar-link" data-nav-link>Edit Properties</button></li>
          <li><a href="AddHome"><button class="navbar-link" data-nav-link>Add Property</button></a></li>
          <li><button onclick="toggleAside('edit-properties-features')" class="navbar-link" data-nav-link>Control panel</li>
          <li><button onclick="toggleAside('profile')" class="navbar-link" data-nav-link>Profile</button></li>
          <li><button onclick="toggleAside('password-section')"class="navbar-link" data-nav-link>Change Password</button></li>
          <li><form action="Logout" method="post">@csrf<button class="navbar-link" data-nav-link type="submit">Log out</button></form></li>
          <div class="user">
            <img src="Admin/assets/images/author.jpg" alt="admin-image">
        </div>
        </ul>
      </div>

    </nav>



  </div>
</div>

<header class="aside-header">
      <h1>Admin Page</h1>
    </header>

    <aside id="dashboard" class="Profile">

      <div class="dash-content">
        <div class="cardBox">
          <div class="card">
              <div>
                  <div class="numbers">1,504</div>
                  <div class="cardName">Daily Views</div>
              </div>

              <div class="iconBx">
                  <ion-icon name="eye-outline"></ion-icon>
              </div>
          </div>

          <div class="card">
              <div>
                  <div class="numbers">{{$Payments->Count()}}</div>
                  <div class="cardName">Sales</div>
              </div>

              <div class="iconBx">
                  <ion-icon name="cart-outline"></ion-icon>
              </div>
          </div>

          <div class="card">
              <div>
                  <div class="numbers">{{$UserNumbers}}</div>
                  <div class="cardName">Number of users</div>
              </div>

              <div class="iconBx">
                  <ion-icon name="chatbubbles-outline"></ion-icon>
              </div>
          </div>

          <div class="card">
              <div>
                  <div class="numbers">${{$PaymentTotal}}</div>
                  <div class="cardName">Earning</div>
              </div>

              <div class="iconBx">
                  <ion-icon name="cash-outline"></ion-icon>
              </div>
          </div>
      </div>
      <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recently sold properties</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Payer</td>
                        <td>Type</td>
                        <td>Price</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Payments as $Payment)
                    <tr>
                        <td>{{$Payment->User_Name}}</td>
                        <td>{{$Payment->Type_name}}</td>
                        <td class="paid">{{$Payment->Cash}}</td>
                        <td><span class="status delivered">{{$Payment->PropertyStatus}}</span></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!--recent users-->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Recent Users</h2>
            </div>

            <table>
                @foreach ($UserInfo as $User)


                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="Admin/assets/images/user1.jpg" alt=""></div>
                    </td>
                    <td>
                        <h4>{{$User->User_Name}}</h4>
                    </td>
                    <td>
                      <h4>{{$User->created_at}} </h4>
                    </td>
                </tr>

                @endforeach


            </table>
        </div>
    </div>
</div>
</div>
      </div>
    </aside>

    <!-- users -->
    <aside id="users" class="Profile">
      <div class="users">

      <ul id="user-list" class="change-prof-info">
        <h1>List of Users</h1>
        @foreach($UserInfo as $User)
        <li>
          <img src="Admin/assets/images/user2.jpg" alt="User 1">
          <span class="username">{{$User->User_Name}}</span>
          <span class="useremail">{{$User->Email}}</span>
          @if($User->id != session('UserId'))
            <form action="DeleteUser" method="post">
                @csrf
                <input type="hidden" name="UserID" value="{{$User->id}}">

          <button class="delete-user-btn">Delete</button>
        </form>
        @endif
        </li>
@endforeach
{{$UserInfo->links()}}
      </ul>
      </div>
      <div class="add-delete-user">
      <div class="change-prof-info" id="add-user">
        <h2>Add Admin User</h2>
        <form id="add-user-form" method="post" action="AddAdmin">
            @csrf
          <div class="form-group">
            <input type="text" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="form-group">

            <input type="email" id="email" name="email" placeholder="E-mail" required>
          </div>
          <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Password" required>
            @error('username')
        {{$message}}
        @enderror
        @error('password')
            {{$message}}
        @enderror
        @error('email')
            {{$message}}
        @enderror
          </div>
          <button type="submit">Add User</button>
        </form>
      </div>
      <div class="change-prof-info" id="del-user">


      </div>
    </div>
  </aside>

    <!-- edit properties -->
    <aside id="edit-properties" class="Profile">
      <div class="search">
        <label>
            <input type="text" placeholder="Search here">
            <ion-icon name="search-outline"></ion-icon>
        </label>
      </div>

      <div class="my-prop-main">
        <span class="my-prop-span"><h2>Edit Properties</h2></span>
        <span class="property-date"><h4>Date</h4></span>
        <span><h4>Edit</h4></span>
        <span><h4>Delete</h4></span>
        @foreach($Property as $P)

        <div class="my-prop">



          <div class="property-image">
            <img src="{{asset('Properties/'.$P->Property_Image)}}" alt="property image">
          </div>
          <div class="property-details">
            <h3>{{$P->PropertyType->Type_name}}</h3><hr>
            <h5>{{$P->Location}}</h5><hr>
            <h5>{{$P->Phone}}</h5><hr>
            <h5>{{$P->PropertyPublisher->User_Name}}</h5><hr>
          </div>
          <div class="date-act-del">
            <div id="date-added2" class="prop-date-details">{{$P->created_at}}</div>
            <form action="Update" method="get">
                @csrf
                <input type="hidden" name="PropertyId" value="{{$P->id}}">
            <button onclick="toggleAside('edit')">Edit</button>
        </form>
            <div class="delete-button">
              <i class="fa fa-trash"></i>
            </div>
          </div>
        </div>
        @endforeach
    <hr>
{{$Property->links()}}
    </aside>
    <!-- edit property -->
    <aside id="edit" class="Profile">
      <section class="home" id="home">

        <form action="StoreProperty" method="post" class="add-form" enctype="multipart/form-data">

            <h3>Edit Property</h3>



            <div class="inputBox">
                <select name="" id="">
                    <option value="" disabled hidden selected>Sell or Rent
                    </option>
                    <option >For Rent</option>
                     <option >For Sell</option>
                </select>

        <select name="PType" id="type">
         <option value="" disabled hidden selected>Type
                    </option>
            @foreach ($PropertyType as $type)
            <option name ="Type" value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
        @endforeach
        </select>
                <input min="1" type="number" name="Price" placeholder="Price" id="">
                <input min="1" type="number" name="Bedrooms" placeholder="Bedrooms" id="">

                <input min="1" type="number" name="Bathrooms" placeholder="Bathrooms" id="">
                <input min="1" type="number" name="size" placeholder="size" id="">
                <input  type="text" name="Location" placeholder="Location" id="">

                <select name="" id="">
                    <option value="Owner" >Owner</option>
                    <option value="Mediator">Mediator</option>

                </select>
                <input min="0" type="number" name="Mobile" placeholder="Mobile">
                <input  type="text" name="Description" placeholder="Description" id="">
   <input type="file" name="imageFileInput" id="AddHomeImage" class="choose-img" onchange="getImagePreview(event)">

            <input type="submit" value="Update" class="btn">
            </div>
           <h4 style="padding-left: 25rem; padding-top: 1rem;">click below to return </h4>
            <input value="Return" type="button" class="btn" onclick="toggleAside('edit-properties')" >
        </form>
    </section>
    </aside>

   <!-- control panel -->
    <aside id="edit-properties-features" >
       <!-- start setting box -->
      <div class="setting-box">
        <div class="toggle-setting">
            <i class="fa fa-gear"></i>
        </div>
            <div class="setting-container">
                <div class="option-box">
                  <ul>
                    <h3 style="background-color: hsl(9, 100%, 62%); color: rgb(0, 0, 0); border-radius: 5px;">click to open or hide</h3><br>
                    <li><button onclick="toggleSection('edit-prop-info')">Property Information</button></li>
                    <li><button onclick="toggleSection('Add-or-Delete-Blog')">Add or Delete Blog</button></li>
                    <li><button onclick="toggleSection('Edit-Website-Contact-Information')">Edit Site Contacts</button></li>
                    <li><button onclick="toggleSection('View-Reports-or-Messages')">View Reports or Messages</button></li>
                  </ul>
                </div>
            </div>
      </div>
      <!-- end setting box -->
            <!-- control in property features -->

            <section class="home" id="edit-prop-info" style="display: flex;">
                @if (session('TypeAdded'))
                {{session('TypeAdded')}}
                @endif
            <form class="edit-property-Info" method="Post" action="AddType">
                @csrf
              <h1>Add Property Type</h1>
              <label for="Add-property-type">Add New Property Type</label>
              <input type="text" id="Add-property-type" name="AddPropertyType" placeholder="Add Property Type"><br>

              <input type="submit" value="Add">
              <input type="reset" value="Reset">
            </form>

            <form class="edit-property-Info" method="post" action="DeleteType">
                @csrf
              <h1>Delete PropertyType</h1>
              <label for="Delete-property-type">Delete Existing Property Type</label>
              <select name="PType" id="type" required>
                <option value="" disabled hidden selected>Type
                           </option>
                   @foreach ($PropertyType as $type)
                   <option name ="TypeID" value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
               @endforeach
               </select>

              <br>

              <input type="submit" value="Delete">
              <input type="reset" value="Reset">
            </form>
            @if (session('TypeDeleted'))
               {{session('TypeDeleted')}}
               @endif
          </section>

            <section class="home" id="Add-or-Delete-Blog" style="display: none;">

            <form class="edit-property-Info">
              <h1>Add or Delete Blog</h1>
              <label for="blog-title">Blog Title</label>
              <input type="text" id="blog-title" name="blog-title"><br>

              <label for="blog-content">Blog Content</label>
              <textarea id="blog-content" name="blog-content" cols="100" rows="30" ></textarea><br>
              <input type="file" name="imageFileInput" id="AddHomeImage" class="choose-img" onchange="getImagePreview(event)">
              <input type="submit" value="Add">
              <input type="submit" value="Delete">
              <input type="reset" value="Reset">
            </form>
          </section>


            <section class="home" id="Edit-Website-Contact-Information" style="display: none;">
            <form class="edit-property-Info">
              <h1>Edit Website Contact Information</h1>
              <label for="phone-number">Phone Number</label>
              <input type="tel" id="phone-number" name="phone-number"><br>

              <label for="email">Email</label>
              <input type="email" id="email" name="email"><br>

              <label for="address">Address</label>
              <input type="text" id="address" name="address"><br>

              <input type="submit" value="Update">
              <input type="reset" value="Reset">
            </form>
          </section>


            <section class="home" id="View-Reports-or-Messages" style="display: none;">
              <div class="recentCustomers">
              <div class="cardHeader">
                <h1>View Reports or Messages</h1>
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($Reports as $Report)
                <tr>
                  <td>{{$Report->Name}}</td>
                  <td>{{$Report->Email??'none'}}</td>
                  <td>{{$Report->Subject??'none'}}</td>
                  <td>{{$Report->Message??'none'}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </section>
    </aside>
   <!-- admin profile  -->
   <aside id="profile" class="Profile">

    <div class="profile-information">
      <h2>Admin Information</h2>
      <div class="owner-image">
        <img src="Admin/assets/images/author.jpg" alt="Profile Image">
      </div>
      <div class="owner-details">
        <h5>Account Owner</h5>
        <h2>{{session('UserName')}}</h2><hr>
        <h5>{{session('Email')}}</h5>
      </div>
    </div>


  </aside>
   <!-- change pass -->
    <aside id="password-section" class="Profile">

      <form class="change-pass" method="Post" action="UpdatePassword">
        @csrf
        <h2>Change Password</h2>
        <input type="password" id="old-password" name="oldpassword" placeholder="Current Password" required>
        <input type="password" id="new-password" name="newpassword" placeholder="New Password" required>

        <input type="password" id="confirm-new-password" name="confirmnewpassword" placeholder="Confirm New Password" required>
        <button type="submit">Save</button>
      </form>
      @if (session('PasswordUpdate'))
        {{session('PasswordUpdate')}}
        @endif
        @if (session('PasswordFailedUpdate'))
        {{session('PasswordFailedUpdate')}}
        @endif
        @if (session('WrongPassword'))
        {{session('WrongPassword')}}
        @endif
    </aside>

<!-- End setting box -->

  <!--
    - custom js link
  -->
  <script src="Admin/assets/js/script.js"></script>
  <script src="Admin/assets/js/profile.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
