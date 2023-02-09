<div class="axil-most-sold-product axil-section-gap pb--0">
  <div class="container">
      <div class="product-area pb--50">
          <div class="section-title-wrapper section-title-center">

            @if(session()->get('language') == 'vietnamese')
              <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i>Ưu Đãi</span>
              <h2 class="title">Ưa Đãi Lớn Nhất Trong Tháng</h2>
            @else
              <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i>Big Sales</span>
              <h2 class="title">Best Promotion of the Month</h2>
            @endif

          </div>
          <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 row--15">

              @foreach($speOffer_products as $product)
                <div class="col">
                    <div class="axil-product-list product-list-style-2">
                        <div class="thumbnail">
                            <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">
                                <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="{{ asset($product->product_thumbnail) }}" alt="NFT">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="product-title"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_vi }}<span class="verified-icon"></a></h6>

                            @php
                              $formated_amount = number_format($product->discount_price);
                              $selling_price = number_format($product->selling_price);
                            @endphp

                            <div class="product-price-variant">
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
                            </div>

                            <div class="product-cart">
                                <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}" class="cart-btn">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach

              {{-- <div class="col">
                  <div class="axil-product-list product-list-style-2">
                      <div class="thumbnail">
                          <a href="single-product-7.html">
                              <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend/assets/images/product/nft/product-22.jpg') }}" alt="NFT">
                          </a>
                      </div>
                      <div class="product-content">
                          <h6 class="product-title"><a href="single-product-7.html">Anime #201 <span class="verified-icon"><i class="fas fa-badge-check"></i></span></a></h6>
                          <div class="product-price-variant">
                              <span class="price current-price">$7955</span>
                          </div>
                          <div class="product-cart">
                              <a href="single-product-7.html" class="cart-btn">Buy Product</a>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col">
                  <div class="axil-product-list product-list-style-2">
                      <div class="thumbnail">
                          <a href="single-product-7.html">
                              <img data-sal="zoom-in" data-sal-delay="100" data-sal-duration="1500" src="{{ asset('frontend/assets/images/product/nft/product-26.jpg') }}" alt="NFT">
                          </a>
                      </div>
                      <div class="product-content">
                          <h6 class="product-title"><a href="single-product-7.html">Anime #202 <span class="verified-icon"><i class="fas fa-badge-check"></i></span></a></h6>
                          <div class="product-price-variant">
                              <span class="price current-price">$2999</span>
                          </div>
                          <div class="product-cart">
                              <a href="single-product-7.html" class="cart-btn">Buy Product</a>
                          </div>
                      </div>
                  </div>
              </div> --}}
          </div>
      </div>
  </div>
</div>



















