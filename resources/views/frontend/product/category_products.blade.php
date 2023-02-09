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
                        <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="separator"></li>

                        <li class="axil-breadcrumb-item active" aria-current="page">{{ $title }}</li>

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
                            <div class="category-select">

                                <!-- Start Single Select  -->
                                {{-- <select class="single-select" onchange="location = this.value;">

                                	@foreach($categories as $category)
                                    	<option value="{{ url('/category/product/'.$category->id.'/'.$category->category_slug_vi) }}">
								        	{{ $category->category_name_vi }}
								       	</option>
                                    @endforeach
                                </select> --}}


                            </div>
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
	                        <a href="single-product.html">
	                            <img src="{{ asset($product->product_thumbnail) }}" alt="Product Images">
	                        </a>
	                        <div class="label-block label-right">
	                            <div class="product-badget">20% OFF</div>
	                        </div>
	                        <div class="product-hover-action">
	                            <ul class="cart-action">
	                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
	                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
	                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="product-content">
	                        <div class="inner">
	                            <h5 class="title"><a href="single-product.html">3D™ wireless headset</a></h5>
	                            <div class="product-price-variant">
	                                <span class="price current-price">$30</span>
	                                <span class="price old-price">$30</span>
	                            </div>
	                            <div class="color-variant-wrapper">
	                                <ul class="color-variant">
	                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
	                                    </li>
	                                    <li class="color-extra-02"><span><span class="color"></span></span>
	                                    </li>
	                                    <li class="color-extra-03"><span><span class="color"></span></span>
	                                    </li>
	                                </ul>
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






























