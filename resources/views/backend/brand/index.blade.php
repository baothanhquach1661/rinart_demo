@extends('admin.admin_master')

@section('title', 'All Brands')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Brands</li>
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

					<h4 class="card-title">Brands Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Vi</th>
								<th>Brand Image</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($brands as $item)
							<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{ $item->brand_name_vi }}</td>
								<td>
									 <img src="{{ asset($item->brand_image) }}" style="width: 70px; height: 30px;" alt="{{ $item->brand_name_en }}">
								 </td>
								<td>
									<a href="{{ route('admin.brand.edit', $item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('admin.brand.delete', $item->id) }}" class="btn btn-danger">Delete</a>
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



















