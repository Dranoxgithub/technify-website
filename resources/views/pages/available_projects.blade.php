
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

<input id="searchBox" class="form-control" type="search" placeholder="Search..."> 

<section class="sec-2 container-fluid">
    <div class="row justify-content-center">
        <div class="text-left col-sm-8 m-4 mb-5 pr-0">
            <h2 class="p-sm-2 m-sm-2">
                We help Southeast Asian changemakers overcome obstacles
                to sustainable change. Here’s how it works.
            </h2>
        </div>
        <div id="shuffleEntryPoint" class="pt-4 d-flex col-sm-10 flex-row flex-md-nowrap flex-wrap justify-content-between">
			<!-- <div class="col-1@sm sizer"></div> -->

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
    </div>
</section>



@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.3/shuffle.min.js"></script>
<script src="/assets/js/search.js"></script>
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
    