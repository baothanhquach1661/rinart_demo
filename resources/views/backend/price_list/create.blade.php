@extends('admin.admin_master')

@section('title', 'Create Price List')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0">Adding New List</h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Create Price List</li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	<!-- end page title -->

    <form method="post" class="custom-validation" action="{{ route('price_list-store') }}" enctype="multipart/form-data">
        @csrf

    	<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Title En</label>
                                        <div>
                                            <input name="title_en" type="text" class="form-control" required/>

                                            @error('title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="label-margin">Title vi</label>
                                        <div>
                                            <input name="title_vi" type="text" class="form-control" required/>

                                            @error('title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 1st row -->       

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Category Name En</label>
                                        <div>
                                            <input name="name_en" type="text" class="form-control" required/>

                                            @error('name_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="label-margin">Category Name Vi</label>
                                        <div>
                                            <input name="name_vi" type="text" class="form-control" required/>

                                            @error('name_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 2nd row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Image (640x360)</label>
                                        <div>
                                            <input name="image" type="file" class="form-control" onChange="mainThumbUrl(this)" required/>

                                            <img src="" id="mainThmb">

                                            @error('image')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Banner (1600x750)</label>
                                        <div>
                                            <input name="banner" type="file" class="form-control" onChange="banner(this)" required/>

                                            <img src="" id="banner">

                                            @error('banner')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 5th row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description En</label>
                                        <div>
                                            <input name="short_description_en" type="text" class="form-control" required/>

                                            @error('short_description_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description Vi</label>
                                        <div>
                                            <input name="short_description_vi" type="text" class="form-control" required/>

                                            @error('short_description_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 6th row -->

                            <div class="col-12">
                                <div class="row">

                                    <label class="label-margin">Long Description</label>
                                    <div>

                                        <textarea name="long_description_en" id="summary-ckeditor" required></textarea>

                                        @error('long_description_en')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>

                                </div>
                            </div> <!-- end 7th row -->


                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="label-margin">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Create
                                            </button>
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end last row -->

                    </div> <!-- end body -->
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </form>



    <script type="text/javascript">

        function banner(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#banner').attr('src',e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        } 

        function mainThumbUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }   

    </script>


    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>

        CKEDITOR.replace('summary-ckeditor');


        // ClassicEditor
        //     .create( document.querySelector( '#editor' ),{
        //         ckfinder:{
        //             uploadUrl: '{{ route('ck.upload').'?_token='.csrf_token() }}'
        //         }
        //     })
        //     .catch( error => {
        //         console.error( error );
        //     });
    </script>

@endsection















