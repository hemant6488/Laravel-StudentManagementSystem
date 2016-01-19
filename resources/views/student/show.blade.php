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
					   <div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif

					
					<div class="row">
						<div class="col-md-4 feature">
							<strong align="center"><b>Roll Number</b></strong>
						</div>
						<div class="col-md-4 feature">
							<strong align="center"><b>Name</b></strong>
						</div>
						<div class="col-md-4 feature">
							<strong align="center"><b>Actions</b></strong>
						</div>
					
						<div class="row">
							@foreach ($students as $student)
								<div class="col-md-4 feature">
									<strong align="center">{{ $student->id }}</strong>
								</div>
								<div class="col-md-4 feature">
									<strong align="center"><a href="{{ url('/student/view/' . $student->id) }}">{{ $student->name }}</a></strong>
								</div>
								<div class="col-md-4 feature">
									<strong align="center"><a href="{{ url('/student/edit/' . $student->id) }}">Edit</a> &nbsp|&nbsp<a href="{{ url('/student/delete/' . $student->id) }}" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a></strong>
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
				          				<a href="features.html">Features</a>
				        			</li>
				        			<li>
				        				<a href="services.html">Services</a>
				        			</li>
				        			<li>
				          				<a href="pricing.html">Pricing</a>
				        			</li>
				        			<li>
				          				<a href="support.html">Support</a>
				        			</li>
				        			<li>
				          				<a href="blog.html">Blog</a>
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
	      			<iframe src='http://player.vimeo.com/video/22439234' width='650' height='370' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	      		</div>
	    	</div>
	 	 </div>
	</div>

	
</body>

@endsection