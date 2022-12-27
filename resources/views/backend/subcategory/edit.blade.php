@extends('admin.admin_master')

@section('title', 'Update SubCategory')

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
	                        <li class="breadcrumb-item active">Update {{ $subcat->subcategory_name_en }}</li>
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

                        <form method="POST" action="{{ route('admin.subcategory.update', $subcat->id) }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $subcat->id }}">
                            
                            <div>
                                <label for="">SubCategory Name (English)</label>
                                <div class="mb-4">

                                	@error('subcategory_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="subcategory_name_en" type="text" value="{{ $subcat->subcategory_name_en }}">
                                </div>

                                <label for="">SubCategory Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('subcategory_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="subcategory_name_vi" type="text" value="{{ $subcat->subcategory_name_vi }}">
                                </div>

                                <label for="">Category</label>
                                <div class="mb-4">

                                	<select class="form-select" id="validationCustom03" name="category_id">

                                        <option selected disabled value="">Select Category</option>

                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcat->category_id ? 'selected' : '' }} >{{ $category->category_name_en }}</option>
                                        @endforeach

                                    </select>

                                    @error('category_id')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

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















