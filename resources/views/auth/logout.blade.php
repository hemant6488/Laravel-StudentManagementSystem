@extends('layouts.formheader')

@section('content')

<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h4>You've been successfully logged out.</h4>
			</div>
			<div class="col-md-12">
				<h4><font size= "5">Select an option to continue...</font></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
	                            <div class="col-md-6 text-center">
	                            	<a href="{{ url('/login') }}">
		                                <button type="submit" class="btn btn-primary">
		                                    <i class="fa fa-btn fa-user"></i>Login
		                                </button>
	                            	</a>
	                            </div>
	                            <div class="col-md-6 text-center">
	                            	<a href="{{ url('/register') }}">
		                                <button type="submit" class="btn btn-primary">
		                                    <i class="fa fa-btn fa-user"></i>Signup
		                                </button>
	                            	</a>
	                            </div>		            
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection