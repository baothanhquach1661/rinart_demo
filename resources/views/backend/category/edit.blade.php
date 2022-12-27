@extends('admin.admin_master')

@section('title', 'Update Brand')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update {{ $category->category_name_en }}</li>
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

                        <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            
                            <div>
                                <label for="">Category Name (English)</label>
                                <div class="mb-4">

                                	@error('category_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="category_name_en" type="text" value="{{ $category->category_name_en }}">
                                </div>

                                <label for="">Category Name (Vietnamese)</label>
                                <div class="mb-4">

                                	@error('category_name_vi')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="category_name_vi" type="text" value="{{ $category->category_name_vi }}">
                                </div>

                                <label for="">Category Icon</label>
                                <div class="mb-4">

                                	@error('category_icon')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" value="{{ $category->category_icon }}" name="category_icon" type="text">
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


@endsection















