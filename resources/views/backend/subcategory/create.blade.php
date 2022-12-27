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
	                        <li class="breadcrumb-item active">Create a new SubCategory</li>
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

                        <form method="POST" action="{{ route('admin.subcategory.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div>
                                <label for="">SubCategory Name (English)</label>
                                <div class="mb-4">

                                	@error('subcategory_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="subcategory_name_en" type="text">
                                </div>

                                <label for="">SubCategory Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('subcategory_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="subcategory_name_vi" type="text">
                                </div>

                                <label for="validationCustom03" class="form-label">Category</label>
                                <div class="mb-4">
                                    <select class="form-select" id="validationCustom03" name="category_id">

                                        <option selected disabled value="">Select Category</option>

                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach

                                    </select>

                                    @error('category_id')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
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




@endsection















