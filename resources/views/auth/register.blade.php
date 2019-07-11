<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
        <title>Register</title>
    </head>
    <body>

        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first my-5">
              <img src="{{ asset('assets/images/icons/logo.png') }}" id="icon" alt="Store Logo" />
            </div>

            @if(!empty($errors->first('email')))
            <p class="text-danger">Email or password not found!</p>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
              <input type="text" class="fadeIn second" name="email" autocomplete="off" placeholder="email" required>
              <input type="text" class="fadeIn second" name="name" autocomplete="off" placeholder="name" required>
              <input type="password" class="fadeIn third" name="password" autocomplete="off" placeholder="password" required>
              <input type="password" class="fadeIn third" name="password_confirmation" autocomplete="off" placeholder="confirm password" required>
              <button type="submit" class="fadeIn fourth mb-2">Register</button>
              <br>
              <a href="{{ route('login') }}" class="my-4">Login</a>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="{{ route('home') }}">Go to the Site</a>
            </div>

          </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
