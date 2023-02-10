@foreach($slides as $slider)
	<div class="axil-main-slider-area main-slider-style-3" 
	style="background-image: url('{{ asset($slider->slider_image) }}');">
	    <div class="container">
	        <div class="row align-items-center">
	            <div class="col-xl-6 col-lg-6">
	                <div class="main-slider-content">
	                	@php
	                		$custom_text = App\Models\CustomText::find(1);
	                	@endphp
	                    <span class="subtitle" style="font-size: {{ $custom_text->text_1 }}px; color: {{ $custom_text->text_1_color }};"><i class="fas fa-fire"></i>{{ $slider->title }}</span>
	                    <h1 class="title">{{ $slider->short_description }}</h1>
	                    <div class="shop-btn">
	                    	<form action="tel:0909888213">
		                        <button type="submit" class="axil-btn btn-bg-white right-icon" style="width:35%;">
		                        	@if(session()->get('language') == 'vietnamese')
		                        		Liên Hệ 
		                        	@else
		                        		Keep in Touch
		                        	@endif
		                        	<i class="fa fa-phone"></i>
		                    	</button>
	                        </form>
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
		                                    <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">
		                                        <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name_vi }}">
		                                    
		                                    </a>

		                                </div>
		                                <div class="product-content">
		                                    <div class="inner">
		                                        <h5 class="title"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_vi }}</a></h5>
		                                        <div class="product-price-variant">
		                                            <span class="price current-price">
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
		                                            </span>
		                                        </div>
		                                        <ul class="cart-action">
		                                            <li class="select-option">
		                                            	<a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">Xem Thêm</a>
		                                            </li>
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















































