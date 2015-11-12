<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Neoguard">

    {{HTML::style('/css/appTheme.css')}}
    {{HTML::style('/css/fullcalendar.print.css',['media' => 'print'])}}
    {{HTML::style('/css/appVendor.css')}}
    {{HTML::style('/css/app/style.css')}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <style>
        .map{
            display: block;
            width: 95%;
            height: 450px;
            margin: 0 auto;
            -moz-box-shadow: 0px 5px 20px #ccc;
            -webkit-box-shadow: 0px 5px 20px #ccc;
            box-shadow: 0px 5px 20px #ccc;
        }
        .sombra{
            margin: 0 auto;
            -moz-box-shadow: 0px 5px 20px #ccc;
            -webkit-box-shadow: 0px 5px 20px #ccc;
            box-shadow: 0px 5px 20px #ccc;
        }
    </style>
    <!-- Custom Theme JavaScript -->
    {{HTML::script('//maps.google.com/maps/api/js?sensor=true')}}
    {{HTML::script('/js/appTheme.js')}}
    {{HTML::script('/js/appVendor.js')}}
    {{HTML::script('/js/typeHead.js')}}
    {{HTML::script('/js/app/appScript.js')}}
</head>

<body>
@yield('content')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-51453436-5', 'auto');
    ga('send', 'pageview');

</script>
</body>

</html>