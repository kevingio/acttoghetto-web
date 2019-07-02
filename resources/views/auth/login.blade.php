<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png') }}"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
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
                    <input type="email" id="login" class="fadeIn second" name="email" autocomplete="off" placeholder="email" required>
                    <input type="password" id="password" class="fadeIn third" name="password" autocomplete="off" placeholder="password" required>
                    <button type="submit" class="fadeIn fourth">Log In</button>
                    <br>
                    <a href="{{ route('register') }}" class="my-4">Register</a>
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="{{ route('home') }}">Go to the Site</a>
                </div>

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    </body>
</html>
