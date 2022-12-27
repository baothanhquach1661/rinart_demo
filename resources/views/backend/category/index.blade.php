@extends('admin.admin_master')

@section('title', 'All Categories')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Categories</li>
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

					<h4 class="card-title">Categories Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Category Icon</th>
								<th>Category En</th>
								<th>Category Vi</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($categories as $item)
							<tr>
								<td>
									<span><i class="{{ $item->category_icon }}" aria-hidden="true"></i></span>
								</td>
								<td>{{ $item->category_name_en }}</td>
								<td>{{ $item->category_name_vi }}</td>
								<td>
									<a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('admin.category.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Once deleted, you will not be able to recover this imaginary file!');">Delete</a>
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



















