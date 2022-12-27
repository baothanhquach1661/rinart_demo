@extends('admin.admin_master')

@section('title', 'Create Category')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Create a new category</li>
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

                        <form method="post" action="{{ route('admin.category.store') }}">
                            @csrf
                            
                            <div>
                                <label for="">Category Name (English)</label>
                                <div class="mb-4">

                                	@error('category_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="category_name_en" type="text">
                                </div>

                                <label for="">Category Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('category_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="category_name_vi" type="text">
                                </div>

                                <label for="">Category Icon</label>
                                <div class="mb-4">

                                	@error('category_icon')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="category_icon" type="text">
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















