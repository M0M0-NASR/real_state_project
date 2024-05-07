<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/log.css">
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/all.css">

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
          {{session('Failed')}}
          @endif
          @if(session('NoAccount'))
            {{session('NoAccount')}}
          @endif
          @if (session('NotVerified'))
              {{session('NotVerified')}}
              <a href="VerifyEmail">Verify your Email</a>
          @endif

        <form id="login" class="input-g" method="POST" action="{{Route('LoginCheck')}}">
            @csrf
        <input type="email" class="input-f" placeholder=" Email Id" name="LoginEmail" maxlength="30" required >
        <input type="password" class="input-f" placeholder="Password" name="Password" maxlength="20" required >
        <input type="checkbox" class="check"><span>Remember Password</span>
        <button type="submit"  class="submit">Log in</button>


        </form>

        @error('UserName')
        {{$message}}
        @enderror
        @error('Pwd')
            {{$message}}
        @enderror
        @error('Email')
            {{$message}}
        @enderror

        <form id="register" class="input-g" method="POST" action="{{Route('Signup')}}">
            @csrf
        <input type="text" class="input-f" name="UserName" required placeholder="User Name" maxlength="30">
        <input type="email" class="input-f" name="Email" required placeholder="enter Email" maxlength="30">
        <input type="password" class="input-f" name="Pwd" required placeholder="enter Password" maxlength="20">


        <input type="checkbox" class="check" required><span>I agree to the terms</span>
        <button type="submit"  class="submit">Register</button>


        </form>

          </div>

        </div>

    <script src="LoginCssAndJs/js.js">

    </script>


    </body>

</html>
