@extends('admin.admin_master')

@section('title', 'Update Coupon')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update {{ $coupons->coupon_name }}</li>
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

                        <form method="POST" action="{{ route('admin.coupon.update', $coupons->id) }}">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $coupons->id }}">
                            
                            <div>
                                <label for="">Coupon Name</label>
                                <div class="mb-4">

                                    <input class="form-control" name="coupon_name" value="{{ $coupons->coupon_name }}" type="text" required>
                                </div>

                                <label for="">Coupon Detail</label>
                                <div class="mb-4">

                                    <textarea class="form-control" name="coupon_detail">{{ $coupons->coupon_detail }}</textarea>
                                </div>

                                <label for="">Coupon Discount(%)</label>
                                <div class="mb-4">

                                    @error('discount_percentage')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $coupons->discount_percentage }}" name="discount_percentage" type="text">
                                </div>

                                <label for="">Coupon Discount regular</label>
                                <div class="mb-4">

                                    @error('discount_regular')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $coupons->discount_regular }}" name="discount_regular" type="text">
                                </div>

                                <label for="">Validity</label>
                                <div class="mb-4">

                                    <input style="width: 50%;" value="{{ $coupons->coupon_validity }}" type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update Coupon">
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















