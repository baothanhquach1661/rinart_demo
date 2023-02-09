@extends('frontend.main_master')

@section('title', 'Printing')

@section('content')

<input type="hidden" id="product_id">


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


  <!-- Start Most Sold Product Area  -->
    @include('frontend.body.video')
  <!-- End Most Sold Product Area  -->






@endsection






















