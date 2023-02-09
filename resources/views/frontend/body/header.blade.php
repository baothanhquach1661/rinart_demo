<header class="header axil-header header-style-5">

  <div class="axil-header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="header-top-dropdown">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                          @if(session()->get('language') == 'vietnamese')
                            Ngôn Ngữ
                          @else
                            Language
                          @endif

                        </button>
                        <ul class="dropdown-menu">

                          @if(session()->get('language') == 'vietnamese')
                            <li><a class="dropdown-item" href="{{ route('english.language') }}">English</a></li>
                          @else
                            <li><a class="dropdown-item" href="{{ route('vietnamese.language') }}">Tiếng Việt</a></li>
                          @endif

                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="header-top-link">
                    <ul class="quick-link">
                        <li><a href="https://www.facebook.com/intemnhanrinart" class="fab fa-facebook-f" style="font-size: 18px;"></a></li>
                        <li><a href="sign-in.html" class="fab fa-instagram" style="font-size: 18px;"></a></li>
                        <li><a href="sign-in.html" class="fab fa-youtube" style="font-size: 18px;"></a></li>
                        <li>
                            <a href="tel:0909888213" class="fab fa-whatsapp" style="font-size: 18px;"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Start Mainmenu Area  -->
  <div id="axil-sticky-placeholder"></div>
  <div class="axil-mainmenu">
    <div class="container">
        <div class="header-navbar">
            <div class="header-brand">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <img src="{{ asset('frontend/assets/images/logo/rinart_logo.png') }}" alt="Site Logo">
                </a>
                <a href="{{ url('/') }}" class="logo logo-light">
                    <img src="{{ asset('frontend/assets/images/logo/rinart_logo.png') }}" alt="Site Logo">
                </a>
            </div>
            <div class="header-main-nav">
                <!-- Start Mainmanu Nav -->
                <nav class="mainmenu-nav">
                    <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                    <div class="mobile-nav-brand">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('frontend/assets/images/logo/rinart_logo.png') }}" alt="Site Logo">
                        </a>
                    </div>
                    <ul class="mainmenu">

                      @if(session()->get('language') == 'vietnamese')
                        <li><a href="{{ url('/') }}">Trang Chủ</a></li>

                        <li><a href="{{ route('home.about') }}">Giới Thiệu</a></li>

                        <li class="menu-item-has-children">
                            <a href="#">Dịch Vụ</a>

                            <!-- get categories data -->
                              @php
                                $categories = App\Models\Category::orderBy('category_name_vi', 'ASC')->get();
                              @endphp
                            <!-- end categories data -->

                              <ul class="axil-submenu">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ url('/'.$category->id.'/'.$category->category_slug_vi.'/'.$category->category_name_vi) }}">{{ $category->category_name_vi }}</a>
                                    </li>
                                @endforeach <!-- end category foreach -->
                              </ul>

                        </li>

                        <li><a href="{{ route('price_list') }}">Báo Giá</a></li>

                        <li><a href="{{ route('contact.page') }}">Liên Hệ</a></li>

                      @else
                        <!-- get categories data -->
                          @php
                            $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                          @endphp
                        <!-- end categories data -->

                        <li><a href="{{ url('/') }}">Home</a></li>

                        <li><a href="{{ route('home.about') }}">About</a></li>

                        <li class="menu-item-has-children">
                            <a href="{{ route('products.page') }}">Services</a>
                            <ul class="axil-submenu">

                              @foreach($categories as $category)
                                <li><a href="{{ url('/category/product/'.$category->id.'/'.$category->category_slug_vi) }}">{{ $category->category_name_en }}</a></li>
                              @endforeach

                            </ul>
                        </li>

                        <li><a href="{{ route('price_list') }}">Pricing</a></li>

                        <li><a href="{{ route('contact.page') }}">Contact</a></li>
                      @endif

                    </ul>
                </nav>
                <!-- End Mainmanu Nav -->
            </div>
            <div class="header-action">
                <ul class="action-list">

                    <!-- Search area -->
                    {{-- <li class="axil-search d-xl-block d-none">
                        <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
                        <button type="submit" class="icon wooc-btn-search">
                            <i class="flaticon-magnifying-glass"></i>
                        </button>
                    </li> --}}


                    <!-- Start User login wishlist cart Area -->
                    {{-- <li class="axil-search d-xl-none d-block">
                        <a href="javascript:void(0)" class="header-search-icon" title="Search">
                            <i class="flaticon-magnifying-glass"></i>
                        </a>
                    </li>
                    <li class="wishlist">
                        <a href="{{ route('wishlist') }}">
                            <i class="flaticon-heart"></i>
                        </a>
                    </li>

                    <li class="shopping-cart">
                        <a href="#" class="cart-dropdown-btn">
                            <span class="cart-count" id="cart_qty"></span>
                            <i class="flaticon-shopping-cart"></i>
                        </a>
                    </li>
                    
                    <li class="my-account">
                        <a href="javascript:void(0)">
                            <i class="flaticon-person"></i>
                        </a>
                        <div class="my-account-dropdown">
                            <span class="title">QUICKLINKS</span>
                            <ul>
                                <li>
                                    <a href="{{ url('/dashboard') }}">My Account</a>
                                </li>
                                <li>
                                    <a href="#">Initiate return</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                            <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Login</a>
                            <div class="reg-footer text-center">No account yet? <a href="sign-up.html" class="btn-link">REGISTER HERE.</a></div>
                        </div>
                    </li>
                    <li class="axil-mobile-toggle">
                        <button class="menu-btn mobile-nav-toggler">
                            <i class="flaticon-menu-2"></i>
                        </button>
                    </li> --}}
                    <!-- End User login wishlist cart Area -->


                </ul>
            </div>
        </div>
    </div>
  </div>
  <!-- End Mainmenu Area -->

  @yield('ads')

</header>





















