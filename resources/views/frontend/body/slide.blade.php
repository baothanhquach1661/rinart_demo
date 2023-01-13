@foreach($slides as $slider)
	<div class="axil-main-slider-area main-slider-style-3" 
	style="background-image: url('{{ asset($slider->slider_image) }}');">
	    <div class="container">
	        <div class="row align-items-center">
	            <div class="col-xl-6 col-lg-6">
	                <div class="main-slider-content">
	                    <span class="subtitle"><i class="fas fa-fire"></i>{{ $slider->title }}</span>
	                    <h1 class="title">{{ $slider->short_description }}</h1>
	                    <div class="shop-btn">
	                        <a href="#" class="axil-btn btn-bg-white right-icon">
	                        	@if(session()->get('language') == 'vietnamese')
	                        		Xem Thêm 
	                        	@else
	                        		Get It
	                        	@endif
	                        <i class="fal fa-long-arrow-right"></i></a>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-6 col-lg-6">
	                <div class="main-slider-large-thumb">
	                    <div class="slider-thumb-activation-two axil-slick-dots">

	                    	@foreach($slide_products as $product)
		                        <div class="single-slide slick-slide">
		                            <div class="axil-product product-style-five">
		                                <div class="thumbnail">
		                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
		                                        <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name_vi }}">
		                                    
		                                    </a>

		                                </div>
		                                <div class="product-content">
		                                    <div class="inner">
		                                        <h5 class="title"><a href="single-product-7.html">{{ $product->product_name_vi }}</a></h5>
		                                        <div class="product-price-variant">
		                                            <span class="price current-price">
		                                            	@php
		                                            		$selling_price = number_format($product->selling_price);
		                                            	@endphp
		                                            		{{ $selling_price }} VND
		                                            </span>
		                                        </div>
		                                        <ul class="cart-action">
		                                            <li class="select-option"><a href="single-product-7.html">Buy Product</a></li>
		                                        </ul>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        @endforeach

	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endforeach
























