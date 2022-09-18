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


<div class="container bootdey">
	<div class="row">
		<div class="col-12">
			<div class="section-title mt-4">
				<h2 class="title">Ongoing Projects</h2>
			</div>
		</div>
	</div>

	<div class="row">
		@foreach($projects as $project)
		@if ($project->status != 'finished')

		<div class="col-lg-4 col-md-6 col-12  pt-2">
			<div class="team text-center p-3 py-4">
				<a href="{{ $project->Ngo->website }}" target="_blank">
					@if (Storage::disk()->exists("projects_image/" . $project->id))
					<img class="img-fluid avatar avatar-medium shadow profile-pic rounded" src="{{ Storage::url("projects_image/" . $project->id) }}" alt="">
					@else
					<img class="img-fluid avatar avatar-medium shadow profile-pic rounded" src="/images/cover1.png" alt="">
					@endif
				</a>
				<!-- <img src="images/Khoo.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt=""> -->
				<div class="content mt-3">
					<h4 class="title mb-0"><a href="{{ $project->Ngo->website }}" target="blank" style="color: #26484A;">{{ $project->name }}</a></h4>
					<small class="text-muted">{{ $project->ngo->name }}</small>
					<p>{{ $project->goal }}</p>
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
					<!--end icon-->
				</div>
			</div>
		</div>

		@endif
		@endforeach
		<!--end col-->
	</div>
</div>
</div>


<div class="container bootdey">
	<div class="row">
		<div class="col-12">
			<div class="section-title mt-4">
				<h2 class="title">Other Project Highlights</h2>
			</div>
		</div>
	</div>

	<div class="row">
		@foreach($projects as $project)
		@if ($project->status == 'finished')
		<div class="col-lg-4 col-md-6 col-12  pt-2">
			<div class="team text-center p-3 py-4">
				<a href="{{ $project->Ngo->website }}" target="_blank">
					@if (Storage::disk()->exists("projects_image/" . $project->id))
					<img class="img-fluid avatar avatar-medium shadow profile-pic rounded" src="{{ Storage::url("projects_image/" . $project->id) }}" alt="">
					@else
					<img class="img-fluid avatar avatar-medium shadow profile-pic rounded" src="/images/cover1.png" alt="">
					@endif
				</a>
				<!-- <img src="images/Khoo.jpeg" class="img-fluid avatar avatar-medium shadow rounded-pill profile-pic" alt=""> -->
				<div class="content mt-3">
					<h4 class="title mb-0"><a href="{{ $project->Ngo->website }}" target="blank" style="color: #26484A;">{{ $project->name }}</a></h4>
					<small class="text-muted">{{ $project->ngo->name }}</small>
					<p>{{ $project->goal }}</p>
					<!--end icon-->
				</div>
			</div>
		</div>

		@endif
		@endforeach
		<!--end col-->
	</div>
</div>
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