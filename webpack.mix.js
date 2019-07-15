let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts([
        'public/assets/vendor/jquery/jquery-3.2.1.min.js',
        'public/assets/vendor/animsition/js/animsition.min.js',
        'public/assets/vendor/bootstrap/js/popper.js',
        'public/assets/vendor/bootstrap/js/bootstrap.min.js',
        'public/assets/vendor/select2/select2.min.js',
        'public/assets/vendor/slick/slick.min.js',
        'public/assets/js/slick-custom.js',
        'public/assets/vendor/countdowntime/countdowntime.js',
        'public/assets/vendor/sweetalert/sweetalert.min.js',
        'public/assets/vendor/noui/nouislider.min.js',
        'public/assets/vendor/datatables/jquery.dataTables.min.js',
        'public/assets/vendor/datatables/dataTables.bootstrap4.min.js',
        'public/assets/js/main.js',
        'public/assets/js/preload.js',
        'public/assets/js/contents/*.js'
    ], 'public/js/app.js')
    .scripts([
        'public/assets/vendor/admin/jquery/jquery.min.js',
        'public/assets/vendor/admin/bootstrap/bootstrap.bundle.min.js',
        'public/assets/vendor/admin/metismenu/metisMenu.min.js',
        'public/assets/vendor/admin/slimscroll/jquery.slimscroll.js',
        'public/assets/vendor/admin/waves/waves.min.js',
        'public/assets/vendor/admin/sparkline/jquery.sparkline.min.js',
        'public/assets/vendor/admin/morris/morris.min.js',
        'public/assets/vendor/admin/raphael/raphael-min.js',
        'public/assets/vendor/sweetalert/sweetalert.min.js',
        'public/assets/vendor/admin/datatables/jquery.dataTables.min.js',
        'public/assets/vendor/admin/datatables/dataTables.bootstrap4.min.js',
        'public/assets/js/admin/app.js',
        'public/assets/js/admin/contents/*.js'
    ], 'public/js/admin.js')
    .styles([
        'public/assets/vendor/bootstrap/css/bootstrap.min.css',
        'public/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
        'public/assets/fonts/themify/themify-icons.css',
        'public/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css',
        'public/assets/fonts/elegant-font/html-css/style.css',
        'public/assets/vendor/animate/animate.css',
        'public/assets/vendor/css-hamburgers/hamburgers.min.css',
        'public/assets/vendor/animsition/css/animsition.min.css',
        'public/assets/vendor/select2/select2.min.css',
        'public/assets/vendor/daterangepicker/daterangepicker.css',
        'public/assets/vendor/slick/slick.css',
        'public/assets/vendor/lightbox2/css/lightbox.min.css',
        'public/assets/vendor/noui/nouislider.min.css',
        'public/assets/vendor/datatables/jquery.dataTables.min.css',
        'public/assets/css/util.css',
        'public/assets/css/main.css',
        'public/assets/css/custom.css'
    ], 'public/css/app.css')
    .styles([
        'public/assets/vendor/admin/bootstrap/bootstrap.min.css',
        'public/assets/vendor/admin/metismenu/metismenu.min.css',
        'public/assets/vendor/admin/icons/icons.css',
        'public/assets/fonts/themify-icons/themify-icons.css',
        'public/assets/fonts/ionicons/css/ionicons.css',
        'public/assets/fonts/material-design/css/materialdesignicons.css',
        'public/assets/fonts/themify-icons/themify-icons.css',
        'public/assets/fonts/typicons/typicons.min.css',
        'public/assets/fonts/fontawesome/css/fa-brands.css',
        'public/assets/fonts/fontawesome/css/fa-regular.css',
        'public/assets/fonts/fontawesome/css/fa-solid.css',
        'public/assets/fonts/fontawesome/css/fontawesome-all.css',
        'public/assets/fonts/fontawesome/css/fontawesome.css',
        'public/assets/vendor/admin/datatables/jquery.dataTables.min.css',
        'public/assets/css/admin/style.css',
        'public/assets/css/admin/custom.css',
    ], 'public/css/admin.css');
