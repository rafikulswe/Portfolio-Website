<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mr. Rafi - Personal Portfolio</title>
		<meta name="description" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="keywords" content="" />
		<meta name="author" content="Rakholiyatech" />

        <link rel="shortcut icon" href="{{asset('website')}}/images/favicon.ico">

		<!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">

        <!-- Magnific-popup -->
        <link rel="stylesheet" href="{{asset('website')}}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{asset('website')}}/css/plugins.css">

        <!--SLIDER CSS-->
        <link href="{{asset('website')}}/css/owl.carousel.css" rel="stylesheet">
        <link href="{{asset('website')}}/css/owl.theme.css" rel="stylesheet">
        <link href="{{asset('website')}}/css/owl.transitions.css" rel="stylesheet">

		<!--PE-7S-ICON-->
	    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/pe-7s-icon.css" />
	    <!--PE-7S-ICON-SOCIAL-->
	    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/Pe-icon-social.css" />

	    <!--BOOTSTRAP CSS-->
		<link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/bootstrap.min.css" />

		<!-- Custom styles for this template -->
        <link href="{{asset('website')}}/css/style.css" rel="stylesheet">

	</head>
	<body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">Loading...</div>
            </div>
        </div>

        <!--Navbar Start-->
		<nav class="navbar navbar-expand-md  fixed-top navbar-custom sticky">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo text-uppercase" href="{{url()->current()}}">
                    Rafi
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="pe-7s-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-right">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#service" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#client" class="nav-link">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a href="#work" class="nav-link">Work</a>
                        </li>
                        <li class="nav-item">
                            <a href="#blog" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!--Start home-->
        <section class="section bg-home" id="home" style="background-image: url('{{asset('uploads/banners'.$allbanner->customer_image)}}')">
            <div class="home-bg-overlay"></div>
        	<div class="home-table">
	        	<div class="home-table-center">
		        	<div class="container">
		        		<div class="row justify-content-center">
		        			<div class="col-lg-12">
		        				<h1 class="home-title text-center text-white text-capitalize">I am<br>
		        					<span class="typewrite" data-period="2000" data-type='[ " Mr.Rafi.", "A Web Designer.", "UI / UX Designer.","A Web Application Developer"]'></span>
    							</h1>
		        			</div>
		        		</div>
		        	</div>
	        	</div>
        	</div>
        </section>
        <!--End home-->


				<section class="section" id="about">
				    <div class="container">
				        <div class="row justify-content-center">
				            <div class="col-lg-12 text-center">
				                <h3 class="section-title">{{(isset($allabout->title))?$allabout->title:'Under Construction'}}</h3>
				                <div class="section-title-border">
				                    <i class="pe-7s-star"></i>
				                </div>
				                <p class="text-muted pt-2 section-subtitle mx-auto">{{(isset($allabout->details))?$allabout->details:'Under Construction'}}</p>
				            </div>
				        </div>
				        <div class="row pt-5 mt-4">
				            <div class="col-lg-6 pt-2">
				                <img src="{{asset('website')}}/images/03_about.jpg" alt="" class="img-fluid mx-auto d-block">
				            </div>
				            <div class="col-lg-6 pt-2">
				                <h3>{{(isset($allabout->subtitle))?$allabout->subtitle:'Under Construction'}}</h3>
				                <p class="text-muted about-desc pt-4">{{(isset($allabout->subdetails))?$allabout->subdetails:'Under Construction'}}</p>
				                <img src="{{asset('website')}}/images/sign.png" alt="" class="img-fluid d-block">
				                <a href="#" class="btn btn-custom-outline mt-4">Download Cv</a>
				            </div>
				        </div>

				    </div>
				</section>
				<!--End About-->

				<!--Start services-->
				<section class="section bg-light" id="service">
				  <div class="container">

				      <div class="row justify-content-center">
				          <div class="col-lg-12 text-center">
				              <h3 class="section-title">Our Services</h3>
				                <div class="section-title-border">
				                    <i class="pe-7s-star"></i>
				                </div>
				                <p class="text-muted pt-2 section-subtitle mx-auto">Lorem ipsum simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. </p>
				          </div>
				      </div>

				      <div class="row pt-5 mt-4">
								@foreach($allservice as $data)
				          <div class="col-lg-4 pt-2">
				              <div class="services-boxed text-center pl-4 pr-4 pt-3 pb-3">
				                  <div class="services-icons">
				                      <i class="pe-7s-tools"></i>
				                  </div>
				                  <div class="services-content pt-3">
				                      <h5 class="">{{(isset($data->service_title))?$data->service_title:'Under Construction'}}</h5>
				                      <p class="pt-3 text-muted">{{(isset($data->service_details))?$data->service_details:'Under Construction'}}</p>
				                  </div>
				              </div>
				          </div>
									@endforeach
				      </div>
				  </div>
				</section>
				<!--End services-->

