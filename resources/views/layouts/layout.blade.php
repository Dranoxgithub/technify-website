<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse bg-inverse navbar-expand-lg navbar-custom static-top">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item active">
            <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link navbar-text" href="#">Who We Are</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-text" href="#">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-text" href="#">Our Team</a>
            </li>
            <li class="nav-item"><a class="nav-link navbar-text" href="#"> | </a></li>
            <li class="nav-item">
                <a class="nav-link navbar-text" href="">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-light navbar-text"href="">Sign Up</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
    @yield('content')


    <!-- Footer -->
    <div class="row footer" style="background-color:#9ECACC">
        <div class="col-10 d-flex p-2 flex-row flex-md-nowrap flex-wrap justify-content-between align-items-top">
            <div class="col-sm-6 p-4 footer-col-1 d-inline-flex flex-row align-items-center mr-4">
                <img class="p-2 m-2 img-fluid"src="/images/bulb.png" alt="">
                <div class="bottom-text text-left" style="line-height: 2.0;"> 
                    Technify provides pro bono tech consulting and
                    innovative digital solutions to social enterprises
                    and NGOs in Southeast Asia through a network 
                    of volunteers from U.S. colleges. 
                </div>
            </div>
            <div class="col-sm-4 p-2 footer-col-2 mt-4 text-center">
                <p class="footer-header">Contact Us</p> 
                <div>
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        Duke University, NC, USA 27705
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        technifyinitiative@gmail.com
                    </div>
                </div>
            </div>
            <div class="col-sm-2 p-2 footer-col-4 mt-4 text-center">
                <p class="footer-header">About Us</p>
                <a href="">Who We Are</a><br>
                <a href="">Projects</a><br>
                <a href="">Our Team</a><br>
            </div>
            <div class="col-sm-2 p-2 footer-col-5 mt-4 mb-4 text-center">
                <p class="footer-header">Partner With Us</p>
                <a href="">Sign Up</a><br>
                <a href="">Log In</a>
            </div>
        </div>
    </div>
    

    <!-- Script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>