<div class="axil-categorie-area bg-color-white axil-section-gap pb--0">
  <div class="container">
      <div class="product-area pb--50">
          <div class="section-title-wrapper">
              <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i>
                
                @if(session()->get('language') == 'vietnamese')
                  Danh Mục
                @else
                  The Categories
                @endif

              </span>
              {{-- <h2 class="title">Categories</h2> --}}
          </div>


          <div class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

              @foreach($categories as $category)

                <div class="slick-single-layout slick-slide">
                    <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100" data-sal-duration="500">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset($category->category_image) }}" alt="{{ $category->category_name_vi }}">
                            <h6 class="cat-title">

                              @if(session()->get('language') == 'vietnamese')
                                {{ $category->category_name_vi }}
                              @else
                                {{ $category->category_name_en }}
                              @endif
                              
                            </h6>
                        </a>
                    </div>
                </div>
              
              @endforeach <!-- End foreach categories -->

              

              <!-- End .slick-single-layout -->
          </div>
      </div>
  </div>
</div>




















