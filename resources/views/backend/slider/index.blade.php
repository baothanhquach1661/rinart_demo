@extends('admin.admin_master')

@section('title', 'Slider')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Slides</li>
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

					<h4 class="card-title">Slides Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Title</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($sliders as $item)
							<tr>
								<td>
									 <img src="{{ asset($item->slider_image) }}" style="width: 70px; height: 30px;" alt="{{ $item->title }}">
								 </td>
								<td width="40%">
									@if($item->title == NULL)
										No Title
									@else
										{{ $item->title }}
									@endif
								</td>
								<td>
									@if($item->status == 1)
										<span class="badge bg-success" style="font-size: 12px;">Active</span>
									@else
										<span class="badge bg-danger" style="font-size: 12px;">Inactive</span>
									@endif
								</td>
								<td>

									@if($item->status == 1)
										<a href="{{ route('admin.slider.inactive', $item->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
									@else
										<a href="{{ route('admin.slider.active', $item->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
									@endif

									<a href="{{ route('admin.slider.edit', $item->id) }}" class="btn btn-info">Edit</a>
									<a href="{{ route('admin.slider.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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



















