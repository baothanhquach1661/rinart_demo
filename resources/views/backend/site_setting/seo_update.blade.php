@extends('admin.admin_master')

@section('title', 'Update Seo Site')

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
	                        <li class="breadcrumb-item active">Update Seo Site Setting</li>
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

                        <form method="POST" action="{{ route('admin.seo.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            
                            <div>
                                <label for="">Meta Title</label>
                                <div class="mb-4">

                                    @error('meta_title')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->meta_title }}" name="meta_title" type="text" required>
                                </div>

                                <label for="">Meta Author</label>
                                <div class="mb-4">

                                    @error('meta_author')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->meta_author }}" name="meta_author" type="text" required>
                                </div>

                                <label for="">Meta Description</label>
                                <div class="mb-4">

                                    @error('meta_description')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <textarea class="form-control" name="meta_description">
                                        {!! $data->meta_description !!}
                                    </textarea>
                                </div>

                                <label for="">Meta Keyword</label>
                                <div class="mb-4">

                                    @error('meta_keyword')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->meta_keyword }}" name="meta_keyword" type="text" required>
                                </div>

                                <label for="">Google Analytics</label>
                                <div class="mb-4">

                                    @error('google_analytics')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->google_analytics }}" name="google_analytics" type="text" required>
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


@endsection















