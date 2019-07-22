<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
  </head>
<body>
          <!-- Begin page -->
          <div id="wrapper">
            @include('admin.layouts.parts.topbar')
            @include('admin.layouts.parts.sidebar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    @yield('content')
                    @include('admin.layouts.parts.modal-profile')
                    @include('admin.layouts.parts.modal-password')
                </div> <!-- content -->
                <footer class="footer">
                    © 2019 Acttoghetto
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>
