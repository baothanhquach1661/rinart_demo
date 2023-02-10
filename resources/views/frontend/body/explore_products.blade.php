<div class="axil-product-area bg-color-white axil-section-gap pb--0">
  <div class="container">
      <div class="product-area pb--20">
          <div class="axil-isotope-wrapper">
              <div class="product-isotope-heading">
                  <div class="section-title-wrapper">

                    @php
                      $custom_text = App\Models\CustomText::find(1);
                    @endphp

                    @if(session()->get('language') == 'vietnamese')
                      <span class="title-highlighter highlighter-primary" style="font-size: {{ $custom_text->text_4 }}px; color: {{ $custom_text->text_4_color }};"><i class="far fa-shopping-basket"></i> 
                      Sản Phẩm Của RinArt</span>
                      <h2 class="title">Nổi Bật Nhất</h2>
                    @else
                      <span class="title-highlighter highlighter-primary" style="font-size: {{ $custom_text->text_4 }}px; color: {{ $custom_text->text_4_color }};"><i class="far fa-shopping-basket"></i> 
                      Our Products</span>
                      <h2 class="title">Best Seller</h2>
                    @endif

                  </div>
                  <div class="isotope-button">
                      <button data-filter="*" class="is-checked"><span class="filter-text">All</span></button>

                      @foreach($categories as $category)
                        <button data-filter=".{{ $category->category_slug_en }}" class="">
                          @if(session()->get('language') == 'vietnamese')
                            <span class="filter-text">{{ $category->category_name_vi }}</span>
                          @else
                            <span class="filter-text">{{ $category->category_name_en }}</span>
                          @endif
                        </button>
                      @endforeach

                  </div>
              </div>
            
              <div class="row row--15 isotope-list">

                  
                  @foreach($products as $product)

                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product {{ $product->category->category_slug_en }}">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name_vi }}">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">Xem Thêm</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{ url('/'.$product->id.'/'.$product->product_slug_en) }}">

                                      @if(session()->get('language') == 'vietnamese')
                                        {{ $product->product_name_vi }}
                                      @else
                                        {{ $product->product_name_en }}
                                      @endif
                                      <span class="verified-icon"></span></a>

                                    </h5>

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

                                </div>
                            </div>
                        </div>
                    </div>


                  @endforeach  {{-- end foreach all products --}}


                  

              </div>
{{-- <div>{{ $products->links() }}</div> --}}
              

          </div>
      </div>
  </div>
</div>























