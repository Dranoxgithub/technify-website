@extends ('layouts.layout')

@section ('content')
<section id="main" class="wrapper">
    <div class="inner">
        <header class="align-center">
            <h1>Project Listing</h1>
            
        </header>
    </div>
</section>

<form action="/search" method="POST" role="search" class="">
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
</form>


<!-- 
<div class="main-gallery js-flickity">
	
	@foreach($projects as $project)
	<div class="gallery-cell">
		
		<div class="card-body">
			<div class="card-title"><h5>{{ $project->name }}</h5></div>
			<div class="card-content">
				<button class="tag alt">{{ $project->ngo->cause }}</button>
				<p>
					{{ $project->ngo->name }}<br>
				
				{{ date('d M, Y', strtotime($project->start_date)) }} - {{ date('d M, Y', strtotime($project->end_date)) }}<br>
				{{ $project->commitment . "h/week"}}<br>
				{{ $project->goal }}<br>
				</p> 
			</div>
			<div class="card-button">
				<a href="/projects/{{$project->id}}" class="button">Details</a>
			</div>
			
			
		</div>
	</div>
		
	@endforeach	
	
</div> -->

<div class="main-gallery js-flickity">
<div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5 gallery-cell">
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
<div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5 gallery-cell">
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
<div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5 gallery-cell">
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
<div class="card grow p-0 shadow mb-sm-5 mx-sm-5 m-2 col-lg-4 col-md-5 gallery-cell">
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


						
							
							
	
					




@endsection

@section('scripts')
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
	<script>
		$('.main-gallery').flickity({
		// options
		wrapAround: true,
		// autoPlay: true,
		prevNextButtons: false,
		pageDots: false, 
		cellAlign: 'left'
		});
	</script>
	<style>
		* {
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		}

		body { font-family: sans-serif; }

		.gallery {
		background: #EEE;
		}

		.gallery-cell {
		/* width: 28%;
		height: 200px;
		margin-right: 10px;
		background: #8C8; */

		counter-increment: gallery-cell;
		margin-right: 10px;
		}




		.flickity-button {
  		display: none;
		}
		.flickity-page-dots {
			display: none;
		}
	</style>
@endsection





