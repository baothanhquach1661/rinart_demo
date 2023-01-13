@extends('frontend.main_master')

@section('title', 'Printing')

@section('content')


  <!-- Start Slider Area -->
    @include('frontend.body.slide')
  <!-- End Slider Area -->


  <!-- Start Categorie Area  -->
    @include('frontend.body.category_area')
  <!-- End Categorie Area  -->


  <!-- Start Best Sellers Product Area  -->
    @include('frontend.body.new_products')
  <!-- End  Best Sellers Product Area  -->


  <!-- Start Expolre Product Area  -->
    @include('frontend.body.explore_products')
  <!-- End Expolre Product Area  -->


  <!-- Start Most Sold Product Area  -->
    @include('frontend.body.most_sell')
  <!-- End Most Sold Product Area  -->


  <!-- Start Why Choose Area  -->
  <div class="how-to-sell-area axil-section-gap">
      <div class="container">
          <div class="product-area pb--50">
              <div class="section-title-wrapper section-title-center">
                  <h2 class="title">How to buy NFTs</h2>
              </div>
              <div class="row row-cols-xl-4 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 row--20">
                  <div class="col">
                      <div class="service-box how-to-sell">
                          <div class="icon">
                              <img src="{{ asset('frontend/assets/images/icons/choose.png') }}" alt="Service">
                          </div>
                          <h6 class="title">Choose Your Favourite</h6>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis ipsum, culpa, asperiores.</p>
                      </div>
                  </div>
                  <div class="col">
                      <div class="service-box how-to-sell">
                          <div class="icon">
                              <img src="{{ asset('frontend/assets/images/icons/protection.png') }}" alt="Service">
                          </div>
                          <h6 class="title">Verify NFTs</h6>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis ipsum, culpa, asperiores.</p>
                      </div>
                  </div>
                  <div class="col">
                      <div class="service-box how-to-sell">
                          <div class="icon">
                              <img src="{{ asset('frontend/assets/images/icons/purchasing.png') }}" alt="Service">
                          </div>
                          <h6 class="title">Purchase NFTS</h6>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis ipsum, culpa, asperiores.</p>
                      </div>
                  </div>
                  <div class="col">
                      <div class="service-box how-to-sell">
                          <div class="icon">
                              <img src="{{ asset('frontend/assets/images/icons/dancing.png') }}" alt="Service">
                          </div>
                          <h6 class="title">Enjoy!</h6>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas expedita veritatis ipsum, culpa, asperiores.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Why Choose Area  -->

  <!-- Video Banner Area  -->
  <div class="video-banner-area">
      <div class="container">
          <div class="product-area pb--80">
              <div class="section-title-wrapper section-title-center">
                  <span class="title-highlighter highlighter-primary"><i class="far fa-film-alt"></i> Video</span>
                  <h2 class="title">Meet The Greater</h2>
              </div>
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="video-banner">
                          <img src="{{ asset('frontend/assets/images/bg/bg-image-7.jpg') }}" alt="Images">
                          <div class="popup-video-icon">
                              <a href="https://www.youtube.com/watch?v=gpeeXlRvQuU&t=3575s" class="popup-youtube video-icon">
                                  <i class="fas fa-play"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Video Banner Area  -->


@endsection