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

<h3 class="ml-4">Available Projects</h3>
<div class="main-gallery js-flickity">
	@foreach($projects as $project)
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="https://www.thelostfoodproject.org/" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="https://www.thelostfoodproject.org/" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
			<p class="card-text">
				{{ $project->goal }}
			</p>
			<div>
				<span>
					<button class="btn btn-primary btn-sm project-button btn-swe">Software Engineer</button>
					<button class="btn btn-primary btn-sm project-button btn-pm">Project Manager</button>
					<button class="btn btn-primary btn-sm project-button btn-d">Designer</button>
				</span>
				<a class="text-right project-button float-right see-details" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">See Details -></a>
			</div>
		</div>
	</div>
	@endforeach
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="https://www.thelostfoodproject.org/" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="https://www.thelostfoodproject.org/" target="_blank" style="color:#26484A;"> $project->name }}</a></h5>
			<p class="card-text">
				$project->goal }}
			</p>
			<div>
				<span>
					<button class="btn btn-primary btn-sm project-button btn-swe">Software Engineer</button>
					<button class="btn btn-primary btn-sm project-button btn-pm">Project Manager</button>
					<button class="btn btn-primary btn-sm project-button btn-d">Designer</button>
				</span>
				<a class="text-right project-button float-right see-details" href="#" data-toggle="modal" data-target="#exampleModal">See Details -></a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>



<!-- <div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
	<a href="https://pertiwi.org.my/" target="_blank"><img class="card-img-top" src="/images/pertiwi_cover_card.png" alt=""></a>

	<div class="card-body p-2 m-4">
		<h5 class="card-title"><a href="https://pertiwi.org.my/" target="_blank" style="color:#26484A;">Pertiwi Soup Kitchen</a></h5>
		<p class="card-text">
			A dynamic website with backend controls to manage operations
			was built to create a stronger online presence for PSK, reach more
			beneficiaries, and digitalize the onboarding of volunteers.
		</p>
		<div>
		<button id="btn-swe" class="btn btn-primary btn-sm project-button">Software Engineer</button>
		<button id="btn-pm" class="btn btn-primary btn-sm project-button">Project Manager</button>
		<button id="btn-d" class="btn btn-primary btn-sm project-button">Designer</button>
		<a class="text-right project-button muted" href="">See Details -></a>
		</div>
	</div> 
</div>

<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
	<a href="https://pertiwi.org.my/" target="_blank"><img class="card-img-top" src="/images/pertiwi_cover_card.png" alt=""></a>
	<div class="card-body p-2 m-4">
		<h5 class="card-title"><a href="https://pertiwi.org.my/" target="_blank" style="color:#26484A;">Pertiwi Soup Kitchen</a></h5>
		<p class="card-text">
			A dynamic website with backend controls to manage operations
			was built to create a stronger online presence for PSK, reach more
			beneficiaries, and digitalize the onboarding of volunteers.
		</p>
		<div>
		<button id="btn-swe" class="btn btn-primary btn-sm project-button">Software Engineer</button>
		<button id="btn-pm" class="btn btn-primary btn-sm project-button">Project Manager</button>
		<button id="btn-d" class="btn btn-primary btn-sm project-button">Designer</button>
		<a class="text-right project-button muted" href="">See Details -></a>
		</div>
	</div> 
</div>


<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
	<a href="https://pertiwi.org.my/" target="_blank"><img class="card-img-top" src="/images/pertiwi_cover_card.png" alt=""></a>
	
	<div class="card-body p-2 m-4">
		<h5 class="card-title"><a href="https://pertiwi.org.my/" target="_blank" style="color:#26484A;">Pertiwi Soup Kitchen</a></h5>
		<p class="card-text">
			A dynamic website with backend controls to manage operations
			was built to create a stronger online presence for PSK, reach more
			beneficiaries, and digitalize the onboarding of volunteers.
		</p>
		<div>
		<button id="btn-swe" class="btn btn-primary btn-sm project-button">Software Engineer</button>
		<button id="btn-pm" class="btn btn-primary btn-sm project-button">Project Manager</button>
		<button id="btn-d" class="btn btn-primary btn-sm project-button">Designer</button>
		<a class="text-right project-button muted" href="">See Details -></a>
		</div>
	</div> 
</div>

<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
	<a href="https://pertiwi.org.my/" target="_blank"><img class="card-img-top" src="/images/pertiwi_cover_card.png" alt=""></a>
	
	<div class="card-body p-2 m-4">
		<h5 class="card-title"><a href="https://pertiwi.org.my/" target="_blank" style="color:#26484A;">Pertiwi Soup Kitchen</a></h5>
		<p class="card-text">
			A dynamic website with backend controls to manage operations
			was built to create a stronger online presence for PSK, reach more
			beneficiaries, and digitalize the onboarding of volunteers.
		</p>
		<div>
		<button id="btn-swe" class="btn btn-primary btn-sm project-button">Software Engineer</button>
		<button id="btn-pm" class="btn btn-primary btn-sm project-button">Project Manager</button>
		<button id="btn-d" class="btn btn-primary btn-sm project-button">Designer</button>
		<a class="text-right project-button muted" href="">See Details -></a>
		</div>
	</div> 
</div>
	 -->

<h3 class="ml-4">Past Works</h3>
<div class="main-gallery js-flickity">
	@foreach($projects as $project)
	<div class="card p-0 shadow mb-sm-5 mx-sm-4 m-2 col-lg-4 col-md-5 gallery-cell">
		<a href="https://www.thelostfoodproject.org/" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
		<div class="card-body p-2 m-4">
			<h5 class="card-title"><a href="https://www.thelostfoodproject.org/" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
			<p class="card-text">
				{{ $project->goal }}
			</p>
			<div>
				<span>
					<button class="btn btn-primary btn-sm project-button btn-swe">Software Engineer</button>
					<button class="btn btn-primary btn-sm project-button btn-pm">Project Manager</button>
					<button class="btn btn-primary btn-sm project-button btn-d">Designer</button>
				</span>
				<a class="text-right project-button float-right see-details" href="">See Details -></a>
			</div>
		</div>
	</div>
	@endforeach
</div>









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
		padding: .2rem .45rem;
		font-size: .71rem;
		border-radius: 9em;
		border-color: white;
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
		font-color: #26484a;
	}

	.flickity-button {
		display: none;
	}

	.flickity-page-dots {
		display: none;
	}
</style>
@endsection