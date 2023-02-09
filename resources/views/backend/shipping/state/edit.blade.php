@extends('admin.admin_master')

@section('title', 'Update State')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update {{ $states->state_name }}</li>
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

                        <form method="POST" action="{{ route('admin.state.update', $states->id) }}">
                            @csrf
                            
                            <div>
                                <label for="validationCustom03" class="form-label">Division</label>
                                <div class="mb-4">
                                    <select class="form-select" id="validationCustom03" name="division_id">

                                        <option selected disabled value="">Select Division</option>

                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" {{ $division->id == $states->division_id 
                                                ? 'selected'
                                                : ''}}>{{ $division->division_area_name }}</option>
                                        @endforeach

                                    </select>

                                    @error('division_id')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                                <label for="validationCustom03" class="form-label">District</label>
                                <div class="mb-4">
                                    <select class="form-select" id="validationCustom03" name="district_id">

                                        <option selected disabled value="">Select District</option>

                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ $district->id == $states->district_id 
                                                ? 'selected'
                                                : ''}}>{{ $district->district_name }}</option>
                                        @endforeach

                                    </select>

                                    @error('district_id')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>

                                <label for="">State Area</label>
                                <div class="mb-4">

                                    <input class="form-control" name="state_name" value="{{ $states->state_name }}" type="text" required>
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update">
                                    <a href="{{url()->previous()}}" class="btn btn-dark btn-lg waves-effect waves-dark">Cancel</a>
                                </div>

                            </div>
                        </form>

                    </div>
                </div> 
            </div>
            <!-- end col -->
        </div>




@endsection















