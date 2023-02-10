<div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--0">
  <div class="container">
      <div class="product-area pb--50">
          <div class="section-title-wrapper">
            @php
              $custom_text = App\Models\CustomText::find(1);
            @endphp

              @if(session()->get('language') == 'vietnamese')
                <span class="title-highlighter highlighter-primary" style="font-size: {{ $custom_text->text_3 }}px; color: {{ $custom_text->text_3_color }};"> <i class="far fa-shopping-basket"></i>Trong Tháng</span>
                <h2 class="title">Sản Phẩm Mới</h2>
              @else
                <span class="title-highlighter highlighter-primary" style="font-size: {{ $custom_text->text_3 }}px; color: {{ $custom_text->text_3_color }};"> <i class="far fa-shopping-basket"></i>This Month</span>
                <h2 class="title">New Products</h2>
              @endif

          </div>
          <div class="new-arrivals-product-activation-2 slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">

              @foreach($new_products as $product)
                <div class="slick-single-layout">
                    <div class="axil-product product-style-six">
                        <div class="thumbnail">
                            <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">
                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name_vi }}">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <div class="product-price-variant">
                                    <span class="price current-price" style="color: #FF0032;">

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
                                <h5 class="title"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_vi }}<span class="verified-icon"></span></a></h5>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">Xem Thêm</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach <!-- End .slick-single-layout -->
                
          </div>
      </div>
  </div>
</div>



















