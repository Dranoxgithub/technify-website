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

<section class="row m-2 col-12 justify-content-center">
    <div class="text-center m-4">
        <span style="height:97px;">
            <h2>
                We help Southeast Asian changemakers overcome obstacles
                to sustainable change. <br> Here’s how it works.
            </h2>
        </span>
    </div>
    <div class="d-flex flex-row flex-md-nowrap flex-wrap justify-content-center">
        <div class="p-2 text-center">
            <h5>Create Your Profile</h5>
            <p>
                Sign up to volunteer as a student 
                developer or apply as a non-profit 
                organization to submit new projects
            </p>
        </div>
        <div class="p-2 text-center">
            <h5>Find Your Match</h5>
            <p>
                Our team will match student developers
                with NGOs/social enterprises based on 
                their interests and values.
            </p>
        </div>
        <div class="p-2 text-center">
            <h5>Serve and Contribute</h5>
            <p>
                Students will consult with their partner 
                organization to develop digital solutions
                based on their project specifications
            </p>
        </div>
    </div>
</section>

{{-- Featured Projects --}}

<section class="row col-12 m-4 align-middle" style="background-color: #F4F4F4">
    <h2 class="m-4">Featured Projects</h2>
    <div class="d-flex flex-row flex-md-nowrap flex-wrap justify-content-around m-2">
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
</section>

{{-- Sponsors --}}

<section class="row col-12 m-4 align-middle justify-content-center">
    <div class="col-8 p-2 mb-4 text-center">We are proudly sponsored by</div>
    <div class="d-flex col-12 flex-row flex-wrap flex-md-nowrap justify-content-around align-items-center">
        <div class="p-2">
            <img src="/images/US.png" alt="">
        </div>
        <div class="p-2">
            <img src="/images/yseali.png" alt="">
        </div>
        <div class="p-2">
            <img src="/images/culturalvistas.png" alt="">
        </div>
        <div class="p-2">
            <img src="/images/colab.png" alt="">
        </div>
    </div>
    <div class="p-2 m-2"><img src="/images/hor_vector.png" alt=""></div>
</section>

{{-- Join US --}}
<section class="row col-12 m-4 align-middle justify-content-center">
    <h2><span>We believe in tech, but we believe more in the humanity behind tech.</span></h2>
    <p>
        Join us now to find out how you can help bridge the digital gap
        in Southeast Asia and change tens of thousands of lives!
    </p>
    <div class="row col-8 justify-content-center">
        <a class="btn btn-lg btn-primary mr-5" href="" style="background-color: #26484A">
            Apply as Non-Profit
        </a>
        <a class="btn btn-lg btn-primary ml-5" href="" style="background-color: #26484A">
            Apply as Volunteer
        </a>
    </div>
</section>

@endsection