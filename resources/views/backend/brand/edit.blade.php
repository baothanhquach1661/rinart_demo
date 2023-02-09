@extends('admin.admin_master')

@section('title', 'Update Brand')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="/admin/dashboard">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update {{ $brand->brand_name_en }}</li>
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

                        <form method="POST" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            
                            <div>
                                <label for="">Brand Name (English)</label>
                                <div class="mb-4">

                                	@error('brand_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="brand_name_en" type="text" value="{{ $brand->brand_name_en }}">
                                </div>

                                <label for="">Brand Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('brand_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="brand_name_vi" type="text" value="{{ $brand->brand_name_vi }}">
                                </div>

                                <label for="">Brand Image</label>
                                <div class="mb-4">

                                	@error('brand_image')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input id="image" class="form-control" value="" name="brand_image" type="file">
                                </div>

                                <div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($brand->brand_image))? 
                                                                url($brand->brand_image):
                                                                url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update">
                                    <a href="{{url()->previous()}}" class="btn btn-dark btn-lg waves-effect waves-dark">Cancel</a>
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

@endsection















