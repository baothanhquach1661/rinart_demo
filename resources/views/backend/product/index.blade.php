@extends('admin.admin_master')

@section('title', 'All Products')

@section('admin')

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">All Products</li>
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

					<h4 class="card-title">Products Datatable</h4><br>

					<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product Name En/Vi</th>
								<th>Selling/Discount Price( VND )</th>
								<th>Category</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($products as $item)
							<tr>
								<td>
									<img src="{{ asset($item->product_thumbnail) }}" style="width: 70px; height: 60px;">
								</td>
								<td width="35%">
									@if($item->product_name_en == NULL and $item->product_name_vi == NULL)
										Sản phẩm hiện đang chưa có tên
									@else
										{{ $item->product_name_en }} / {{ $item->product_name_vi }}
									@endif
									
								</td>
								<td>
									@if($item->selling_price == NULL and $item->discount_price == NULL)
										Sẩn phẩm hiện tại chưa có giá
									@elseif($item->selling_price == NULL and $item->discount_price != NULL)
										{{ $item->discount_price }}
									@elseif($item->selling_price != NULL and $item->discount_price == NULL)
										{{ $item->selling_price }}
									@elseif($item->selling_price != NULL and $item->discount_price != NULL)
										{{ $item->selling_price }} / <span style="color:red;">{{ $item->discount_price }}</span>
									@endif
								</td>
								<td>{{ $item['category']['category_name_vi'] }}</td>
								<td>
									@if($item->status == 1)
										<span class="badge bg-success" style="font-size: 12px;">Active</span>
									@else
										<span class="badge bg-danger" style="font-size: 12px;">Inactive</span>
									@endif
								</td>
								<td>
									@if($item->status == 1)
										<a href="{{ route('admin.product.inactive', $item->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
									@else
										<a href="{{ route('admin.product.active', $item->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
									@endif

									<a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-info">Edit</a>

									<a href="{{ route('admin.product.delete', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
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



















