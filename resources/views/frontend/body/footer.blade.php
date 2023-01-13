<footer class="axil-footer-area footer-style-1 footer-dark">


@php

    $data = App\Models\FooterSetting::find(1);

@endphp

  <!-- Start Footer Top Area  -->
  <div class="footer-top">
    <div class="container">
        <div class="row">
            <!-- Start Single Widget  -->
            <div class="col-md-3 col-sm-12">
                <div class="axil-footer-widget">
                    <div class="logo mb--30">
                        <a href="index.html">
                            <img class="light-logo" src="{{ asset($data->logo_footer) }}" alt="RinArt Logo">
                        </a>
                    </div>
                    <div class="inner">
                        <p>{!! $data->address !!}</p>
                        <div class="social-share">
                            <p><i class="fa fa-phone"></i>   {{ $data->phone_1 }}</p>
                        </div>
                        <br>
                        <div class="social-share">
                            <p><i class="fa fa-phone"></i>   {{ $data->phone_2 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Widget  -->
            <!-- Start Single Widget  -->
            <div class="col-md-3 col-sm-4">
                <div class="axil-footer-widget">
                    <h5 class="widget-title">{{ $data->about }}</h5>
                    <div class="inner">
                        <ul>
                            <li><a href="#">{{ $data->about_1 }}</a></li>
                            <li><a href="#">{{ $data->about_2 }}</a></li>
                            <li><a href="#">{{ $data->about_3 }}</a></li>
                            <li><a href="#">{{ $data->about_4 }}</a></li>
                            <li><a href="#">{{ $data->about_5 }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Widget  -->
            <!-- Start Single Widget  -->
            <div class="col-md-3 col-sm-4">
                <div class="axil-footer-widget">
                    <h5 class="widget-title">{{ $data->account }}</h5>
                    <div class="inner">
                        <ul>
                            <li><a href="#">{{ $data->account_1 }}</a></li>
                            <li><a href="#">{{ $data->account_2 }}</a></li>
                            <li><a href="#">{{ $data->account_3 }}</a></li>
                            <li><a href="#">{{ $data->account_4 }}</a></li>
                            <li><a href="#">{{ $data->account_5 }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Widget  -->
            <!-- Start Single Widget  -->
            <div class="col-md-3 col-sm-4">
                <div class="axil-footer-widget">
                    <h5 class="widget-title">{{ $data->support }}</h5>
                    <div class="inner">
                        <ul>
                            <li><a href="#">{{ $data->support_1 }}</a></li>
                            <li><a href="#">{{ $data->support_2 }}</a></li>
                            <li><a href="#">{{ $data->support_3 }}</a></li>
                            <li><a href="#">{{ $data->support_4 }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Single Widget  -->
        </div>
    </div>
  </div>
  <!-- End Footer Top Area  -->
  <!-- Start Copyright Area  -->
  <div class="copyright-area copyright-default separator-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-12">
                <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">
                    <ul class="quick-link">
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-of-service.html">Terms of Service</a></li>
                    </ul>
                    <ul class="quick-link">
                        <li>© 2022. All rights reserved by <a target="_blank" href="https://axilthemes.com/">RinArt</a>.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- End Copyright Area  -->

</footer>