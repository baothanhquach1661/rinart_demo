@extends('frontend.main_master')

@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

@section('title')
    {{ $user->name }} Profile
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
                            <li class="axil-breadcrumb-item active" aria-current="page">Profile</li>
                        </ul>
                        <h3 class="title">Hi {{ $user->name }}!</h1>
                    @else
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
                        </ul>
                        <h3 class="title">Xin Chào {{ $user->name }} !</h3>
                    @endif
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

<!-- Start My Account Area  -->
<div class="axil-dashboard-area axil-section-gap">
    <div class="container">
        <div class="axil-dashboard-warp">
            <div class="axil-dashboard-author">
                <div class="media">
                    <div class="thumbnail">
                    </div>
                    <div class="media-body">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <aside class="axil-dashboard-aside">
                        <nav class="axil-dashboard-nav">
                            <div class="nav nav-tabs" role="tablist">
                                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download"></i>Downloads</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false"><i class="fas fa-home"></i>Change Password</a>
                                <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                                <a class="nav-item nav-link" href="{{ route('user.logout') }}"><i class="fal fa-sign-out"></i>Logout</a>
                            </div>
                        </nav>
                    </aside>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                            <div class="axil-dashboard-overview">
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                            <div class="axil-dashboard-order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>On Hold</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#6523</th>
                                                <td>September 10, 2020</td>
                                                <td>Processing</td>
                                                <td>$326.63 for 3 items</td>
                                                <td><a href="#" class="axil-btn view-btn">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                            <div class="axil-dashboard-order">
                                <p>You don't have any download</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-address" role="tabpanel">
                            <div class="axil-dashboard-address">
                                <form class="account-details-form" action="{{ route('user.password.update') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                @error('oldpassword')

                                                    <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                                <input id="current_password" name="oldpassword" type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                @error('password')

                                                    <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                                <input id="password" name="password" type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                @error('password_confirmation')

                                                    <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group mb--0">
                                            <input type="submit" class="axil-btn" value="Save Changes">
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div> {{-- Change Password Area --}}


                        <div class="tab-pane fade" id="nav-account" role="tabpanel">
                            <div class="col-lg-9">
                                <div class="axil-dashboard-account">

                                    <form class="account-details-form" action="{{ route('user.profile.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input id="email" name="email" type="text" class="form-control" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input id="address" name="address" type="text" class="form-control" value="{{ $user->address }}">
                                                </div>
                                            </div>

                                            <div class="form-group mb--0">
                                                <input type="submit" class="axil-btn" value="Save Changes">
                                            </div>
                                            
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Area  -->

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




@endsection