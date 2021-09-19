@extends('layouts.layout')

@section('content')
<div class="wrapper container my-4">
    <h2 class="text-center">Edit Project</h2>
    <?php $ngo = Auth::user()->ngo ?>

    <form method="POST" action="/projects/{{$project->id}}" >
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Full Name') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->name }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('NGO Website') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->website }}</label>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Causes') }}</label>

        <div class="col-md-6">
            <label class="col-md-4 col-form-label">{{ $ngo->cause }}</label>
            
        </div>
    </div>
            
            
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="goal" class="col-md-4 col-form-label text-md-right">{{ __('Project Goal') }}</label>

        <div class="col-md-6">
            <input id="goal" type="text" class="form-control @error('goal') is-invalid @enderror" name="goal" value="{{ $project->goal }}" required autocomplete="goal" autofocus>

            @error('goal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Project Start Date') }}</label>

        <div class="col-md-6">
            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value={{ $project->start_date }} required autocomplete="start_date" autofocus>

            @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Project End Date') }}</label>

        <div class="col-md-6">
            <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value={{ $project->end_date }} required autocomplete="end_date" autofocus>

            @error('end_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $project->country }}" required>
            <!-- list="country"  -->
            <datalist id="country">
                <option value="Brunei">
                <option value="Cambodia">
                <option value="Indonesia">
                <option value="Laos">
                <option value="Malaysia">
                <option value="Myanmar">
                <option value="Phillipines">
                <option value="Singapore">
                <option value="Thailand">
                <option value="Vietnam">
                <option value="United States">												
            </datalist>

            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="timezone" class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

        <div class="col-md-6">

        
            <select id="timezone" type="text" class="form-control @error('country') is-invalid @enderror" name="timezone" value="{{ $project->timezone }}" required autocomplete="timezone" autofocus>
                <option>Choose one</option>
                <?php
                
                foreach($timezone_list as $item){
                    $selectedValue = '';
                    if(strcmp($item, $project->timezone) == 0) {
                        $selectedValue = "selected";
                    }
                    echo "<option value='$item' $selectedValue>$item</option>";
                    
                }
                ?>
            </select>

            @error('timezone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Project Description') }}</label>

        <div class="col-md-6">
            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $project->description }}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skills Preferred') }}</label>

        <div class="col-md-6">
            <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ $project->skill }}" required autocomplete="skill" autofocus>

            @error('skill')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row role_checkboxes">
        <label class="col-md-4 col-form-label text-md-right">{{ __('Roles needed') }}</label>
        <div class="col-md-6 d-flex justify-content-start align-items-center">
            <label class="my-auto mr-3"><input for="swe" type="checkbox" name="role_group[]" id="swe" value="swe" {{ $project->swe_needed?'checked':''}} required> Software Engineer</label>
            <label class="my-auto mr-3"><input for="pm" type="checkbox" name="role_group[]" id="pm" value="pm" {{ $project->pm_needed?'checked':''}} required> Product Manager</label>
            <label class="my-auto mr-3"><input for="d" type="checkbox" name="role_group[]" id="d" value="d" {{ $project->d_needed?'checked':''}} required> Designer</label>
        </div>
    </div>

    <div class="form-group row">
        <label for="contact_name" class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Person') }}</label>

        <div class="col-md-6">
            <input id="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" value="{{ $project->contact_name }}" required autocomplete="contact_name" autofocus>

            @error('contact_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

   
    <div class="form-group row">
        <label for="contact_email" class="col-md-4 col-form-label text-md-right">{{ __('Project Contact Email') }}</label>

        <div class="col-md-6">
            <input id="contact_email" type="text" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ $project->contact_email }}" autocomplete="contact_email" autofocus>

            @error('contact_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
        
        <div class="col-md-6">
            <input id="fileChange" name="fileChange" type="hidden"></input>
            <input id="upload" type="file" class="@error('image') is-invalid @enderror" name="image" value="" accept="image/*">
            <img id="preview-cropped-image" src="{{ Storage::disk()->exists("projects_image/" . $project->id) ? Storage::url('projects_image/'. $project->id) : ""}}" style="height:300px;" ></img>
        </div>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" style="width:100%" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
            </div>
        </div>
    </div>
    
    
    <div class="form-group row justify-content-center justify-content-md-around">
            <a href="/projects/{{ $project->id }}" class="col-md-4 col-10 mb-2 btn btn-light">
                {{ __('Cancel') }}
            </a>
            <button type="submit" class="col-md-4 col-10 mb-2 btn btn-primary d-flex justify-content-center align-items-center">
                {{ __('Update') }}
            </button>
        </div>
    
    </form>
</div>	
@endsection

@section('scripts')
<script src="/assets/js/cropper.js"></script>
<link rel="stylesheet" href="/assets/css/cropper.css" />
<script>
$(function(){
    var requiredCheckboxes = $('.role_checkboxes :checkbox[required]');
    function checkCheckBoxCompeletion(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    }
    requiredCheckboxes.change(checkCheckBoxCompeletion);
    checkCheckBoxCompeletion();
});
$("document").ready(function(){
    var $modal = $('#modal');
    var $image = document.getElementById('image');
    var cropper;
    $("#upload").change(function(e) {
        var files = e.target.files;
        var done = function (url) {
        $image.src = url;
        $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        aspectRatio: 16/9,
        viewMode: 3,
        preview: '.preview'
        });
        }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
        width: 160,
        height: 160,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function() {
                var base64data = reader.result;  
                
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "/projects/upload_image_buffer",
                    data: {image: base64data, "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        console.log(data);
                        $modal.modal('hide');
                        document.getElementById("preview-cropped-image").src = data.filePath + "?time=" + new Date().getTime();;
                        document.getElementById("fileChange").value = true;
                        document.getElementById("upload").value = null;
                    }
                });
            }
        });
    })
});
</script>
@endsection