<!--Start Testimonial-->
<section class="section bg-client" id="client">
    <div class="bg-overlay"></div>
    <div class="container">
            <div class="row justify-content-center">
            	<div class="col-lg-7">
        			<div id="owl-demo" class="owl-carousel text-white">
        				@foreach($allcustomer as $data)
    					<div class="text-center">
    						<blockquote>
    						<p>
    						 Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
    							<br>
    							<em>– Client Name – Company</em>
    						</p>
    						</blockquote>
    							<div class="client-review-box mt-4">
    									<img src="{{asset('uploads/'.$data->customer_image)}}" alt="" class="rounded mx-auto d-block" width="300" height="250">
    									<div class="client-post text-center mt-4">
    											<p class="testi-user-name mb-1 text-custom"><i><b>{{(isset($data->customer_name))?$data->customer_name:'Under Construction'}}</b></i></p>
    											<p class="testi-user-work mb-0">{{(isset($data->customer_email))?$data->customer_email:'Under Construction'}}</p>
    											<p class="testi-user-work mb-0">{{(isset($data->customer_phone))?$data->customer_phone:'Under Construction'}}</p>
    									</div>
    							</div>
    					</div>  
        				@endforeach
        			</div>
            	</div>
    		</div>
    </div>
</section>
<!--End Testimonial-->

	    <!--Start Work -->
        <section class="section text-center" id="work">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h3 class="section-title">Our Work</h3>
                        <div class="section-title-border">
                            <i class="pe-7s-star"></i>
                        </div>
                        <p class="text-muted pt-2 section-subtitle mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            <!-- portfolio menu -->
            <div class="row mt-5 pt-4">
                <ul class="col list-unstyled list-inline filter-list mb-0 text-uppercase" id="filter">
					<li class="list-inline-item"><a class="active" data-filter="*">All</a></li>
						@foreach($allcategory as $data)
                    <li class="list-inline-item"><a class="" data-filter=".{{$data->category_id}}">{{$data->category_name}}</a></li>
						@endforeach
                </ul>
            </div>
            <!-- End portfolio  -->
            </div>
            <!-- Gallary -->
            <div class="container">
                <div class="row mt-4 projects-wrapper">
					@foreach($allwork as $data)
                    <div class="col-lg-4 mt-2 item-img {{$data->category}}">
                        <img src="{{asset('uploads/'.$data->image)}}" alt="image" class="img-fluid">
                        <div class="item-img-overlay">
                            <div class="v-middle">
                                <a href="{{asset('uploads/'.$data->image)}}" class="mfp-image"><span class="icon"></span></a>
                            </div>
                            <div class="overlay-info text-center">
                                <p>{{$data->about}}</p>
                            </div>
                        </div>
                    </div>
					@endforeach

                </div>
            </div>
        </section>
        <!--End Work -->

	    <!--START BLOG-->
        <section class="section bg-light" id="blog">
            <div class="container">

                <div class="row justify-content-center">
	                <div class="col-lg-12 text-center">
	                    <h3 class="section-title">Our Blog</h3>
                        <div class="section-title-border">
                            <i class="pe-7s-star"></i>
                        </div>
                        <p class="text-muted pt-2 section-subtitle mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	                </div>
	            	</div>

                <div class="row mt-5 pt-4">
									@foreach($allblog as $data)
                    <div class="col-lg-4 mt-4">
                        <div class="bg-white p-3">
                            <div>
                                <a href="#" class="blog-img">
                                    <img src="{{asset('uploads/'.$data->image)}}" alt="" class="img-fluid rounded">
                                </a>
                            </div>
                            <div class="pt-4">
                                <p class="blog-date">{{$data->created_at}} &nbsp;/&nbsp;&nbsp;<span class="text-custom text-uppercase">Money, tips, saving</span></p>
                                <h5 class="blog-title">{{$data->title}}</h5>
                                <p class="blog-subtitle text-muted pt-2">{{$data->sub_titile}}</p>
                                <a href="#" class="text-dark text-uppercase read-more">Read More ..</a>
                            </div>
                        </div>
                    </div>
										 @endforeach

                </div>
            </div>
        </section>
        <!--END BLOG-->

        <!--Start Contact-->
        <section class="section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h3 class="section-title">Contact Us</h3>
                        <div class="section-title-border">
                            <i class="pe-7s-star"></i>
                        </div>
                        <p class="text-muted pt-2 section-subtitle mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="row justify-content-center mt-4 pt-5">
                    <div class="col-lg-3">
                        <div class="text-center">
                            <div class="contact-icon">
                                <i class="pe-7s-map-marker"></i>
                            </div>
                            <div class="contact-detail">
                                <h5 class="pt-4">Address</h5>
                                <p class="w-75 mx-auto">Tajmohol Road, Mohammadpur, Dhaka.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <div class="contact-icon">
                                <i class="pe-7s-mail"></i>
                            </div>
                            <div class="contact-detail">
                                <h5 class="pt-4">Email</h5>
                                <p class="">rafikul351016@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-center">
                            <div class="contact-icon">
                                <i class="pe-7s-call"></i>
                            </div>
                            <div class="contact-detail">
                                <h5 class="pt-4">Phone</h5>
                                <p class="">+88 01729-346959</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 justify-content-center">
                    <div class="col-lg-8">
											@if(Session::has('success'))
					            <div class="alert alert-success">
					            <strong>Success!</strong> Customer Insert Successful.
					            </div>
					            @endif

                        <form class="form-custom" method="post" action="{{url('/contact')}}">
													@csrf
														<div class="form-row {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="col mt-4">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required value="{{old('name')}}">
																		<span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="col mt-4">
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" required>
																		<span class="text-danger">{{ $errors->first('email') }}</span>
																</div>
                            </div>
                            <div class="form-row {{ $errors->has('subject') ? 'has-error' : '' }}">
                                <div class="col mt-4">
                                    <input type="text" name="subject" value="{{old('subject')}}" class="form-control" placeholder="Subject">
																			<span class="text-danger">{{ $errors->first('subject') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mt-4">
                                    <textarea class="form-control" name="textarea" id="exampleFormControlTextarea1" rows="4" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col mt-4 text-right">
                                    <input type="submit" class="btn btn-custom-outline" name="send" value="Confirm Identity">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!--End Contact-->

        <!--Start footer-->
        <footer class="footer section">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <div class="text-center text-white footer-alt">
                            <ul class="list-unstyled list-inline mt-4">
                                <li class="list-inline-item"><a href="#home">Home</a></li>
                                <li class="list-inline-item"><a href="#about">About</a></li>
                                <li class="list-inline-item"><a href="#service">Services</a></li>
                                <li class="list-inline-item"><a href="#client">Clients</a></li>
                                <li class="list-inline-item"><a href="#work">Work</a></li>
                                <li class="list-inline-item"><a href="#blog">Blog</a></li>
                                <li class="list-inline-item"><a href="#contact">Contact</a></li>
																<p>&copy; Copyright | All Right Reserved Developed By Rafi {{date('Y')}}</p>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>
        </footer>
        <!--End Footer-->
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i> Top</button>

		<!-- JAVASCRIPTS -->
		<script src="{{asset('website')}}/js/jquery.min.js"></script>
		<script src="{{asset('website')}}/js/popper.min.js"></script>
		<script src="{{asset('website')}}/js/bootstrap.min.js"></script>
        <!--TESTISLIDER JS-->
        <script src="{{asset('website')}}/js/owl.carousel.min.js"></script>
		<script src="{{asset('website')}}/js/isotope.js"></script>
		<script src="{{asset('website')}}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{asset('website')}}/js/masonry.pkgd.min.js"></script>
		<script src="{{asset('website')}}/js/jquery.easing.min.js"></script>
        <script src="{{asset('website')}}/js/scrollspy.min.js"></script>
		<script src="{{asset('website')}}/js/typing.js"></script>
		<script src="{{asset('website')}}/js/custom.js"></script>


        <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>
	</body>

<!-- Mirrored from rakholiyatech.com/neil/index_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 May 2018 10:44:36 GMT -->
</html>
