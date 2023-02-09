@extends('frontend.main_master')

@section('title')
	Báo Giá
@endsection

@section('content')

	<!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                    	@if(session()->get('language') == 'english')
	                        <ul class="axil-breadcrumb">
	                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
	                            <li class="separator"></li>
	                            <li class="axil-breadcrumb-item active" aria-current="page">Pricing</li>
	                        </ul>
	                        <h1 class="title">Our Price List</h1>
                        @else
                        	<ul class="axil-breadcrumb">
	                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
	                            <li class="separator"></li>
	                            <li class="axil-breadcrumb-item active" aria-current="page">Báo Giá</li>
                        	</ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->


    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8">
    				<div class="row g-5">

    					@foreach($data as $item)
	    					@if(session()->get('language') == 'english')
	    						<div class="col-md-6">
		    						<div class="content-blog blog-grid">
		    							<div class="inner">
		    								<div class="thumbnail">
		    									<a href="{{ route('price_list.detail', [$item->id,$item->title_slug]) }}">
		    										<img src="{{ asset($item->image) }}" alt="Blog Images">
		    									</a>
		    									<div class="blog-category">
		    										<a href="#">{{ $item->name_en }}</a>
		    									</div>
		    								</div>
		    								<div class="content">
		    									<h5 class="title"><a href="{{ route('price_list.detail', [$item->id,$item->title_slug]) }}">{{ $item->title_en }}</a></h5>

		    									<div class="read-more-btn">
		    										<a class="axil-btn right-icon" href="{{ route('price_list.detail', [$item->id,$item->title_slug]) }}">Read More <i class="fal fa-long-arrow-right"></i></a>
		    									</div>
		    								</div>
		    							</div>
		    						</div>
		    					</div>
	    					@else
	    						<div class="col-md-6">
		    						<div class="content-blog blog-grid">
		    							<div class="inner">
		    								<div class="thumbnail">
		    									<a href="{{ route('price_list.detail', [$item->id,$item->title_slug]) }}">
		    										<img src="{{ asset($item->image) }}" alt="Blog Images">
		    									</a>
		    									<div class="blog-category">
		    										<a href="#">{{ $item->name_vi }}</a>
		    									</div>
		    								</div>
		    								<div class="content">
		    									<h5 class="title"><a href="{{ route('price_list.detail',[$item->id,$item->title_slug]) }}">{{ $item->title_vi }}</a></h5>

		    									<div class="read-more-btn">
		    										<a class="axil-btn right-icon" href="{{ route('price_list.detail',[$item->id,$item->title_slug]) }}">Xem Thêm <i class="fal fa-long-arrow-right"></i></a>
		    									</div>
		    								</div>
		    							</div>
		    						</div>
		    					</div>
	    					@endif
	    				@endforeach
    					
    					
    				</div>
    			</div>
    			<div class="col-lg-4">
    				<!-- Start Sidebar Area  -->
    				<aside class="axil-sidebar-area">

    					<!-- Start Single Widget  -->
    					<div class="axil-single-widget mt--40">
    						<h6 class="widget-title">Đặt in ngay</h6>

    						<!-- Start Single Post List  -->
    						<div class="content-blog post-list-view mb--20">
    							<form method="POST" action="{{ route('store.message') }}">
                                    @csrf

                                    <div class="row row--10">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="contact-name">Name <span>*</span></label>
                                                <input type="text" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="contact-phone">Phone <span>*</span></label>
                                                <input type="text" name="phone" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="contact-email">E-mail <span>*</span></label>
                                                <input type="email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Your Message</label>
                                                <textarea name="message" id="message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button type="submit" class="axil-btn btn-bg-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
    						</div>
    						<!-- End Single Post List  -->

    				</aside>
    				<!-- End Sidebar Area -->
    			</div>
    		</div>
    		<!-- End post-pagination -->
    	</div>
    	<!-- End .container -->
    </div>
    <!-- End Blog Area  -->

	

	<!-- Start Most Sold Product Area  -->
        @include('frontend.body.video')
    <!-- End Most Sold Product Area  -->





@endsection



























