@extends('layouts.main')

@section('content')
<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a>View Student</a>
				</h3>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<form role="form" method="POST" action="{{ url('/edit/' . $id) }}">
							{!! csrf_field() !!}
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<label for="name">Roll No: </label>
									</div>
									<div class="col-md-6">
							    		{{ $id }}
							    	</div>
								</div>
							</div>    
							<div class="row">
								<div class="col-md-12">   	
							    	<div class="col-md-6">
							    		<label for="name">Name: </label>
							    	</div>
							    	<div class="col-md-6">
							    		{{ $name }}
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">   	
							    	<div class="col-md-6">
							    		<label for="name">Address: </label>
							    	</div>
							    	<div class="col-md-6">
							    		{{ $address }}
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">   	
							    	<div class="col-md-6">
							    		<label for="name">Gender: </label>
							    	</div>
							    	<div class="col-md-6">
							    		{{ $gender }}
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">   	
							    	<div class="col-md-6">
							    		<label for="name">Passing Year: </label>
							    	</div>
							    	<div class="col-md-6">
							    		{{ $passing_year }}
							    	</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">   	
							    	<div class="col-md-6">
							    		<label for="name">Interests: </label>
							    	</div>
							    	<div class="col-md-6">
							    		@foreach($interests as $int)
							    			{{ $int['name'] }}, 
							    		@endforeach
							    	</div>
								</div>
							</div>
						</form>						
					</div>
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