@extends('admin.admin_master')

@section('title', 'Update Slider')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update Slider</li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	<!-- end page title -->


	<div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.slider.update', $sliders->id) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $sliders->id }}">
                            <input type="hidden" name="old_image" value="{{ $sliders->slider_image }}">
                            
                            <div>
                                <label for="">Title</label>
                                <div class="mb-4">

                                	@error('title')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="title" type="text" value="{{ $sliders->title }}">
                                </div>

                                <label for="">Short Description</label>
                                <div class="mb-4">

                                	@error('short_description')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="short_description" type="text" value="{{ $sliders->short_description }}">
                                </div>

                                <label for="">Long Description</label>
                                <div class="mb-4">

                                    @error('long_description')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <textarea name="long_description" id="summary-ckeditor">{!! $sliders->long_description !!}</textarea>
                                </div>

                                <label for="">Image</label>
                                <div class="mb-4">

                                	@error('slider_image')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input id="image" class="form-control" value="" name="slider_image" type="file">
                                </div>

                                <div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($sliders->slider_image))? 
                                                                url($sliders->slider_image):
                                                                url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update">
                                </div>
                            </div>
                        </form>

                    </div>
                </div> 
            </div>
            <!-- end col -->
        </div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>

    
    CKEDITOR.replace('summary-ckeditor');


</script>

@endsection















