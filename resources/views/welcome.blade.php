@extends('layouts.layout')

@section('content')

<section class="sec-1 container-fluid">
    <div class="row justify-content-center" style="background-color:#429993;">
        <div class="d-flex flex-row m-4 p-2  justify-content-center">
            <div class="col-md-8 p-2 text-center" style="font-family: Apercu;">
                <h1 class="mt-4">Transform and empower with tech</h1>
                <p style="line-height: 1.6">
                    We provide pro bono tech consulting and innovative digital solutions by connecting 
                    top tech talents at U.S. colleges with social enterprises and NGOs in Southeast Asia
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <img id="intro-img" class="intro-img img-fluid mb-5" src="/images/intro.png" alt="">
    </div>
</section>

{{-- Workflow --}}

<section class="sec-2 container-fluid">
    <div class="row justify-content-center">
        <div class="text-left col-sm-8 m-4 mb-5 pr-0">
            <h2 class="p-sm-2 m-sm-2">
                We help Southeast Asian changemakers overcome obstacles
                to sustainable change. Here’s how it works.
            </h2>
        </div>
        <div class="pt-4 d-flex col-sm-10 flex-row flex-md-nowrap flex-wrap justify-content-between">
            <div class="p-2 text-center">
                <img class="p-2 profile-img" src="/images/profile.png" alt="">
                <div class="d-flex flex-column flex-nowrap align-items-center">
                    <h5 class="pt-3">Create Your Profile</h5>
                    <p class="col-sm-10 text-left pr-sm-0 pl-sm-4 ml-sm-3">
                        Sign up to volunteer as a student 
                        developer or apply as a non-profit 
                        organization to submit new projects
                    </p>
                </div>
            </div>
            <div class="p-2 text-center">
                <img class="p-2 match-img" src="/images/match.png" alt="">
                <div class="d-flex flex-column flex-nowrap align-items-center">
                    <h5 class="pt-3">Find Your Match</h5>
                    <p class="col-sm-10 text-left pr-sm-0 pl-sm-4 ml-sm-3">
                        Our team will match student developers
                        with NGOs/social enterprises based on 
                        their interests and values.
                    </p> 
                </div>
            </div>
            <div class="p-2 text-center mb-5">
                <img class="p-2 serve-img" src="/images/serve.png" alt="">
                <div class="d-flex flex-column flex-nowrap align-items-center">
                    <h5 class="pt-3">Serve and Contribute</h5>
                    <p class="col-sm-10 text-left pr-sm-0 pl-sm-4 ml-sm-3">
                        Students will consult with their partner 
                        organization to develop digital solutions
                        based on their project specifications
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Featured Projects --}}

<section id="Projects" class="sec-3 container-fluid p-2 pt-sm-4 pb-sm-4" style="background-color: #F4F4F4">
    <div class="row justify-content-center">
        <div class="col-sm-9 m-3">
            <h2 class="">Featured Projects</h2>
        </div>
        <div class="d-flex flex-row flex-md-nowrap flex-wrap justify-content-center p-2">
            {{-- add blade logic for all featured projects --}}
            <div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5">
                <a href="https://www.thelostfoodproject.org/" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
                <div class="card-body p-2 m-4">
                    <h5 class="card-title"><a href="https://www.thelostfoodproject.org/" target="_blank" style="color:#26484A;">The Lost Food Project</a></h5>
                    <p class="card-text">
                        A centralized donation application with the aims of onboarding and 
                        engaging with more potential food donors by streamlining the process
                        of collecting food donations for neighborhood grocers.
                    </p>
                    {{-- <a class="text-right" href="">See Details —></a> --}}
                </div> 
            </div>
            <div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5">
                <a href="https://pertiwi.org.my/" target="_blank"><img class="card-img-top" src="/images/pertiwi_cover_card.png" alt=""></a>
                <div class="card-body p-2 m-4">
                    <h5 class="card-title"><a href="https://pertiwi.org.my/" target="_blank" style="color:#26484A;">Pertiwi Soup Kitchen</a></h5>
                    <p class="card-text">
                        A dynamic website with backend controls to manage operations
                        was built to create a stronger online presence for PSK, reach more
                        beneficiaries, and digitalize the onboarding of volunteers.
                    </p>
                    {{-- <a href="">See Details —></a> --}}
                </div> 
            </div>
        </div>
    </div>
</section>

{{-- Sponsors --}}

<section class="sec-4 container-fluid">
    <div class="row align-middle justify-content-center">
        <div class="col-8 p-2 mb-3 mt-4 text-center" style="color:rgba(38, 72, 74, 0.6);">We are proudly sponsored by</div>
        <div class="d-flex col-12 pr-3 pl-3 flex-row flex-wrap  justify-content-center align-items-center mx-lg-5">
            <div class="p-2 mb-2 mx-md-5">
                <img class="img-sponsor1" src="/images/US.png" alt="">
            </div>
            <div class="p-2 mb-2 mx-md-5">
                <img class="img-sponsor2" src="/images/yseali.png" alt="">
            </div>
            <div class="p-2 mb-2 mx-md-5">
                <img class="img-sponsor3" src="/images/culturalvistas.png" alt="">
            </div>
            <div class="p-2 mx-md-5">
                <img class="img-sponsor4" src="/images/colab.png" alt="">
            </div>
        </div>
        <div class="p-2 m-2">
            <img class="img-fluid" src="/images/hor_vector.png" alt="">
        </div>
    </div>
</section>


{{-- Join Us --}}
<section class="sec-5 container-fluid pt-5">
    <div class="row p-2 pb-5 mb-4 align-middle justify-content-center text-center">
        <h2><span class="p-2 m-1">We believe in tech, but we believe more in the humanity behind tech.</span></h2>
        <p class="p-2 col-md-8">
            Join us now to find out how you can help bridge the digital gap
            in Southeast Asia and change tens of thousands of lives!
        </p>
        <div class="d-flex col-md-8 flex-row flex-wrap flex-md-nowrap justify-content-around align-items-center mb-4 mt-3">
            <!-- <a class="btn btn-lg btn-primary mb-2" href="" style="background-color: #26484A">
                Apply as Non-Profit
            </a> -->
            <a class="btn btn-lg btn-primary p-3 pr-5 pl-5" href="/register" style="background-color: #26484A">
                Sign Me Up!
            </a>
        </div>
    </div>
</section>

@endsection