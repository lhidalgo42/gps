process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    mix
        /*////////////////////////////////////////////////////////////////
         || CSS Vendor scripts for the app
         ||
         *////////////////////////////////////////////////////////////////

        .styles(
        [
            'morrisjs/morris.css',
            'fullcalendar/dist/fullcalendar.min.css',
            'jquery-ui/themes/smoothness/jquery-ui.min.css',
            'datatables/media/css/jquery.dataTables.min.css',
            'datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css'
        ], 'public/css/appVendor.css', 'vendor/bower/'
    )
        /*////////////////////////////////////////////////////////////////
         || CSS fullcalendar print sripts for the app
         ||
         *////////////////////////////////////////////////////////////////

        .styles(
        [
            'fullcalendar/dist/fullcalendar.print.css'
        ], 'public/css/fullcalendar.print.css','vendor/bower/'
    )
        /*////////////////////////////////////////////////////////////////
         || CSS Login scripts
         ||
         *////////////////////////////////////////////////////////////////

        .styles(
        [
            'sb-admin-2.css',
            'dashboard.css'
        ], 'public/css/app/style.css', 'public/assets/app/css/'
    )
        .styles(
        [
            'login.css'
        ], 'public/css/login/style.css', 'public/assets/login/css/'
    )

        /*////////////////////////////////////////////////////////////////
         || CSS scripts for the App
         ||
         *////////////////////////////////////////////////////////////////
        .styles(
        [
            'bootstrap/dist/css/bootstrap.min.css',
            'metisMenu/dist/metisMenu.min.css',
            'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
            'sweetalert/dist/sweetalert.css',
            'animate.css/animate.min.css',
            'font-awesome/css/font-awesome.min.css'


        ], 'public/css/appTheme.css', 'vendor/bower/'
    );
        mix.copy(
        'vendor/bower/font-awesome/fonts', 'public/fonts'
    );


        /*////////////////////////////////////////////////////////////////
         || JS scripts for the App theme
         ||
         *////////////////////////////////////////////////////////////////
        mix.scripts(
        [
            'jquery-ui/jquery-ui.min.js',
            'metisMenu/dist/metisMenu.min.js',
            'moment/min/moment-with-locales.min.js',
            'fullcalendar/dist/fullcalendar.min.js',
            'fullcalendar/dist/lang/es.js',
            'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
            'raphael/raphael-min.js',
            'morrisjs/morris.min.js',
            'datatables/media/js/jquery.dataTables.min.js',
            'datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js',
            'gmaps/gmaps.min.js'
        ], 'public/js/appVendor.js', 'vendor/bower/'
    )
            .scripts(
            [
                'jquery/dist/jquery.min.js',
                'bootstrap/dist/js/bootstrap.min.js',
                'sweetalert/dist/sweetalert.min.js'
            ],'public/js/appTheme.js','vendor/bower/'
        )

    .scripts(
        [
            'login.js'
        ],'public/js/login/script.js','public/assets/login/js/'
    )

        .scripts(
        [
            'sb-admin-2.js'
        ],'public/js/app/appScript.js','public/assets/app/js/'
    )
        .scripts(
        [
            'bootstrap-typeahead.min.js'
        ],'public/js/typeHead.js','public/assets/app/js/'
    )


});