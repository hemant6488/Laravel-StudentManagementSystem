@extends('layouts.formheader')

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
								<form role="form" method="POST" action="{{ route('students.update', array('id'=>$student->id)) }}">
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							    		<label for="name">Name</label>

							    		<input type="text" class="form-control" name="name" value="<?php echo ($try)? old('name') : $student->name; ?>" required/>
							    		@if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
							  		</div>
							  		<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							    		<label for="address">Address</label>
							    		<textarea rows="5" class="form-control" name="address" required><?php echo ($try)? old('address') : $student->address; ?></textarea>
							    		@if ($errors->has('address'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('address') }}</strong>
		                                    </span>
		                                @endif
							  		</div>

							  		<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
							    		<label for="address">Gender &nbsp&nbsp&nbsp</label>
							    		<input type="radio"  name="gender" value="male" <?PHP echo ($try)? ((old('gender') == 'male')? 'checked': '') : (($student->gender == 'male')? 'checked': ''); ?> required/>&nbsp Male
							    		<input type="radio"  name="gender" value="female" <?PHP echo ($try)? ((old('gender') == 'female')? 'checked': '') : (($student->gender == 'female')? 'checked': ''); ?> required/>&nbsp Female							    
							  			@if ($errors->has('gender'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('gender') }}</strong>
		                                    </span>
		                                @endif
							  		</div>
							  		<div class="form-group{{ $errors->has('passing_year') ? ' has-error' : '' }}">
							    		<label for="passing_year">Passing Year</label>
							    		<select name="passing_year" class="form-control">
							    				<option value="2010" <?PHP echo ($try)? ((old('passing_year') == 2010)?'selected': '') : (($student->passing_year == 2010)? 'selected': ''); ?>>2010</option>
							    				<option value="2011" <?PHP echo ($try)? ((old('passing_year') == 2011)?'selected': '') : (($student->passing_year == 2011)? 'selected': ''); ?>>2011</option>
												<option value="2012" <?PHP echo ($try)? ((old('passing_year') == 2012)?'selected': '') : (($student->passing_year == 2012)? 'selected': ''); ?>>2012</option>
												<option value="2013" <?PHP echo ($try)? ((old('passing_year') == 2013)?'selected': '') : (($student->passing_year == 2013)? 'selected': ''); ?>>2013</option>
												<option value="2014" <?PHP echo ($try)? ((old('passing_year') == 2014)?'selected': '') : (($student->passing_year == 2014)? 'selected': ''); ?>>2014</option>
												<option value="2015" <?PHP echo ($try)? ((old('passing_year') == 2015)?'selected': '') : (($student->passing_year == 2015)? 'selected': ''); ?>>2015</option>
												<option value="2016" <?PHP echo ($try)? ((old('passing_year') == 2016)?'selected': '') : (($student->passing_year == 2016)? 'selected': ''); ?>>2016</option>
												<option value="2017" <?PHP echo ($try)? ((old('passing_year') == 2017)?'selected': '') : (($student->passing_year == 2017)? 'selected': ''); ?>>2017</option>
												<option value="2018" <?PHP echo ($try)? ((old('passing_year') == 2018)?'selected': '') : (($student->passing_year == 2018)? 'selected': ''); ?>>2018</option>
										</select>
										@if ($errors->has('passing_year'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('passing_year') }}</strong>
		                                    </span>
		                                @endif
							  		</div>

							  		<div class="form-group">
			                           	<label for="interests">Interests<br/></label></br>
			                           	@if ($try==0)
				                           	@foreach ($interestsTable as $interestT)
				                           		<div class="checkbox">
					                           		@if (strpos($studentInterests, $interestT->name) !== false) 
					                            		<input type="checkbox" name="interests[]" value="{{ $interestT->id }}" id="interests" checked="checked" />{{ $interestT->name }}
					                            	@else
					                            		<input type="checkbox" name="interests[]" value="{{ $interestT->id }}" id="interests"  />{{ $interestT->name }}
					                            	@endif
					                            </div>
				                            @endforeach
				                        @elseif ($try==1)
				                        	<?php 
				                        		if(empty(old('interests'))){
				                        			$oldIntr = 'empty';
				                        		}else{
				                        			$oldIntr = implode(',', old('interests')); 
				                        		}
				                        		
				                        	?>
				                        	@foreach ($interestsTable as $interestT)
				                           		<div class="checkbox">
					                           		@if (strpos($oldIntr, (string) $interestT->id) !== false) 
					                            		<input type="checkbox" name="interests[]" value="{{ $interestT->id }}" id="interests" checked="checked" />{{ $interestT->name }}
					                            	@else
					                            		<input type="checkbox" name="interests[]" value="{{ $interestT->id }}" id="interests"  />{{ $interestT->name }}
					                            	@endif
					                            </div>
				                            @endforeach
				                        @endif

			                        </div>
			                        <div class="form-group">
			                            <div class="col-md-12 text-center">
			                                <button type="submit" class="btn btn-primary">
			                                    <i class="fa fa-btn fa-user"></i>Update Student
			                                </button>
			                            </div>
			                        </div>
								</form>
							</div>
						</div>						
					</div>
				</div>
				<div class="already-account">
				</div>
			</div>
		</div>
	</div>
</body>
@endsection