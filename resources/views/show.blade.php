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
									<strong align="center"><a href="{{ url('/view/' . $student->id) }}">{{ $student->name }}</a></strong>
								</div>
								<div class="col-md-4 feature">
									<strong align="center"><a href="{{ url('/edit/' . $student->id) }}">Edit</a> &nbsp|&nbsp<a href="{{ url('/delete/' . $student->id) }}" onclick="return confirm('Confirm Deletion.')">Delete</a></strong>
								</div>
								    
								@endforeach
							</ol>
						</div>
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
									<img src="images/social/social-tw.png" alt="twitter" />
								</a>
								<a href="#">
									<img src="images/social/social-dbl.png" alt="dribbble" />
								</a>					
							</div>
						</div>
					</div>
				</div>

			</div><!-- end .st-content -->
		</div><!-- end .st-pusher -->
	</div><!-- end .st-container -->

	<div class="modal fade" id="demo">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body">
	      			<iframe src='http://player.vimeo.com/video/22439234' width='650' height='370' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	      		</div>
	    	</div>
	 	 </div>
	</div>

	<script type="text/javascript">
		$(function () {
			// Makes the demo video appear/disappear 
			var $demo = $("#demo");
			$('#demo').on('hidden.bs.modal', function () {
			  $demo.find("iframe").remove();
			})
			$('#demo').on('show.bs.modal', function () {
				if (!$demo.find("iframe").length) {
					$demo.find(".modal-body").append("<iframe src='http://player.vimeo.com/video/22439234' width='650' height='370' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>")
				}			  
			});

			// triggers the off-canvas panel
			$(".sidebar-toggle").click(function (e) {
				e.stopPropagation();
				$(".st-container").toggleClass("nav-effect");
			});
			$(".st-pusher").click(function () {
				$(".st-container").removeClass("nav-effect");
			});

			 // parallax header
			 $('#cover-image').css("background-position", "50% 50%");
		    $(window).scroll(function() {
				var scroll = $(window).scrollTop(), 
					slowScroll = scroll/4,
					slowBg = 50 - slowScroll;
					
				$('#cover-image').css("background-position", "50% " + slowBg + "%");
			});
		});
	</script>
</body>

@endsection