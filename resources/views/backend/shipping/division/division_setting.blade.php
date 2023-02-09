@extends('admin.admin_master')

@section('title', 'All Shipping Area Division')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Divisions</li>
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

					<h4 class="card-title">
						<a href="{{ route('admin.division.create') }}" class="btn btn-secondary btn-lg waves-effect waves-secondary">Create new Division</a>
					</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Division Area</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($divisions as $item)
							<tr>
								<td>
									<span>{{ $item->division_area_name }}</span>
								</td>
								<td>
									<a href="{{ route('admin.division.edit', $item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('admin.division.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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



















