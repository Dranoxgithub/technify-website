<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@if (count(request()->segments()))
		<title>{{ ucwords(str_replace('_', ' ', request()->segment(count(request()->segments())))) }} | Technify</title>
	@else
		<title>Technify</title>
	@endif

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Script -->
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/jquery.scrolly.min.js"></script>
	<script src="/assets/js/skel.min.js"></script>
	<script src="/assets/js/util.js"></script>
	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="/assets/css/layout.css" />
	@yield('scripts')
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-custom sticky-top navbar-light shadow">
		<div class="container-fluid col-11 mx-auto">
			<a class="navbar-brand" href="/">
				<img id="navbar-logo" class="img-fluid" src="/images/Technify_logo_wordmark_long_dark.svg" alt="">
			</a>
			<!-- <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation"> -->
			<button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse float-right" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<!-- <li class="nav-item">
						<a class="nav-link" href="/project_listing">Projects</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="/about_us">Our Team</a>
					</li>
					<!-- <li class="nav-item d-none d-lg-block">
						<a class="nav-link hor-vector"> | </a>
					</li> -->
					<hr class="w-100 d-lg-none">
					<!-- @guest

						@if (Request::is('register'))
							<li class="nav-item">
								<a class="nav-link" href="/login">Log in</a>
							</li>                        
						@elseif (Request::is('login'))
							<li class="nav-item">
								<a class="nav-link btn btn-light" href="/register">Sign Up</a>
							</li>                        
						@else
							<li class="nav-item">
								<a class="nav-link" href="/login">Log in</a>
							</li>
							<li class="nav-item">
								<a class="nav-link btn btn-light sign-up pb-1" href="/register">Sign Up</a>
							</li> -->
						@endif
								
						@else
							<!-- @if (Auth::user()->ngo != null)
								@if (Request::is('NGO_project_index') or Request::is('project_listing'))
									<li class="button-wrapper">
									<a href="/NGO_project_new" class="button">+ Add Project</a>
									</li>
								@endif
							@endif -->
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

									@if (Auth::user()->type == "student")
										<a class="dropdown-item" href="/student">Profile</a>
									@elseif (Auth::user()->type == "NGO")
										<a class="dropdown-item" href="/NGO">Dashboard</a>
									@endif  
									<a class="dropdown-item" id="log-out" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
							
						@endguest
				</ul>
			</div>
		</div>
	</nav>

	@if(Session::has('message'))
	<div class="alert-wrapper">
		<div class="alert alert-success fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('message') }}
		</div>
	</div>
	@endif

	
	@yield('content')

	<div class="body-height-grower"></div>

	<!-- Footer -->

<footer style="background-color:#9ECACC">
		<div class="container-fluid">
			<div class="row flex-row flex-md-nowrap flex-wrap justify-content-between align-items-top my-5 mx-4">
				<div class="col-lg-3 col-sm-2 d-none d-md-inline-flex footer-col-1 flex-row align-items-center ml-xl-5">
					<img class="p-2 m-2" src="/images/Technify_logo_wordmark_small_dark.svg" alt="" style="width:70px; height:auto;">
					<div class="col-md-9 bottom-text text-left"> 
						Technify provides pro bono tech consulting and
						innovative digital solutions to social enterprises
						and NGOs in Southeast Asia through a network 
						of volunteers from U.S. colleges. 
					</div>
				</div>
				<div class="col-md-3 p-2 footer-col-2 my-4 mx-lg-4">
					<p class="footer-header">Contact Us</p> 
					<div class="d-flex flex-column flex-wrap">
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
								<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
							</svg>
							Duke University, NC, USA 27705
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
							</svg>
							<a href="mailto:technify.studentoutreach@gmail.com" style="color:#26484A;">Students: technify.studentoutreach@gmail.com</a>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
							</svg>
							<a href="mailto:technifyinitiative@gmail.com" style="color:#26484A;">NGO Partners: technifyinitiative@gmail.com</a>
						</div>
					</div>
				</div>
				<div class="col-md-1 d-none d-md-block mt-4 footer-col-3">
					<img class="image-fluid mx-auto footer-col-3-img" src="/images/vertical_vector.png" alt="">
				</div>
				<div class="col-md-2 d-none d-md-block p-2 footer-col-4 mt-4">
					<p class="footer-header">About Us</p>
					<a href="/#Projects">Projects</a><br>
					<a href="/about_us">Our Team</a><br>
				</div>
				<!-- <div class="col-md-3 d-none d-md-block p-2 footer-col-5 my-4">
					<p class="footer-header">Partner With Us</p>
					<a href="/register">Sign Up</a><br>
					<a href="/login">Log In</a>
				</div> -->
			</div>
		</div>
    {{-- <section class="container-fluid" style="">
        <div class="row footer" style="background-color:#9ECACC;">
            <div class="col-10 d-flex pl-sm-5 p-2 pb-5 pt-4 flex-row flex-md-nowrap flex-wrap justify-content-between align-items-top">
                <div class="col-sm-4 p-2 footer-col-1 flex-row align-items-center mr-5 ml-5">
                    <img class="p-2 m-2 img-fluid footer-img"src="/images/bulb.png" alt="">
                    <div class="bottom-text text-left"> 
                        Technify provides pro bono tech consulting and
                        innovative digital solutions to social enterprises
                        and NGOs in Southeast Asia through a network 
                        of volunteers from U.S. colleges. 
                    </div>
                </div>
                <div class="col-sm-3 p-2 footer-col-2 mt-4 ml-sm-3 text-left">
                    <p class="footer-header">Contact Us</p> 
                    <div>
                        <div class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            Duke University, NC, USA 27705
                        </div>
                        <div class="d-flex d-inline-flex align-items-center justify-content-around">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                            <div class="ml-1" style="color:#26484A;">technifyinitiative@gmail.com</div> 
                        </div>
                    </div>
                </div>
				<div class="p-2 pr-5 mt-4 footer-col-3 mx-5">
					<img class="image-fluid" src="/images/vertical_vector.png" alt="">
				</div>
                <div class="col-sm-2 p-2 pl-4 footer-col-4 mt-4 ml-5 text-left">
                    <p class="footer-header">About Us</p>
                    <a class="" href="">Who We Are</a><br>
                    <a class="" href="">Projects</a><br>
                    <a class="" href="">Our Team</a><br>
                </div>
                <!-- <div class="col-sm-2 p-2 footer-col-5 mt-4 mb-4 text-left">
                    <p class="footer-header">Partner With Us</p>
                    <<a href="">Sign Up</a><br>
                    <a href="">Log In</a>
                </div>  -->
            </div>
        </div>
    </section> --}}



</body>
</html>