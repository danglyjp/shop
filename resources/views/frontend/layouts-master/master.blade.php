<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Ansonika">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{url('frontend')}}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{url('frontend')}}/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{url('frontend')}}/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{url('frontend')}}/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="{{url('frontend')}}/css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="{{url('frontend')}}/css/style.css" rel="stylesheet">
    
    <!-- YOUR CUSTOM CSS -->
    <link href="{{url('frontend')}}/css/custom.css" rel="stylesheet">
    <link href="{{url('')}}/css/app.css" rel="stylesheet">
    @yield('head')

</head>

<body>
	
	<div id="page">
		
	@include('frontend.layouts-master.header')
	<!-- /header -->
		
    @yield('main')
		
	@include('frontend.layouts-master.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
    <x-login logintxt="Đăng nhập"/>
	<!-- COMMON SCRIPTS -->
    <script src="{{url('frontend')}}/js/common_scripts.min.js"></script>
    <script src="{{url('frontend')}}/js/main.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{url('frontend')}}/js/carousel-home.min.js"></script>

</body>
</html>