@extends('layouts.layout')

@section('content')

<section class="row col-12 justify-content-center">
    <div class="d-flex flex-row m-4 p-2  justify-content-center">
        <div class="col-8 p-2 text-center">
            <h1>Transform and empower with tech</h1>
            <p class="p-2" style="line-height: 1.6">
                We provide pro bono tech consulting and innovative digital solutions by connecting 
                top tech talents at U.S. colleges with social enterprises and NGOs in Southeast Asia
            </p>
        </div>
    </div>
</section>
<section class="row m-0 col-12" style="background-color:#26484A;height:500px;">
</section>

{{-- Workflow --}}

<section class="row col-12 justify-content-center">
    <div class="text-center m-4">
        <span style="height:97px;">
            <h2 class="p-2 m-2">
                We help Southeast Asian changemakers overcome obstacles
                to sustainable change. <br><br> Here’s how it works.
            </h2>
        </span>
    </div>
    <div class="d-flex flex-row flex-md-nowrap flex-wrap justify-content-center">
        <div class="p-2 text-center">
            <img class="p-2" src="/images/ellipse_blue.png" alt="">
            <h5 class="p-3">Create Your Profile</h5>
            <p>
                Sign up to volunteer as a student 
                developer or apply as a non-profit 
                organization to submit new projects
            </p>
        </div>
        <div class="p-2 text-center">
            <img class="p-2" src="/images/ellipse_yellow.png" alt="">
            <h5 class="p-3">Find Your Match</h5>
            <p>
                Our team will match student developers
                with NGOs/social enterprises based on 
                their interests and values.
            </p>
        </div>
        <div class="p-2 text-center mb-5">
            <img class="p-2" src="/images/ellipse_green.png" alt="">
            <h5 class="p-3">Serve and Contribute</h5>
            <p>
                Students will consult with their partner 
                organization to develop digital solutions
                based on their project specifications
            </p>
        </div>
    </div>
</section>

{{-- Featured Projects --}}

<section id="Projects" class="container-fluid " style="background-color: #F4F4F4">
    <div class="row col-12 align-middle">
         <h2 class="m-4">Featured Projects</h2>
        <div class="d-flex flex-row flex-md-nowrap flex-wrap justify-content-around p-2">
            {{-- add blade logic for all featured projects --}}
            <div class="card shadow p-3 mb-5 bg-white rounded m-2 col-md-5">
                <img class="card-img-top img-fluid" src="/images/qwe.png" alt="" style="width:100%; height:15vw; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">The Lost Food Project</h5>
                    <p class="card-text">
                        A centralized donation application with the aims of onboarding and 
                        engaging with more potential food donors by streamlining the process
                        of collecting food donations for neighborhood grocers.
                    </p>
                    <a class="text-right" href="">See Details —></a>
                </div> 
            </div>
            <div class="card shadow p-3 mb-5 bg-white rounded m-2 col-md-5">
                <img class="card-img-top img-fluid" src="/images/qwe.png" alt="" style="width:100%; height:15vw; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">The Lost Food Project</h5>
                    <p class="card-text">
                        A centralized donation application with the aims of onboarding and 
                        engaging with more potential food donors by streamlining the process
                        of collecting food donations for neighborhood grocers.
                    </p>
                    <a href="">See Details —></a>
                </div> 
            </div>
        </div>
    </div>
</section>

{{-- Sponsors --}}

<section class="row col-12 align-middle justify-content-center">
    <div class="col-8 p-2 mb-4 text-center">We are proudly sponsored by</div>
    <div class="d-flex col-12 flex-row flex-wrap flex-md-nowrap justify-content-around align-items-center">
        <div class="p-2 mb-2">
            <img src="/images/US.png" alt="">
        </div>
        <div class="p-2 mb-2">
            <img src="/images/yseali.png" alt="">
        </div>
        <div class="p-2 mb-2">
            <img src="/images/culturalvistas.png" alt="">
        </div>
        <div class="p-2">
            <img src="/images/colab.png" alt="">
        </div>
    </div>
    <div class="p-2 m-2 overflow-hidden">
        <img src="/images/hor_vector.png" alt="">
    </div>
</section>

{{-- Join Us --}}
<section class="row col-12 align-middle justify-content-center text-center">
    <h2><span class="p-2">We believe in tech, but we believe more in the humanity behind tech.</span></h2>
    <p class="p-2">
        Join us now to find out how you can help bridge the digital gap
        in Southeast Asia and change tens of thousands of lives!
    </p>
    <div class="d-flex col-md-8 flex-row flex-wrap flex-md-nowrap justify-content-around align-items-center mb-4">
        <!-- <a class="btn btn-lg btn-primary mb-2" href="" style="background-color: #26484A">
            Apply as Non-Profit
        </a> -->
        <a class="btn btn-lg btn-primary" href="/register?type=student" style="background-color: #26484A">
            Apply as Volunteer
        </a>
    </div>
</section>

@endsection