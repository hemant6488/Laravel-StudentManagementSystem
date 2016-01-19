@extends('layouts.formheader')

@section('content')
<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a>Add Student</a>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form role="form" method="POST" action="{{ url('/student/add') }}" onsubmit="return validateForm()">
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							    		<label for="name">Name</label>
							    		<input type="text" class="form-control" name="name"  required/>
							    		
							  		</div>
							  		<div class="form-group">
							    		<label for="address">Address</label>
							    		<textarea rows="5" class="form-control" name="address" required></textarea>
							  		</div>

							  		<div class="form-group">
							    		<label for="address">Gender &nbsp&nbsp&nbsp</label>
							    		<input type="radio"  name="gender" value="male" id="gender" required />&nbsp Male    
							    		<input type="radio"  name="gender" value="female" id="gender"  required/>&nbsp Female
							  		</div>

							  		<div class="form-group">
							    		<label for="passing_year">Passing Year</label>
							    		<select name="passing_year" class="form-control">
										<option value="2010">2010</option>
										<option value="2011">2011</option>
										<option value="2012">2012</option>
										<option value="2013">2013</option>
										<option value="2014">2014</option>
										<option value="2015">2015</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										</select>
							  		</div>
							  		
							  		<div class="form-group">
			                            <label for="interests">Interests<br/></label></br>
			                            @foreach ($interests as $interest)
			                            	<div class="checkbox">
			                            		<input type="checkbox" name="interests[]" value="{{ $interest->id }}" id="interests"  />{{ $interest->name }}
			                            	</div>
			                            @endforeach
			                        </div>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="fa fa-btn fa-user"></i>Add Student
			                                </button>
			                            </div>
			                        </div>
								</form>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection