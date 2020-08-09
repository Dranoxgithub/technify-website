@extends ('layouts.index')

@section ('content')
<section id="main" class="wrapper">
    <div class="inner">
        <header class="align-center">
            <h1>Project listing</h1>
            
        </header>
    </div>
</section>

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





