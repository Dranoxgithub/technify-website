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



<div class="row gallery">
	
	@foreach($projects as $project)
	<div class="col-lg-3 col-md-4 col-sm-6 gallery-box card">
		
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
	
</div>

@endsection





