@extends('frontend.main_master')

@section('title')
	Cart
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

<!-- Start Cart Area  -->
<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            <div class="product-table-heading">
                <h4 class="title">Your Cart</h4>
                <a href="#" class="cart-clear">Clear Shoping Cart</a>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            @if(session()->get('language') == 'english')
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            @else
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Sản Phẩm</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Giá</th>
                                <th scope="col" class="product-quantity">Số lượng</th>
                                <th scope="col" class="product-subtotal">Đơn Giá</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="cartPage">


                    </tbody>
                </table>
            </div>
            <div class="cart-update-btn-area">
                <div class="input-group product-cupon" id="couponField">
                    @if(Session::has('coupon'))

                    @else
                        <input placeholder="Enter coupon code" type="text" id="coupon_name">
                        <div class="product-cupon-btn">
                            <button type="submit" onclick="applyCoupon()" class="axil-btn btn-outline">Apply</button>
                        </div>
                    @endif
                    
                </div>

                <div class="update-btn">
                    <a href="#" class="axil-btn btn-outline">Update Cart</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-7">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Order Summary</h5>
                        <div class="summery-table-wrap">

                            <table class="table summery-table mb--30">
                                <tbody id="couponCalField">
                                    
                                </tbody>
                            </table>

                        </div>
                        <a href="{{ route('checkout') }}" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Cart Area  -->

@endsection















































