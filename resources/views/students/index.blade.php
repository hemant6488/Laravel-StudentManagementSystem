@extends('layouts.header')
@section('content')
				<div id="second-option">
					<a name="students">
						<div class="row header">
							<div class="col-md-12">
								<h2 align="center">Students List</h2>
							</div>
						</div>
					</a>

					<!--adding flash msg-->
					@if (Session::has('message'))
					   <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
					@endif

					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 feature">
							<strong align="center"><b>Roll Number</b></strong>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 feature">
							<strong align="center"><b>Name</b></strong>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 feature">
							<strong align="center"><b>Actions</b></strong>
						</div>
					
						<div class="row">
							@foreach ($students as $student)
								<div class="col-md-4 col-sm-4 col-xs-4 feature">
									<strong align="center">{{ $student->id }}</strong>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4 feature">
									<strong align="center"><a href="{{ route('students.show', array('id'=>$student->id)) }}">{{ $student->name }}</a></strong>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4 feature">
									<strong align="center"><a href="{{ route('students.edit', array('id'=>$student->id)) }}">Edit</a> &nbsp|&nbsp<a href="{{ route('students.destroy', array('id'=>$student->id)) }}" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a></strong>
								</div>
							@endforeach
						</div>
						<!--Paginated view links -->
						<div align="right"> {{ $students->links() }} </div>
					</div>
				</div>

				
				<div id="footer">
					<div class="container">
						<div class="row">
							<div class="col-sm-3 copyright">
								React LLC 2014
							</div>
							<div class="col-sm-6 menu">
								<ul>
				      				<li>
				          				<a>Features</a>
				        			</li>
				        			<li>
				        				<a>Services</a>
				        			</li>
				        			<li>
				          				<a>Pricing</a>
				        			</li>
				        			<li>
				          				<a>Support</a>
				        			</li>
				        			<li>
				          				<a>Blog</a>
				        			</li>
				      			</ul>
							</div>
							<div class="col-sm-3 social">
								<a href="#">
									<img src="/images/social/social-tw.png" alt="twitter" />
								</a>
								<a href="#">
									<img src="/images/social/social-dbl.png" alt="dribbble" />
								</a>					
							</div>
						</div>
					</div>
				</div>

			</div><!-- end .st-content -->
		</div><!-- end .st-pusher -->
	</div><!-- end .st-container -->

	<script src="{{ asset('js/rightslider.js') }}"></script>

	<div class="modal fade" id="demo">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      		</div>
	    	</div>
	 	 </div>
	</div>

	
</body>

@endsection