@extends('frontend.main_master')

@section('title')
	{{ $products->product_name_en }}
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


<!-- Start Shop Area  -->
<div class="axil-single-product-area bg-color-white">
	<div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
		<div class="container">
			<div class="row row--50">
				<div class="col-lg-6 mb--40">
					<div class="row">
						<div class="col-lg-12">
							<div class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">

								@foreach($multi_img as $img)
									<div class="small-thumb-img ">
										<img src="{{ asset($img->photo_name) }}" alt="samll-thumb">
									</div>
								@endforeach

							</div>
						</div>
						<div class="col-lg-12">
							<div class="small-thumb-wrapper product-small-thumb-2 small-thumb-style-two small-thumb-style-three">
								@foreach($multi_img as $img)
									<div class="small-thumb-img ">
										<img src="{{ asset($img->photo_name) }}" alt="samll-thumb">
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mb--40">
					<div class="single-product-content">
						<div class="inner">
							<h2 class="product-title">
								@if(session()->get('language') == 'vietnamese')
									{{ $products->product_name_vi }}
								@else
									{{ $products->product_name_en }}
								@endif
							</h2>

							@php
                              $amount = $products->selling_price - $products->discount_price;
                              $formated_amount = number_format($amount);
                              $selling_price = number_format($products->selling_price);
                            @endphp


							<div class="price-amount price-offer-amount">
								<span class="price old-price">₫{{ $selling_price }}</span>
								<span class="price current-price" style="color:#ee4d2d;">₫{{ $formated_amount }}</span>
							</div>
							<div class="product-rating">
								<div class="star-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="far fa-star"></i>
								</div>
							</div>

							@if(session()->get('language') == 'vietnamese')
								<ul class="product-meta">
									<li><i class="fal fa-check"></i>Còn hàng</li>
									<li><i class="fal fa-check"></i>Giao hàng miễn phí khắp tỉnh</li>
									<li><i class="fal fa-check"></i>Giảm giá thường xuyên vào các dịp lễ</li>
								</ul>

								<p class="description mb--40">{{ $products->short_description_vi }}</p>

								<!-- Start Product Action Wrapper  -->
								<div class="product-action-wrapper d-flex-center">

									<!-- Start Product Action  -->
									<ul class="product-action action-style-two d-flex-center mb--0">
										<li class="add-to-cart"><a href="https://www.amazon.com/" class="axil-btn btn-bg-primary">Thêm vào giỏ hàng</a></li>
										<li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
									</ul>
									<!-- End Product Action  -->

								</div>
								<!-- End Product Action Wrapper  -->
							@else

								<ul class="product-meta">

										<li><i class="fal fa-check"></i>In stock</li>
										<li><i class="fal fa-check"></i>Free delivery available</li>
										<li><i class="fal fa-check"></i>Sales Off at Holidays</li>
								</ul>

								<p class="description mb--40">{{ $products->short_description_en }}</p>

								<!-- Start Product Action Wrapper  -->
								<div class="product-action-wrapper d-flex-center">

									<!-- Start Product Action  -->
									<ul class="product-action action-style-two d-flex-center mb--0">
										<li class="add-to-cart"><a href="https://www.amazon.com/" class="axil-btn btn-bg-primary">Add To Cart</a></li>
										<li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
									</ul>
									<!-- End Product Action  -->

								</div>
								<!-- End Product Action Wrapper  -->

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End .single-product-thumb -->

	@if(session()->get('language') == 'vietnamese')
		<div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
			<div class="container">
				<div class="product-desc-wrapper mb--30 mb_sm--10">
					<h4 class="mb--60 desc-heading">Mô Tả</h4>
					<div class="row mb--15">
						<div class="col-lg-12 mb--30">
							<div class="single-desc">
								{!! $products->long_description_en !!}
							</div>
						</div>
						<!-- End .col-lg-12 -->
					</div>
					<!-- End .row -->
					<div class="row">
						<div class="col-lg-12">
							<ul class="pro-des-features">
								<li class="single-features">
									<div class="icon">
										<img src="{{ asset('frontend/assets/images/product/product-thumb/icon-3.png') }}" alt="icon">
									</div>
									Easy Returns
								</li>
								<li class="single-features">
									<div class="icon">
										<img src="{{ asset('frontend/assets/images/product/product-thumb/icon-2.png') }}" alt="icon">
									</div>
									Quality Service
								</li>
								<li class="single-features">
									<div class="icon">
										<img src="{{ asset('frontend/assets/images/product/product-thumb/icon-1.png') }}" alt="icon">
									</div>
									Original Product
								</li>
							</ul>
							<!-- End .pro-des-features -->
						</div>
					</div>
					<!-- End .row -->
				</div>
				<!-- End .product-desc-wrapper -->


			</div>
		</div>
	@else
		<div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
			<div class="container">
				<div class="product-desc-wrapper mb--30 mb_sm--10">
					<h4 class="mb--60 desc-heading">Description</h4>
					<div class="row mb--15">
						<div class="col-lg-6 mb--30">
							<div class="single-desc">
								{!! $products->long_description_en !!}
							</div>
						</div>
					</div>
					<!-- End .row -->
					<div class="row">
						<div class="col-lg-12">
							<ul class="pro-des-features">
								<li class="single-features">
									<div class="icon">
										<img src="assets/images/product/product-thumb/icon-3.png" alt="icon">
									</div>
									Easy Returns
								</li>
								<li class="single-features">
									<div class="icon">
										<img src="assets/images/product/product-thumb/icon-2.png" alt="icon">
									</div>
									Quality Service
								</li>
								<li class="single-features">
									<div class="icon">
										<img src="assets/images/product/product-thumb/icon-1.png" alt="icon">
									</div>
									Original Product
								</li>
							</ul>
							<!-- End .pro-des-features -->
						</div>
					</div>
					<!-- End .row -->
				</div>
				<!-- End .product-desc-wrapper -->


			</div>
		</div>
	@endif
