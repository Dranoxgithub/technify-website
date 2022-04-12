@extends ('layouts.layout')

@section ('content')

<section class="container-fluid my-4">
	<div id="banner" class="row p-4 justify-content-center">
		<div class="col-sm-6 content d-flex flex-column justify-content-center text-center">
			<h1>Project Listing</h1>
			<h5>Check out all of the projects currently available for new
				student volunteers, as well as our portfolio of past works!</h5>
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

<Section class="d-flex mx-4">
	<h3>Available Projects</h3>
	<!-- <a class="ml-auto pr-4 see-all" href="/available_projects">See all</a> -->
</Section>
<div class="main-gallery js-flickity">
	@foreach($projects as $project)
	@if ($project->status != 'finished')
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="{{ $project->Ngo->website }}" target="_blank">
			@if (Storage::disk()->exists("projects_image/" . $project->id))
			<img class="card-img-top" src="{{ Storage::url("projects_image/" . $project->id) }}" alt="">
			@else
			<img class="card-img-top" src="/images/cover1.png" alt="">
			@endif
		</a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="{{ $project->Ngo->website }}" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
			<p class="card-text">
				{{ $project->goal }}
			</p>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<span style="margin-left: -0.45rem;" class="btns-talent">
					@if ($project->swe_needed)
					<button class="btn btn-sm project-button btn-swe">Software Engineer</button>
					@endif
					@if ($project->pm_needed)
					<button class="btn btn-sm project-button btn-pm">Project Manager</button>
					@endif
					@if ($project->d_needed)
					<button class="btn btn-sm project-button btn-d">Designer</button>
					@endif
				</span>
			</div>
			<a class="text-right project-button float-right see-details mt-2" href="/projects/{{ $project->id }}" data-toggle="modal" data-target="#project{{ $project->id }}">See Details -></a>
		</div>
	</div>
	@endif
	@endforeach
</div>

@foreach($projects as $project)
@if ($project->status != 'finished')
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




<Section class="d-flex mx-4">
	<h3>Past Works</h3>
	<!-- <a class="ml-auto pr-4 see-all" href="/past_projects">See all</a> -->
</Section>
<div class="main-gallery js-flickity">
	@foreach($projects as $project)
	@if ($project->status == 'finished')
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="{{ $project->Ngo->website }}" target="_blank">
			@if (Storage::disk()->exists("projects_image/" . $project->id))
			<img class="card-img-top" src="{{ Storage::url("projects_image/" . $project->id) }}" alt="">
			@else
			<img class="card-img-top" src="/images/cover1.png" alt="">
			@endif
		</a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="{{ $project->Ngo->website }}" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
			<p class="card-text">
				{{ $project->goal }}
			</p>
			<div>
				<a class="text-right project-button float-right see-details" href="/projects/{{ $project->id }}">See Details -></a>
			</div>
		</div>
	</div>
	@endif
	@endforeach
</div>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
	$(function() {
		$('.main-gallery').flickity({
			wrapAround: true,
			groupCells: '80%',
			prevNextButtons: false,
			pageDots: false,
			imagesLoaded: true,
		});
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
	



	.modal .row {
		margin-bottom: 0.4rem;
	}

	.flickity-button {
		display: none;
	}

	.flickity-page-dots {
		display: none;
	}
</style>

@endsection