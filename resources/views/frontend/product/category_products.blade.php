@extends('frontend.main_master')

@section('title')
	{{ $title }}
@endsection

@section('ads')

	<div class="header-top-campaign">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

<!-- Start Breadcrumb Area  -->
<div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        @if(session()->get('language') == 'vietnamese')
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        @else
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">{{ $slug }}</li>
                        @endif

                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->




<!-- Start Shop Area  -->
<div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="axil-shop-top">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="category-select"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row--15">

        	@foreach($products as $product)
	            <div class="col-xl-3 col-lg-4 col-sm-6">
	                <div class="axil-product product-style-one has-color-pick mt--40">
	                    <div class="thumbnail">
	                        <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">
	                            <img src="{{ asset($product->product_thumbnail) }}" alt="Product Images">
	                        </a>
	                        <div class="product-hover-action">
	                            <ul class="cart-action">
	                                <ul class="cart-action">
                                        <li class="select-option"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">Xem Thêm</a></li>
                                    </ul>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="product-content">
	                        <div class="inner">
	                            <h5 class="title"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_vi }}</a></h5>

	                            <div class="product-price-variant">
	                                @php
                                        $formated_amount = number_format($product->discount_price);
                                        $selling_price = number_format($product->selling_price);
                                      @endphp

                                      @if($product->discount_price == NULL)
                                        <span class="price current-price" style="color: rgba(0,0,0,.54);">
                                          ₫{{ $selling_price }}
                                        </span>
                                      @else
                                        <span class="price current-price" style="text-decoration: line-through;color: rgba(0,0,0,.54); font-size: 15px;">
                                          ₫{{ $selling_price }}
                                        </span>
                                        <span class="price current-price" style="color: #ee4d2d;">
                                          ₫{{ $formated_amount }}
                                        </span>
                                      @endif
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- End Single Product  -->
            @endforeach

        </div>
        <div class="text-center pt--30">
            <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Shop Area  -->

    <!-- Start Most Sold Product Area  -->
        @include('frontend.body.video')
    <!-- End Most Sold Product Area  -->









@endsection






























