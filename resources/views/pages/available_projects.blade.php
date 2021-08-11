
@extends ('layouts.layout')

@section ('content')

<section class="container-fluid my-4">
	<div id="banner" class="row p-4 justify-content-center">
		<div class="col-sm-6 content d-flex flex-column justify-content-center text-center">
			<h1>Available Projects</h1>
			<h5></h5>
		</div>
	</div>
</section>


<!-- <form action="/search" method="POST" role="search" class="">
@csrf
@method('GET')
<div class="container">
  <div class="row">
  	<div class="col-lg-7 col-md-4 col-sm-1 col-xs-1">		
	</div>
    <div class="col-lg-3 col-md-4 col-sm-7 col-xs-7">		
		<input class="" type="text" placeholder="Search" aria-label="Search" name="q">	
	</div>
    <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
		<button type="submit" class="button special" id="search-button">
			Search
		</button>
		
	</div>
	<div class="col-lg-1 col-md-2 col-sm-1 col-xs-2">
		<a href="/project_listing" class="button alt" id="cancel-button">
			Cancel
		</a>
	</div>
  </div>
  
</div>
</form> -->
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
<h3 class="ml-4">Available Projects</h3>
<div class="main-gallery js-flickity">
	@foreach($projects as $project)
	@if ($project->status == 'recruiting')
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="https://www.thelostfoodproject.org/" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="https://www.thelostfoodproject.org/" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
			<p class="card-text">
				{{ $project->goal }}
			</p>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<span style="margin-left: -0.45rem;" class="btns-talent">
					@if ($project->swe_needed)
					<button class="btn btn-primary btn-sm project-button btn-swe">Software Engineer</button>
					@endif
					@if ($project->pm_needed)
					<button class="btn btn-primary btn-sm project-button btn-pm">Project Manager</button>
					@endif
					@if ($project->d_needed)
					<button class="btn btn-primary btn-sm project-button btn-d">Designer</button>
					@endif
				</span>
				<a class="text-right project-button float-right see-details" href="#" data-toggle="modal" data-target="#project{{ $project->id }}">See Details -></a>
			</div>
		</div>
	</div>
	@endif
	@endforeach
</div>

@foreach($projects as $project)
@if ($project->status == 'recruiting')
<div class="modal fade" id="project{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<div class="mx-2">
					<h5 class="modal-title" id="exampleModalLabel">{{ $project->name }}</h5>
					<span style="margin-left: -0.45rem;">
						@if ($project->swe_needed)
						<button class="btn btn-primary btn-sm project-button btn-swe">Software Engineer</button>
						@endif
						@if ($project->pm_needed)
						<button class="btn btn-primary btn-sm project-button btn-pm">Project Manager</button>
						@endif
						@if ($project->d_needed)
						<button class="btn btn-primary btn-sm project-button btn-d">Designer</button>
						@endif
					</span>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<span class="col-4">NGO</span>
						<span class="col-8">{{ $project->Ngo->name }}, {{ $project->country }}</span>
					</div>
					<div class="row">
						<span class="col-4">Duration</span>
						<span class="col-8">{{ (new DateTime($project->start_date))->format('Y/m/d') }} - {{ (new DateTime($project->end_date))->format('Y/m/d') }}</span>
					</div>
					<div class="row">
						<span class="col-4">Commitment</span>
						<span class="col-8">{{ $project->commitment }}</span>
					</div>
					<div class="row">
						<span class="col-4">Skills</span>
						<span class="col-8">{{ $project->skill }}</span>
					</div>
					<div class="row">
						<span class="col-4">Goal</span>
						<span class="col-8">{{ $project->goal }}</span>
					</div>
					<div class="row">
						<span class="col-4">Description</span>
						<span class="col-8">{{ $project->description }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endforeach



@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
	$(function() {
		$('.main-gallery').flickity({
			// options
			// autoPlay: true,
			wrapAround: true,
			groupCells: '80%',
			prevNextButtons: false,
			pageDots: false,
		})

	});
</script>
<style>
	* {
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		font-family: sans-serif;
	}

	.gallery {
		background: #EEE;
	}

	.card-body {}

	.gallery-cell {
		/* width: 28%;
		height: 200px;
		margin-right: 10px;
		background: #8C8; */
		width: 90%;
		opacity: 50%;
		counter-increment: gallery-cell;
		margin-right: 10px;
	}

	.gallery-cell.is-selected {
		opacity: 100%;
	}
	

	.project-button {
		/* padding: .2rem .45rem; */
		font-size: 0.84rem;
		border-radius: 9em;
		border-color: white;
		
	}

	.project-button:hover {
		background-color: #429993;
		border-color: #9ecacc;
	}

	@media only screen and (max-width: 600px) {
		.project-button {
			/* padding: .2rem .5rem; */
			font-size: .71rem;
		}
		.btns-talent {
			margin-bottom: 1rem;
		}
	}

	.modal .row {
		margin-bottom: 0.4rem;
	}

	.btn-swe {
		background-color: #9ecacc;
	}

	.btn-pm {
		background-color: #ff8943;
	}

	.btn-d {
		background-color: #ffdc83;
	}

	.see-details {
		color: #26484a;
	}
	.see-details:hover {
		background-color: white;
		color: #429993;
	}

	.flickity-button {
		display: none;
	}

	.flickity-page-dots {
		display: none;
	}
</style>
@endsection
    