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
	<div class="gallery-cell">
		<div class="col-md-8  mx-auto">
			<div class="card w-100" style="height:550px">
				<img class="card-img-top" src="/images/technify_cover_card.png" style="height:250px">
				<div class="card-body overflow-auto">
					<h4 class="card-title"> <a href="https://www.thelostfoodproject.org/" target="blank">The Lost Food Project</a></h4>
					<p class="card-text text-left">
						<span style="font-weight:bold; color:#f6755e">Problem</span><br>
						Confronted with a rising shortage of food donations since the pandemic, TLFP has been struggling to engage with more potential donors as the logistics of collecting food donations is a discouraging factor for neighborhood grocers. <br>
						<br><span style="font-weight:bold;  color:#f6755e">Technify's Solution</span><br>
						A team of students from Duke University was put together to help TLFP build a centralized donation application with the aims of reaching out to and onboarding more potential food donors.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="gallery-cell">
		<div class="col-md-8  mx-auto">
			<div class="card w-100" style="height:550px">
				<img class="card-img-top" src="/images/technify_cover_card.png" style="height:250px">
				<div class="card-body overflow-auto">
					<h4 class="card-title"> <a href="https://www.thelostfoodproject.org/" target="blank">The Lost Food Project</a></h4>
					<p class="card-text text-left">
						<span style="font-weight:bold; color:#f6755e">Problem</span><br>
						Confronted with a rising shortage of food donations since the pandemic, TLFP has been struggling to engage with more potential donors as the logistics of collecting food donations is a discouraging factor for neighborhood grocers. <br>
						<br><span style="font-weight:bold;  color:#f6755e">Technify's Solution</span><br>
						A team of students from Duke University was put together to help TLFP build a centralized donation application with the aims of reaching out to and onboarding more potential food donors.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="gallery-cell">
		<div class="col-md-8  mx-auto">
			<div class="card w-100" style="height:550px">
				<img class="card-img-top" src="/images/technify_cover_card.png" style="height:250px">
				<div class="card-body overflow-auto">
					<h4 class="card-title"> <a href="https://www.thelostfoodproject.org/" target="blank">The Lost Food Project</a></h4>
					<p class="card-text text-left">
						<span style="font-weight:bold; color:#f6755e">Problem</span><br>
						Confronted with a rising shortage of food donations since the pandemic, TLFP has been struggling to engage with more potential donors as the logistics of collecting food donations is a discouraging factor for neighborhood grocers. <br>
						<br><span style="font-weight:bold;  color:#f6755e">Technify's Solution</span><br>
						A team of students from Duke University was put together to help TLFP build a centralized donation application with the aims of reaching out to and onboarding more potential food donors.
					</p>
				</div>
			</div>
		</div>
	</div>

	

	<!-- <div class="gallery-cell">
		<div class="card-body">
			<div class="card-title"><h5>lahlahlah frontend!</h5></div>
			<div class="card-content">
				<button class="tag alt">$project->ngo->cause</button>
				<p>
					$project->ngo->name }}<br>
				
				 date('d M, Y', strtotime($project->start_date)) }} -  date('d M, Y', strtotime($project->end_date)) }}<br>
				 $project->commitment . "h/week"}}<br>
				 $project->goal }}<br>
				</p> 
			</div>
			<div class="card-button">
				<a href="/projects/$project->id}}" class="button">Details</a>
			</div>
			
			
		</div>
	</div>



	<div class="gallery-cell">
		<div class="card-body">
			<div class="card-title"><h5>lahlahlah frontend!</h5></div>
			<div class="card-content">
				<button class="tag alt">$project->ngo->cause</button>
				<p>
					$project->ngo->name }}<br>
				
				 date('d M, Y', strtotime($project->start_date)) }} -  date('d M, Y', strtotime($project->end_date)) }}<br>
				 $project->commitment . "h/week"}}<br>
				 $project->goal }}<br>
				</p> 
			</div>
			<div class="card-button">
				<a href="/projects/$project->id}}" class="button">Details</a>
			</div>
			
			
		</div>
	</div>


	<div class="gallery-cell">
		<div class="card-body">
			<div class="card-title"><h5>lahlahlah frontend!</h5></div>
			<div class="card-content">
				<button class="tag alt">$project->ngo->cause</button>
				<p>
					$project->ngo->name }}<br>
				
				 date('d M, Y', strtotime($project->start_date)) }} -  date('d M, Y', strtotime($project->end_date)) }}<br>
				 $project->commitment . "h/week"}}<br>
				 $project->goal }}<br>
				</p> 
			</div>
			<div class="card-button">
				<a href="/projects/$project->id}}" class="button">Details</a>
			</div>
		</div>
	</div>


	<div class="gallery-cell">
		<div class="card-body">
			<div class="card-title"><h5>lahlahlah frontend!</h5></div>
			<div class="card-content">
				<button class="tag alt">$project->ngo->cause</button>
				<p>
					$project->ngo->name }}<br>
				
				 date('d M, Y', strtotime($project->start_date)) }} -  date('d M, Y', strtotime($project->end_date)) }}<br>
				 $project->commitment . "h/week"}}<br>
				 $project->goal }}<br>
				</p> 
			</div>
			<div class="card-button">
				<a href="/projects/$project->id}}" class="button">Details</a>
			</div>
			
			
		</div>
	</div> -->
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
		cellAlign: 'center'
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
		height: 550px;
		width:40%;
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





