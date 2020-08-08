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
	<div class="col-lg-3 col-md-4 col-sm-6 gallery-box">
		<div class="image fit">
			<img src="images/pic02.jpg" alt="" />
		</div>
		<div class="content">
			<h5>{{ $project->name }}</h5>
			<p>{{ $project->ngo->name }}</p>
		</div>
	</div>
		
	@endforeach	
	
</div>

@endsection





