@extends ('layouts.layout')

@section ('content')
<section id="main" class="wrapper">
    <div class="inner">
        <div class="row">
            <div class="6u 12u$(small)">
                <h3>Student</h3>
                <p>Join the fight in bridging the digital divide! You will be matched with a team of talented individuals like yourself and work with a social impact partner on exciting tech projects.</p>
                <div class="button-wrapper">
                <a href="/register?type=student" class="button">Sign up as a Student</a>
                </div>
            </div>
            
            <div class="6u$ 12u$(small)">
                <h3>NGO / Social Enterprise</h3>
                <p>Explore new possibilities to amplify your work and impacts with innovative digital solutions! You will be able to onboard a team of tech talents to work on digitizaion projects for your organization at zero cost.</p>
                <div class="button-wrapper">
                <a href="/register?type=NGO" class="button">Sign up as a Social Impact Partner</a>
                </div>
            </div>
          
        </div>
        
    </div>

</section>
@endsection
