@extends('admin.admin_master')

@section('title', 'Create Brand')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Create a new brand</li>
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

                        <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div>
                                <label for="">Brand Name (English)</label>
                                <div class="mb-4">

                                	@error('brand_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="brand_name_en" type="text">
                                </div>

                                <label for="">Brand Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('brand_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="brand_name_vi" type="text">
                                </div>

                                <label for="">Brand Image</label>
                                <div class="mb-4">

                                	@error('brand_image')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input id="image" class="form-control" value="" name="brand_image" type="file">
                                </div>

                                {{-- <div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($editData->profile_photo_path))? 
                                                                url('upload/admin_images/'.$editData->profile_photo_path):
                                                                url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div> --}}

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Create">
                                </div>
                            </div>
                        </form>

                    </div>
                </div> 
            </div>
            <!-- end col -->
        </div>




@endsection















