<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acttoghetto</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
        /* The image used */
        background-image: url('assets/images/landing.png');

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        }

        .btn-enter-site {
            background-color: #fff;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            bottom: 25%;
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="bg"></div>
    <a href="{{ route('home') }}">
        <img src="{{ asset('assets/images/btn-enter.png') }}" class="btn-enter-site" alt="button enter site">
    </a>
</body>
</html>
