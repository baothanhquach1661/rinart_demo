@php

  $video = "https://www.youtube.com/watch?v=cWyPS2P4cRY";
  $convertedURL = str_replace("watch?v=", "embed/", $video);
  $data = App\Models\Video::find(1);

@endphp



<div class="video-banner-area">
  <div class="container">
      <div class="product-area pb--80">
          <div class="section-title-wrapper section-title-center">
              <span class="title-highlighter highlighter-primary"><i class="far fa-film-alt"></i> Video</span>
              <h2 class="title">{{ $data->title }}</h2>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="video-banner">
                      <img src="{{ asset($data->video_image) }}" alt="Images">
                        <div class="popup-video-icon">
                            <a href="{{ $data->video_url }}" class="popup-youtube video-icon">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>