</div>
<!-- End Shop Area  -->


<!-- Start Recently Viewed Product Area  -->
<div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
	<div class="container">
		<div class="section-title-wrapper">
			<span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>Đặc Sắc</span>
			<h3 class="title">Mới Nhất</h3>
		</div>
		<div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">

			@foreach($feature_products as $product)
				<div class="slick-single-layout">
					<div class="axil-product">
						<div class="thumbnail">
							<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
								<img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name_vi }}">
							</a>

							@php
                              $amount = $product->selling_price - $product->discount_price;
                              $formated_amount = number_format($amount);
                              $selling_price = number_format($product->selling_price);
                            @endphp

							<div class="product-hover-action">
								<ul class="cart-action">
									<li class="select-option"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">Xem Thêm</a></li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<div class="inner">
								<h5 class="title"><a href="single-product.html">{{ $product->product_name_vi }}</a></h5>
								<div class="product-price-variant">

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
			<!-- End .slick-single-layout -->
			@endforeach

		</div>
	</div>
</div>
<!-- End Recently Viewed Product Area  -->


<!-- Start Axil Newsletter Area  -->
<div class="axil-newsletter-area axil-section-gap pt--0">
	<div class="container">
		<div class="etrade-newsletter-wrapper bg_image bg_image--5">
			<div class="newsletter-content">
				<span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
				<h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
				<div class="input-group newsletter-form">
					<div class="position-relative newsletter-inner mb--15">
						<input placeholder="example@gmail.com" type="text">
					</div>
					<button type="submit" class="axil-btn mb--15">Subscribe</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End .container -->
</div>
<!-- End Axil Newsletter Area  -->


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service1.png') }}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service2.png') }}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Money Back Guarantee</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service3.png') }}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">24 Hour Return Policy</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service4.png') }}" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Pro Quality Support</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection