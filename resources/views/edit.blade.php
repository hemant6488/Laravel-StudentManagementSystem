@extends('layouts.main')

@section('content')
<body id="signup">
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a>Edit Student</a>
				</h3>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">
						<div class="row">
							<div class="col-md-12">
								<form role="form" method="POST" action="{{ url('/edit/' . $id) }}">
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							    		<label for="name">Name</label>
							    		<input type="text" class="form-control" name="name" value="{{ $name }}" />
							    		
							  		</div>
							  		<div class="form-group">
							    		<label for="address">Address</label>
							    		<input type="textbox" class="form-control" name="address" value="{{ $address }}"/>
							  		</div>

							  		<div class="form-group">
							    		<label for="address">Gender &nbsp&nbsp&nbsp</label>
							    		@if (strcmp($gender, 'male') == 0)
							    			<input type="radio"  name="gender" value="male" id="gender" checked="checked"  />&nbsp Male    
							    			<input type="radio"  name="gender" value="female" id="gender"  />&nbsp Female
										@else
						                  	<input type="radio"  name="gender" value="male" id="gender"   />&nbsp Male    
							    			<input type="radio"  name="gender" value="female" id="gender" checked="checked" />&nbsp Female
						               	@endif
							    		
							  		</div>


							  		<div class="form-group">
							    		<label for="passing_year">Passing Year</label>
							    		<select name="passing_year" class="form-control">
							    			@if ($passing_year==2010)
							    				<option value="2010" selected="selected">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2011)
							    				<option value="2010">2010</option>
							    				<option value="2011" selected="selected">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2012)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012"  selected="selected">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2013)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013"  selected="selected">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif
											
											@if ($passing_year==2014)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014"  selected="selected">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2015)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015" selected="selected">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2016)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016" selected="selected">2016</option>
												<option value="2017">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2017)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017" selected="selected">2017</option>
												<option value="2018">2018</option>
							    			@endif

							    			@if ($passing_year==2018)
							    				<option value="2010">2010</option>
							    				<option value="2011">2011</option>
												<option value="2012">2012</option>
												<option value="2013">2013</option>
												<option value="2014">2014</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2017">2017</option>
												<option value="2018" selected="selected">2018</option>
							    			@endif
											
										</select>
							  		</div>
							  		<?php 
							  		function in_array_r($needle, $haystack, $strict = false) {//recursive function to check multidimensional array.
									    foreach ($haystack as $item) {
									        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
									            return true;
									        }
									    }

									    return false;
									}
									?>
							  		
							  		<div class="form-group">
			                            <label for="interests">Interests<br/></label></br>

			                           @if (in_array_r("Programming", $interests)) 
			                           Programming<input type="checkbox" name="interests[]" class="form-control" value="1" id="interests" checked="checked" />
			                           @else
			                           Programming<input type="checkbox" name="interests[]" class="form-control" value="1" id="interests"  />
			                           @endif


						               @if (in_array_r("Sports", $interests)) 
						               Sports<input type="checkbox" name="interests[]" class="form-control" value="3" id="interests"  checked="checked"/>
						               @else
						               Sports<input type="checkbox" name="interests[]" class="form-control" value="3" id="interests"  />
						               @endif


						               @if (in_array_r("Arts", $interests)) 
						               Arts<input type="checkbox" name="interests[]" class="form-control" value="4" id="interests" checked="checked" />
						               @else
						               Arts<input type="checkbox" name="interests[]" class="form-control" value="4" id="interests"  />
						               @endif


						               @if (in_array_r("Music", $interests)) 
						               Music<input type="checkbox" name="interests[]" class="form-control" value="2" id="interests" checked="checked" />
						               @else
						               Music<input type="checkbox" name="interests[]" class="form-control" value="2" id="interests"  />
						               @endif		                            
			                            
										
			                        </div>
			                        <div class="form-group">
			                            <div class="col-md-6 col-md-offset-4">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="fa fa-btn fa-user">Edit</i>
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

	<script type="text/javascript">
		$(function () {
			$(".already-account a").popover();
			$(".already-account a").popover('show');
		});
	</script>
</body>
@endsection