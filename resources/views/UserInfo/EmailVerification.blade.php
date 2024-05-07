<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email verification</title>
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/log.css">
    <link rel="stylesheet" type="text/css" href="LoginCssAndJs/all.css">

    </head>
<body>
    <div class="hero">
      <div class="form-box">
        <div class="button">
          <div id="dtt"></div>



          </div>
        <div class="socail">
            <img src="LoginCssAndJs/img/fb.png">
            <img src="LoginCssAndJs/img/tw.png">
            <img src="LoginCssAndJs/img/gp.png">

          </div>
          @if (session('SuccessVerify'))
          {{session('SuccessVerify')}}
      @endif

          <form id="login" class="input-g" method="post" action="VerifyEmail">

            <br>
            @csrf
            <label for="">The Verification Code  has been sent to {{session('UnverifiedEmail')??'Your Email'}}</label>
        <input type="text" class="input-f" placeholder="Verification Code" name="FormVerficationCode" maxlength="20" required >
        <button type="submit"  class="submit">Submit</button>
        @if(session('FailedVerify'))
        {{session('FailedVerify')}}
        @endif


        </form>

          </div>

        </div>

    <script src="LoginCssAndJs/js.js">

    </script>


    </body>

</html>
