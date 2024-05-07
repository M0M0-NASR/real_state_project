<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/log.css">
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/all.css">
    <link rel="stylesheet" href="">

    </head>
<body>
    <div class="hero">
      <div class="form-box">
        <div class="button">
          <div id="dtt"></div>
          <button type="button" onclick="login()" class="btn">Log in</button>
          <button type="button" onclick="register()"  class="btn">Register</button>

          </div>
        <div class="socail">
            <img src="LoginCssAndJs/img/fb.png">
            <img src="LoginCssAndJs/img/tw.png">
            <img src="LoginCssAndJs/img/gp.png">

          </div>

          @if (session('SuccessInput'))
          {{session('SuccessInput')}}
          @endif
          @if (session('Failed'))
          @endif
          @if(session('NoAccount'))
            {{session('NoAccount')}}
          @endif
          @if (session('NotVerified'))
              {{session('NotVerified')}}
              <a href="VerifyEmail">Verify your Email</a>
          @endif

        <form id="login" class="input-g" method="POST" action="{{route('login')}}">
            @csrf
        
            <input type="email" class="input-f" placeholder=" Email Id" name="email" maxlength="30" required >
           
            <input type="password" class="input-f" placeholder="Password" name="password" maxlength="20" required >
            
        <input type="checkbox" class="check"><span>Remember Password</span>
        <button type="submit"  class="submit">Log in</button>


        </form>

        @error('email')
        {{$message}}
        @enderror
        @error('password')
            {{$message}}
        @enderror
        @error('username')
            {{$message}}
        @enderror

        <form style="top: 177px !important" id="register" class="input-g" method="POST" action="{{Route('register')}}">
            @csrf
        <input type="text" class="input-f" name="username" required placeholder="User Name" maxlength="30">
        <input type="email" class="input-f" name="email" required placeholder="enter Email" maxlength="30">
        <input type="password" class="input-f" name="password" required placeholder="enter Password" maxlength="20">
        <input type="password" class="input-f" name="password_confirmation" required placeholder="Confirm Password" maxlength="20">


        <input type="checkbox" class="check" required><span>I agree to the terms</span>
        <button type="submit"  class="submit">Register</button>


        </form>

          </div>

        </div>

    <script src="LoginCssAndJs/js.js">

    </script>


    </body>

</html>
