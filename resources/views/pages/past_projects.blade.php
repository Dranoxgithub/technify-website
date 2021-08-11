
@extends ('layouts.layout')

@section ('content')

<section class="container-fluid my-4">
	<div id="banner" class="row p-4 justify-content-center">
		<div class="col-sm-6 content d-flex flex-column justify-content-center text-center">
			<h1>Past Projects</h1>
			<h5></h5>
		</div>
	</div>
</section>




<Section class="d-flex mx-4 my-3">
	<h3>Past Projects</h3>
	<span class="ml-auto pr-4">
		<input id="searchBox" class="form-control" type="search" placeholder="Search..."> 
	</span>
</Section>
<section class="sec-2 container-fluid">
    <div class="row justify-content-center">
        
        <div id="shuffleEntryPoint" class="pt-4 d-flex col-sm-12 flex-row flex-md-nowrap flex-wrap justify-content-between">

			@foreach($projects as $project)
			@if ($project->status == 'recruiting')
			<div class="card p-0 shadow mb-sm-5 col-lg-custom col-md-5 col-10">
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
<style>
	* {
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		font-family: sans-serif;
	}

	.project-button {
		font-size: 0.84rem;
		border-radius: 9em;
		border-color: white;
		
	}

	.project-button:hover {
		background-color: #429993;
		border-color: #9ecacc;
	}

	@media only screen and (min-width: 1200px) {
		.col-lg-custom {
			width: 30%;
		}
	}
	@media only screen and (max-width: 600px) {
		.project-button {
			font-size: .71rem;
		}
		.btns-talent {
			margin-bottom: 1rem;
		}
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

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.3/shuffle.min.js"></script>
<script src="/assets/js/search.js"></script>
@endsection
    