<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login</title>
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
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input type="text" id="login" class="fadeIn second" name="email" autocomplete="off" placeholder="email" required>
                    <input type="password" id="password" class="fadeIn third" name="password" autocomplete="off" placeholder="password" required>
                    <button type="submit" class="fadeIn fourth btn-black mt-3">Log In</button>
                    <br>
                    <a href="{{ route('register') }}" class="my-4 hov-border-black">Register</a>
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover text-black hov-text-black" href="{{ route('home') }}">Go to the Site</a>
                </div>

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
