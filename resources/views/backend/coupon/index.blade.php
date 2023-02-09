@extends('admin.admin_master')

@section('title', 'All Coupons')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Coupons</li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	<!-- end page title -->


	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="card-title">Coupons Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Details</th>
								<th width="10%">Discount(%)</th>
								<th width="10%">Discount</th>
								<th>Validity</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($coupons as $item)
							<tr>
								<td>
									<span>{{ $item->coupon_name }}</span>
								</td>
								<td>
									<span>{{ $item->coupon_detail }}</span>
								</td>
								<td>{{ $item->discount_percentage }}%</td>
								<td>₫{{ $item->discount_regular }}</td>
								<td>

									{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}

								</td>
								<td>
									@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
										<span class="badge bg-success" style="font-size: 12px;">Valid</span>
									@else
										<span class="badge bg-danger" style="font-size: 12px;">Invalid</span>
									@endif
								</td>
								<td>
									<a href="{{ route('admin.coupon.edit', $item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('admin.coupon.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
								</td>
							</tr>
							@endforeach
							
						</tbody>

					</table>

				</div>
			</div>
		</div> <!-- end col -->
	</div> <!-- end row -->





@endsection



















