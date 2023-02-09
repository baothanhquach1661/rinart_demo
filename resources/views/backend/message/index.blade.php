@extends('admin.admin_master')

@section('title', 'All Messages')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Messages</li>
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

					<h4 class="card-title">Customer Messages</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th>Customer Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@php($i = 1)
							@foreach($messages as $item)
							<tr>
								<td>{{ $i++ }}</td>
								<td>
									<a href="{{ route('message.detail', $item->id) }}">{{ $item->name }}</a>
								</td>
								<td>
									{{ $item->phone }}
								</td>
								<td>{{ $item->email }}</td>
								<td>{{ $item->created_at }}</td>
								{{-- <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td> --}}
								<td>
									@if($item->status == 1)
										<a href="{{ route('message.inactive', $item->id) }}" class="btn btn-light" title="Read"><i class="fa fa-eye"></i></a>
									@else
										<a href="{{ route('message.active', $item->id) }}" class="btn btn-dark" title="Not Read"><i class="fa fa-eye-slash"></i></a>
									@endif

									<a href="{{ route('message.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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



















