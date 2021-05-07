@extends ('layouts.layout')
@section ('content')
   


<div class="wrapper">
            <form method="POST" action="/admin/blog_edit/{{$id}}" enctype="multipart/form-data">
			<h2 class="text-center">Edit a blog</h2>
			@csrf
            @method('PATCH')
			<div class="form-group row">
				<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

				<div class="col-md-6">
					<input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ $blog->title }}" required autocomplete="title" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="author" class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

				<div class="col-md-6">
					<input id="author" type="text" class="form-control @error('website') is-invalid @enderror" name="author" value="{{ $blog->author }}" autocomplete="author" autofocus>

					@error('website')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

				<div class="col-md-6">
					<textarea id="body" name="body" class="form-control tinymce-editor">{{ $blog->body }}</textarea>

				
				</div>
			</div>



            




			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="button">
						{{ __('Update') }}
					</button>
				</div>
			</div>
			</form>
		</div>	



@endsection

@section ('scripts')
<script src="https://cdn.tiny.cloud/1/iojytw5rbj35x1ojqs2w8535c1yew00hdg1pedu11yxckvld/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: "#body",
		width:600,
		height: 300
	});
</script>
@endsection