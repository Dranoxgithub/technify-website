<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Technify's website</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Technify') }}</title>

       
        <link rel="stylesheet" href="/assets/css/main.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				
				<a href="/" class="logo">Technify</a>
				<nav class="right navbar navbar-expand-md navbar-light bg-white">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
                            @if (Request::is('register'))
							    <a href="/login" class="button alt">Log in</a>
                            @elseif (Request::is('login'))
                                <a href="/register" class="button alt">Register</a>
                            @else
                                <a href="/" class="button alt">Home</a>
                            @endif
                        </ul>
						
				</nav>
			</header>
			

		<!-- Menu -->
			<nav id="menu">
            <ul class="navbar-nav mr-auto links">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
				</li>
				
				<li class="nav-item">
                    <a class="nav-link" href="/project_listing">Projects</a>
				</li>
				<li class="nav-item">
                    <a class="nav-link" href="/about_us">About us</a>
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="/join_us">Join us</a>
                </li>
            </ul>
			</nav>

		@yield ('content')

	
		<!-- Scripts -->
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/skel.min.js"></script>
			<script src="/assets/js/util.js"></script>
            <script src="/assets/js/main.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


	</body>
</html>