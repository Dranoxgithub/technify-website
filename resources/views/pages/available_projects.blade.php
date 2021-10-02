
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




<Section class="d-flex mx-4 my-3">
	<h3>Available Projects</h3>
	<span class="ml-auto pr-4">
		<input id="searchBox" class="form-control" type="search" placeholder="Search..."> 
	</span>
</Section>
<section class="sec-2 container-fluid">
    <div class="row justify-content-center">
        
        <div id="shuffleEntryPoint" class="pt-4 d-flex col-sm-12 flex-row flex-md-nowrap flex-wrap justify-content-between">

			@foreach($projects as $project)
			<div class="card p-0 shadow mb-sm-5 col-lg-custom col-md-5 col-10">
				<a href="{{ $project->ngo->website }}" target="_blank"><img class="card-img-top" src="/images/technify_cover_card.png" alt=""></a>
				<div class="card-body p-2 m-4">
					<h5 class="card-title"><a href="projects/{{ $project->id }}" target="_blank" style="color:#26484A;">{{ $project->name }}</a></h5>
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
					<a class="text-right project-button float-right see-details mt-2" href="/projects/{{ $project->id }}" target="_blank" data-toggle="modal" data-target="#project{{ $project->id }}">See Details -></a>
				</div>
			</div>
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

	@media only screen and (min-width: 1200px) {
		.col-lg-custom {
			width: 30%;
		}
	}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/5.2.3/shuffle.min.js"></script>
<script>
	$(function() {
    const element = document.querySelector('#shuffleEntryPoint');
    const shuffle = new window.Shuffle(element, {
            itemSelector: '.card',
			isCentered: true,
            filterMode: Shuffle.FilterMode.ANY,
        });
    document.getElementById('searchBox').addEventListener('keyup', handleSearchKeyup);

    function handleSearchKeyup(evt) {
        const searchText = evt.target.value.toLowerCase();
        shuffle.filter(element => {
            console.log('filtering...');
            
            const titleText = element.querySelector('.card-title').textContent.toLowerCase().trim();
            return titleText.indexOf(searchText) !== -1;
        });
    }
})
</script>
<!-- <script src="/assets/js/search.js"></script> -->
@endsection
    