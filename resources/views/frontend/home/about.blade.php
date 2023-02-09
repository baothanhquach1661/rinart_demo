@extends('frontend.main_master')

@section('title')
	About Us
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
	                            <li class="axil-breadcrumb-item active" aria-current="page">About Us</li>
	                        </ul>
	                        <h1 class="title">About RinArt</h1>
                        @else
                        	<ul class="axil-breadcrumb">
	                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
	                            <li class="separator"></li>
	                            <li class="axil-breadcrumb-item active" aria-current="page">Giới Thiệu</li>
                        	</ul>
                        	<h1 class="title">Về RinArt</h1>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    @php 

    	$about = App\Models\About::find(1);

    @endphp

	@if(session()->get('language') == 'english')
	    <!-- Start About Area  -->
	    <div class="axil-about-area about-style-1 axil-section-gap ">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-xl-4 col-lg-6">
	                    <div class="about-thumbnail">
	                        <div class="thumbnail">
	                            <img src="{{ asset('frontend/assets/images/about_image.jpeg') }}" alt="About Us">
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-8 col-lg-6">
	                    <div class="about-content content-right">
	                        <span class="title-highlighter highlighter-primary2"> <i class="far fa-shopping-basket"></i>About Store</span>
	                        <h3 class="title">Online shopping includes both buying things online.</h3>
	                        <span class="text-heading">Salesforce B2C Commerce can help you create unified, intelligent digital commerce
	                            experiences — both online and in the store.</span>
	                        <div class="row">
	                            <div class="col-xl-6">
	                                <p>Empower your sales teams with industry tailored
	                                    solutions that support manufacturers as they go
	                                    digital, and adapt to changing markets & customers
	                                    faster by creating new business.</p>
	                            </div>
	                            <div class="col-xl-6">
	                                <p class="mb--0">Salesforce B2B Commerce offers buyers the
	                                    seamless, self-service experience of online
	                                    shopping with all the B2B</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- End About Area  -->

	    <div class="about-info-area">
			<div class="container">
				<div class="row row--20">
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-01.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_1_title_en }}</h6>
	                            <p>{{ $about->about_box_1_des_en }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-02.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_2_title_en }}</h6>
								<p>{{ $about->about_box_2_des_en }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-03.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_3_title_en }}</h6>
								<p>{{ $about->about_box_3_des_en }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End About Area  -->

	    <!-- Start Team Area  -->
	    <div class="axil-team-area bg-wild-sand">
			<div class="team-left-fullwidth">
				<div class="container ml--xxl-0">
					<div class="section-title-wrapper">
						<span class="title-highlighter highlighter-primary"> <i class="fas fa-users"></i>RinArt Members</span>
						<h3 class="title"></h3>
					</div>
					<div class="team-slide-activation slick-layout-wrapper--20 axil-slick-arrow  arrow-top-slide">

						@foreach($team_img as $team)
							<div class="slick-single-layout">
								<div class="axil-team-member">
									<div class="thumbnail"><img src="{{ $team->photo_name }}" alt="{{ $team->description_en }}"></div>
									<div class="team-content">
										<span class="subtitle">Founder</span>
										<h5 class="title">{{ $team->description_en }}</h5>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	    <!-- End Team Area  -->

	    <!-- Start About Area  -->
	    <div class="axil-about-area about-style-2">
			<div class="container">
				<div class="row align-items-center mb--80 mb_sm--60">
					<div class="col-lg-5">
						<div class="about-thumbnail">
							<img src="{{ $about->about_banner }}" alt="about">
						</div>
					</div>
					<div class="col-lg-7">
						<div class="about-content content-right">
							<span class="subtitle">Feature #01</span>
							<h4 class="title">{{ $about->about_banner_title_en }}</h4>
							<p>{{ $about->about_banner_des_en }}</p>
							<a href="contact.html" class="axil-btn btn-outline">Keep In Touch</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <!-- End About Area  -->

	    <!-- Start Most Sold Product Area  -->
            @include('frontend.body.video')
        <!-- End Most Sold Product Area  -->
	@else
		<!-- Start About Area  -->
		<div class="axil-about-area about-style-1 axil-section-gap ">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-4 col-lg-6">
						<div class="about-thumbnail">
							<div class="thumbnail">
								<img src="{{ asset('frontend/assets/images/about_image.jpeg') }}" alt="About Us">
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-6">
						<div class="about-content content-right">
							<span class="title-highlighter highlighter-primary2"> <i class="far fa-shopping-basket"></i>Về RinArt</span>
							<h3 class="title">{{ $about->about_title_vi }}</h3>
							<span class="text-heading">{{ $about->about_short_des_vi }}</span>
							<div class="row">
								<div class="col-xl-12">
									<p>{{ $about->about_long_des_vi }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End About Area  -->

		<!-- Start About Area  -->
		<div class="about-info-area">
			<div class="container">
				<div class="row row--20">
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-01.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_1_title_vi }}</h6>
	                            <p>{{ $about->about_box_1_des_vi }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-02.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_2_title_vi }}</h6>
								<p>{{ $about->about_box_2_des_vi }}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="about-info-box">
							<div class="thumb">
								<img src="{{ asset('frontend/assets/images/about/shape-03.png') }}" alt="Shape">
							</div>
							<div class="content">
								<h6 class="title">{{ $about->about_box_3_title_vi }}</h6>
								<p>{{ $about->about_box_3_des_vi }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End About Area  -->

		<!-- Start Team Area  -->
		<div class="axil-team-area bg-wild-sand">
			<div class="team-left-fullwidth">
				<div class="container ml--xxl-0">
					<div class="section-title-wrapper">
						<span class="title-highlighter highlighter-primary"> <i class="fas fa-users"></i>Thành viên của RinArt</span>
						<h3 class="title"></h3>
					</div>
					<div class="team-slide-activation slick-layout-wrapper--20 axil-slick-arrow  arrow-top-slide">

						@foreach($team_img as $team)
							<div class="slick-single-layout">
								<div class="axil-team-member">
									<div class="thumbnail"><img src="{{ $team->photo_name }}" alt="{{ $team->description_vi }}"></div>
									<div class="team-content">
										<span class="subtitle">Founder</span>
										<h5 class="title">{{ $team->description_vi }}</h5>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
		<!-- End Team Area  -->

		<!-- Start About Area  -->
		<div class="axil-about-area about-style-2">
			<div class="container">
				<div class="row align-items-center mb--80 mb_sm--60">
					<div class="col-lg-5">
						<div class="about-thumbnail">
							<img src="{{ $about->about_banner }}" alt="about">
						</div>
					</div>
					<div class="col-lg-7">
						<div class="about-content content-right">
							<span class="subtitle">Đặc Sắc #01</span>
							<h4 class="title">{{ $about->about_banner_title_vi }}</h4>
							<p>{{ $about->about_banner_des_vi }}</p>
							<a href="contact.html" class="axil-btn btn-outline">Liên Hệ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End About Area  -->

		<!-- Start Most Sold Product Area  -->
            @include('frontend.body.video')
        <!-- End Most Sold Product Area  -->
	@endif





@endsection



























