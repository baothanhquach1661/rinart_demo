@extends('frontend.main_master')

@section('title')
	CheckOut
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

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a href="javascript:void(0)" class="toggle-btn">Click here to login <i class="fas fa-angle-down"></i></a>
                                </div>
                                <div class="axil-checkout-login toggle-open">
                                    <p>If you didn't Logged in, Please Log in first.</p>
                                    <div class="signin-box">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group mb--0">
                                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="axil-toggle-box">
                                <div class="toggle-bar"><i class="fas fa-pencil"></i> Have a coupon? <a href="javascript:void(0)" class="toggle-btn">Click here to enter your code <i class="fas fa-angle-down"></i></a>
                                </div>

                                <div class="axil-checkout-coupon toggle-open">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <div class="input-group">
                                        <input placeholder="Enter coupon code" type="text">
                                        <div class="apply-btn">
                                            <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" id="first-name" placeholder="Adam">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" id="last-name" placeholder="John">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" id="company-name">
                            </div>
                            <div class="form-group">
                                <label>Country/ Region <span>*</span></label>
                                <select id="Region">
                                    <option value="3">Australia</option>
                                    <option value="4">England</option>
                                    <option value="6">New Zealand</option>
                                    <option value="5">Switzerland</option>
                                    <option value="1">United Kindom (UK)</option>
                                    <option value="2">United States (USA)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Street Address <span>*</span></label>
                                <input type="text" id="address1" class="mb--15" placeholder="House number and street name">
                                <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                            </div>
                            <div class="form-group">
                                <label>Town/ City <span>*</span></label>
                                <input type="text" id="town">
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" id="country">
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="tel" id="phone">
                            </div>
                            <div class="form-group">
                                <label>Email Address <span>*</span></label>
                                <input type="email" id="email">
                            </div>
                            <div class="form-group input-group">
                                <input type="checkbox" id="checkbox1" name="account-create">
                                <label for="checkbox1">Create an account</label>
                            </div>
                            <div class="form-group different-shippng">
                                <div class="toggle-bar">
                                    <a href="javascript:void(0)" class="toggle-btn">
                                        <input type="checkbox" id="checkbox2" name="diffrent-ship">
                                        <label for="checkbox2">Ship to a different address?</label>
                                    </a>
                                </div>
                                <div class="toggle-open">
                                    <div class="form-group">
                                        <label>Country/ Region <span>*</span></label>
                                        <select id="Region">
                                            <option value="3">Australia</option>
                                            <option value="4">England</option>
                                            <option value="6">New Zealand</option>
                                            <option value="5">Switzerland</option>
                                            <option value="1">United Kindom (UK)</option>
                                            <option value="2">United States (USA)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Street Address <span>*</span></label>
                                        <input type="text" id="address1" class="mb--15" placeholder="House number and street name">
                                        <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                                    </div>
                                    <div class="form-group">
                                        <label>Town/ City <span>*</span></label>
                                        <input type="text" id="town">
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" id="country">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone <span>*</span></label>
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Đơn hàng của bạn</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $item)
                                            <tr class="order-product">
                                                <td>
                                                    <div style="overflow:hidden; 
                                                          white-space:nowrap; 
                                                          text-overflow:ellipsis; 
                                                          width:330px;">
                                                        <span style="border-radius: 2em;
                                                                    background-color: rgba(153,153,153,0.9);
                                                                    color: #fff;
                                                                    padding: 0.15em 0.65em;
                                                                    font-size: 0.85714em;">{{ $item->qty }} X</span>
                                                        <img src="{{ asset($item->options->image) }}" alt="" style="width:50px;height: 50px;">
                                                        <strong>{{ $item->name }}</strong>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong>₫{{ number_format($item->subtotal) }}</strong>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if(Session::has('coupon'))
                                            <tr class="order-product">
                                                <td>Coupon Code</td>
                                                <td>
                                                    {{ session()->get('coupon')['coupon_name'] }}
                                                    @if( session()->get('coupon')['discount_percentage'] == null)
                                                        ( ₫{{ session()->get('coupon')['discount_regular'] }} )
                                                    @else
                                                        ( {{ session()->get('coupon')['discount_percentage'] }}% )
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Tổng Cộng</td>
                                                @if( session()->get('coupon')['discount_percentage'] == null)
                                                    <td class="order-total-amount">
                                                        ₫{{ session()->get('coupon')['total_regular_amount'] }}
                                                    </td>
                                                @else
                                                    <td class="order-total-amount">
                                                        ₫{{ session()->get('coupon')['total_percentage_amount'] }}
                                                    </td>
                                                @endif
                                                
                                            </tr>
                                        @else
                                            <tr class="order-total">
                                                <td>Tổng Cộng</td>
                                                <td class="order-total-amount">₫{{ $cart_total }}</td>
                                            </tr>
                                        @endif
                                        

                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment">
                                        <label for="radio4">Direct bank transfer</label>
                                    </div>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio5" name="payment">
                                        <label for="radio5">Cash on delivery</label>
                                    </div>
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="radio6" name="payment" checked>
                                        <label for="radio6">Paypal</label>
                                        <img src="./assets/images/others/payment.png" alt="Paypal payment">
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

    @include('frontend.home.policy_footer')

@endsection















































