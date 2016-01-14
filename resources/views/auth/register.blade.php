@extends('layouts.main')

@section('content')
<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a>Register</a>
				</h3>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form role="form" method="POST" action="{{ url('/register') }}">
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							    		<label for="name">Your name</label>
							    		<input type="text" pattern=".{3,}" title="Minimum 3 characters" class="form-control" name="name" value="{{ old('name') }}" />
							    		@if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
							  		</div>
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
							  		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			                            <label for="password_confirmation">Confirm Password</label>
			                            <input type="password" class="form-control" name="password_confirmation">

		                                @if ($errors->has('password_confirmation'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
		                                    </span>
		                                @endif
			                        </div>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="fa fa-btn fa-user"></i>Register
			                                </button>
			                            </div>
			                        </div>
								</form>
							</div>
						</div>						
					</div>
				</div>
				<div class="already-account">
					Already have an account?
					<a href="{{ URL::to('login') }}" data-toggle="popover" data-placement="top" data-content="Go to sign in!" data-trigger="manual">Sign in here</a>
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript">
		$(function () {
			$(".already-account a").popover();
			$(".already-account a").popover('show');
		});
	</script>
</body>
@endsection