@extends('admin.admin_master')

@section('title', 'All Price List')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Price List</li>
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

					<h4 class="card-title">Price List Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Image</th>
								<th>Category Name</th>
								<th>Title</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($data as $item)
							<tr>
								<td>
									<img src="{{ asset($item->image) }}" style="width: 70px; height: 60px;">
								</td>

								<td>{{ $item->name_vi }}</td>
								<td>{{ $item->title_vi }}</td>

								<td>
									@if($item->status == 1)
										<span class="badge bg-success" style="font-size: 12px;">Active</span>
									@else
										<span class="badge bg-danger" style="font-size: 12px;">Inactive</span>
									@endif
								</td>
								
								<td>
									@if($item->status == 1)
										<a href="{{ route('admin.price_list.inactive', $item->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
									@else
										<a href="{{ route('admin.price_list.active', $item->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
									@endif

									<a href="{{ route('admin.pricing.edit', $item->id) }}" class="btn btn-info">Edit</a>

									<a href="{{ route('admin.pricing.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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



















