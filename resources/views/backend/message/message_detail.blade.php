@extends('admin.admin_master')

@section('title', 'Message Content')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">{{ $message_detail->name }}</li>
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
                            
                            <div>
                                <label for="">Name</label>
                                <div class="mb-4">

                                	@error('category_name_en')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input readonly class="form-control" name="category_name_en" type="text" value="{{ $message_detail->name }}">
                                </div>

                                <label for="">Phone</label>
                                <div class="mb-4">

                                    @error('category_name_en')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input readonly class="form-control" name="category_name_en" type="text" value="{{ $message_detail->phone }}">
                                </div>

                                <label for="">Message</label>
                                <div class="mb-4">

                                    @error('category_name_en')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input readonly class="form-control" name="category_name_en" type="text" value="{{ $message_detail->message }}">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update">
                                    <a href="{{url()->previous()}}" class="btn btn-dark btn-lg waves-effect waves-dark">Cancel</a>
                                </div>
                            </div>

                    </div>
                </div> 
            </div>
            <!-- end col -->
        </div>



@endsection















