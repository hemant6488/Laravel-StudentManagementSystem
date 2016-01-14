<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Student Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link href="{{ asset('css/compiled/theme.css') }}" rel="stylesheet">

	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
	<div class="row header">
		<div class="col-md-12">
			<h3 class="logo">
				<a>Student Management System</a>
			</h3>
		</div>
	</div>
</div>
	@yield('content')
</body>
</html>