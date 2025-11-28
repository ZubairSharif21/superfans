<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Superfans | Account Restricted</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Account Error - Superfans" />
	<meta name="keywords" content="suspended, deleted, user, error" />
	<meta name="author" content="Superfans" />

	    <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{ asset('error_pages/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('error_pages/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('error_pages/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('error_pages/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('error_pages/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('error_pages/css/style.css') }}">

	<script src="{{ asset('error_pages/js/modernizr-2.6.2.min.js') }}"></script>
</head>

<body>

<div id="fh5co-page">
	<br><br>
	<center>
		<a href="{{ url('/') }}">
			<img src="{{ asset('error_pages/images/Superfans Titulo-01.svg') }}" style="width:11.1em !important;">
		</a>
		<br><br>

		<h2 style="margin-left: 11px; margin-right: 11px; color: red;">⚠️ Account Access Restricted</h2>

		<h3 style="margin-left: 11px; margin-right: 11px;">
			@switch($status)
				@case('suspended')
					      {!! __('content.suspended') !!}
					@break

				@case('deleted')
				            {!! __('content.deleted') !!}
					@break

				@default
				{!! __('content.default') !!}
			@endswitch
		</h3>

		<br>
		<a href="javascript: history.go(-1)" class="btn btn-primary btn-outline">Go Back</a>
	</center>
</div>

<hr style="margin-bottom: 0px;">

<script src="{{ asset('error_pages/js/jquery.min.js') }}"></script>
<script src="{{ asset('error_pages/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('error_pages/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('error_pages/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('error_pages/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('error_pages/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('error_pages/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('error_pages/js/main.js') }}"></script>

</body>
</html>
