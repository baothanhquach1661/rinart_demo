@extends('admin.admin_master')

@section('title', 'Update Contact Site')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update Contact Page Setting</li>
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

                        <form method="POST" action="{{ route('admin.contact.update') }}">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <label for="">Address</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_address" type="text" value="{{ $data->rinart_address }}" required>
                            </div>

                            <label for="">Phone</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_phone" type="text" value="{{ $data->rinart_phone }}" required>
                            </div>

                            <label for="">Email</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_email" type="text" value="{{ $data->rinart_email }}" required>
                            </div>

                            <label for="">Rinart Adv</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_adv" type="text" value="{{ $data->rinart_adv }}" required>
                            </div>

                            <label for="">Opening Hours 1</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_opening_hours" type="text" value="{{ $data->rinart_opening_hours }}" required>
                            </div>

                            <label for="">Opening Hours 2</label>
                            <div class="mb-4">

                                <input class="form-control" name="rinart_opening_hours_2" type="text" value="{{ $data->rinart_opening_hours_2 }}" required>
                            </div>
                            
                            <div>

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















