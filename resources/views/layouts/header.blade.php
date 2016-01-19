<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Student Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link href="{{ asset('css/compiled/theme.css') }}" rel="stylesheet">
	<link href="{{ asset('css/vendor/font-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/vendor/animate.css') }}" rel="stylesheet">

	<!-- javascript -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/theme.js') }}"></script>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="home3">

	<div class="st-container">

		<nav class="nav-menu">
			<h3>Menu</h3>
			<a href="{{ url('/student/add') }}" class="item">
				Add Student
			</a>
			<a href="{{ url('#students') }}" class="item">
				View Students
			</a>
			<a href="{{ URL::to('logout') }}" class="item">
				Logout
			</a>
			<div class="social">
				<a href="#">
					<i class="fa fa-twitter"></i>
				</a>
				<a href="#">
					<i class="fa fa-facebook"></i>
				</a>
				<a href="#">
					<i class="fa fa-google-plus"></i>
				</a>
				<a href="#">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>
		</nav>

		<div class="st-pusher">
			<div class="st-content">

				<header class="navbar navbar-inverse hero" role="banner">
			  		<div class="container">
			    		<div class="navbar-header">
			      			<a href="{{ url('/') }}" class="navbar-brand">Student Management</a>
			    		</div>
			    		<div class="sidebar-toggle">
			    			<div class="line"></div>
			    			<div class="line"></div>
			    			<div class="line"></div>
			    		</div>
			  		</div>
				</header>

				<div id="hero">
					<div id="cover-image" class="animated fadeIn">
						<div class="container">
							<h1 class="hero-text animated fadeIn">You are now logged in as <span class="authUsername"> {{ $authUsername }} </span></h1>
							<div class="cta animated fadeIn">
								<a href="{{ url('/student/add') }}" class="button">Add Student</a>
								<a href="{{ url('#students') }}" class="button">View Students</a>
							</div>
						</div>
					</div>
				</div>
@yield('content')