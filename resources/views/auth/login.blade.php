@extends('layouts.main')

@section('content')

<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h4>Sign in to your account.</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form role="form" method="POST" action="{{ url('/login') }}">
									{!! csrf_field() !!}
							  		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							    		<label for="email">Email address</label>
							    		<input type="email" class="form-control" name="email" value="{{ old('email') }}" />
							    		@if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
							  		</div>
							  		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							    		<label for="password">Password</label>
							    		<input type="password" class="form-control" name="password" />
							    		@if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
							  		</div>
							  		<div class="checkbox">
							    		<label>
							      			<input type="checkbox" name="remember"> Remember me
							    		</label>
							  		</div>
							  		<div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="fa fa-btn fa-user"></i>Login
			                                </button>
			                            </div>
			                        </div>
								</form>
							</div>
						</div>						
					</div>
				</div>
				<div class="already-account">
					Don't have an account?
					<a href="{{ url('/register') }}">Create one here</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection