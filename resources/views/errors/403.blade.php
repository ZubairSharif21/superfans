<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Superfans | 403 Access Denied</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Acceso denegado - Superfans" />

    <link rel="shortcut icon" type="image/jpg" href="https://live.superfanss.app/assets/images/SUPERHEROINA.svg"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('error_pages/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('error_pages/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('error_pages/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('error_pages/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('error_pages/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('error_pages/css/style.css')}}">
    
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=BBH+Sans+Bogle&display=swap" rel="stylesheet">

    <script src="{{asset('error_pages/js/modernizr-2.6.2.min.js')}}"></script>

    <style>
        @media only screen and (max-device-width: 600px),
        only screen and (max-device-width: 1000px) {
            #onlyMobileCSS {
                margin-left: 40px !important;
                font-family: consolas !important;
            }
        }
        
        h6 {
        
        margin-top: 1px;
        text-align: center;
        letter-spacing: -0.3;
        font-size: 18px;
        color: #333;
        /*font-family:impact, Arial, sans-serif !important;*/
        font-family: "Anton", sans-serif !important;
        font-weight: 550 !important;
        font-style: normal !important;
        }
        
        .link_logo{
            text-decoration:none !important;
            
        }
        .logo {
            margin-bottom: 5px;
            width: 8.3em !important;
        }
    </style>
</head>

<body>
<div id="fh5co-page" style="padding-top: 50px;">
    <center>
         <a class="link_logo" href="{{ url('#') }}">
       @php
    $locale = app()->getLocale(); // current app locale

    $logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    $logo = $logos[$locale] ?? 'Superworld-13.svg'; // fallback to English
@endphp

<img src="{{ url('assets/images/' . $logo) }}" alt="Supermon Logo" class="logo" />
  <h6>SUPER ADS CENTER</h6>
  </a>

        
        <h2 style="margin-left: 11px; margin-right: 11px;">Ad not available</h2>
        <h3 style="margin-left: 11px; margin-right: 11px;">
            🏢 This ad is only available to businesses.
        </h3>

        <br>
        <!--<a href="{{ url('/') }}" class="btn btn-primary btn-outline">Ir al inicio</a>-->
			<a href="javascript: history.go(-1)" class="btn btn-primary btn-outline">Back</a>

    </center>
</div>

<hr style="margin-bottom: 0px;">

<!-- JS -->
<script src="{{asset('error_pages/js/jquery.min.js')}}"></script>
<script src="{{asset('error_pages/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('error_pages/js/bootstrap.min.js')}}"></script>
<script src="{{asset('error_pages/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('error_pages/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('error_pages/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('error_pages/js/jquery.countTo.js')}}"></script>
<script src="{{asset('error_pages/js/main.js')}}"></script>
</body>
</html>
