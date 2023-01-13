@extends('admin.admin_master')

@section('title', 'Create Member Image')

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
	                        <li class="breadcrumb-item active">Create Member Image</li>
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

                        <form method="post" action="{{ route('admin.about.storeMoreMemberImage') }}" enctype="multipart/form-data">
                            @csrf

                            <label for="">Member Image (330x380)</label>
                            <div class="mb-4">

                                @error('photo_name')

                                    <span class="text-danger">{{ $message }}</span>

                                @enderror

                                <input id="image" class="form-control" name="photo_name" type="file">
                            </div>

                            <div class="mb-4">
                                <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($editData->photo_name))? 
                                                            url('upload/admin_images/'.$editData->photo_name):
                                                            url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                            </div>
                            
                            <div>
                                <label for="">Member Intro en</label>
                                <div class="mb-4">

                                	@error('description_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="description_en" type="text">
                                </div>

                                <label for="">Member Intro vi</label>
                                <div class="mb-4">

                                	@error('description_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="description_vi" type="text">
                                </div>


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

























