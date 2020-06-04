@include('includes.home.mainHeader')
@include('includes.home.mainFooter')
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Rent IT - Vehicle Rental </title>

    
    <!--=== Vegas Min CSS ===-->
    <link href="{{URL::to('css/plugins/vegas.min.css')}}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{URL::to('css/plugins/slicknav.min.css')}}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{URL::to('css/plugins/magnific-popup.css')}}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{URL::to('css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{URL::to('css/plugins/gijgo.css')}}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{URL::to('css/font-awesome.css')}}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{URL::to('css/reset.css')}}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">
    <!--=== Bootstrap CSS ===-->
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{URL::to('css/responsive.css')}}" rel="stylesheet">

    <link href="{{URL::to('https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        @yield('header')     
    </header> 
    <!--== Header Area End ==-->

        @yield('landing') 
        @yield('about')
        @yield('content')


    <!--== Footer Area Start ==-->
    <section id="footer-area">
        @yield('footer') 
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="{{URL::to('img/scroll-top.png')}}" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="{{URL::to('js/jquery-3.2.1.min.js')}}"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="{{URL::to('js/jquery-migrate.min.js')}}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{URL::to('js/popper.min.js')}}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="{{URL::to('js/plugins/gijgo.js')}}"></script>
    <!--=== Vegas Min Js ===-->
    <script src="{{URL::to('js/plugins/vegas.min.js')}}"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{URL::to('js/plugins/isotope.min.js')}}"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="{{URL::to('js/plugins/owl.carousel.min.js')}}"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="{{URL::to('js/plugins/waypoints.min.js')}}"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="{{URL::to('js/plugins/counterup.min.js')}}"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="{{URL::to('js/plugins/mb.YTPlayer.js')}}"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="{{URL::to('js/plugins/magnific-popup.min.js')}}"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="{{URL::to('js/plugins/slicknav.min.js')}}"></script>

    <!--=== Main Js ===-->
    <script src="{{URL::to('js/main.js')}}"></script>

</body>

</html>