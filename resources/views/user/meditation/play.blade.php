@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('/images2/images/{{$medidation->meditator->image->name}}.{{$medidation->meditator->image->extension}}');height:100vh;background-size: cover;">
      <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 pd" style="background: rgba(0, 0, 0, 0.3);backdrop-filter: blur(12px);">

        <div class="sidebar -base-sidebar">
          <div class="sidebar__inner">
            <div>
              <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">General</div>
              <div>

                @for ($i=0;$i<7;$i++)

                <div class="sidebar__item text-color-white mb-20">
                  <a href="about-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <div class="icon-circle mr-10">
                      <i class="icon-discovery"></i>
                    </div>
                    Explore
                  </a>
                </div>

                @endfor
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="dashboard__main mt-0">
        {{-- <div class="dashboard__main mt-0 main-color" style="background-image: url('calm/2.jpg');height: 100vh"> --}}
        <div class="dashboard__content pt-0 px-15 pb-0">
            <section class="layout-pt-md layout-pb-lg">
                <div class="container">
                  <div class="row y-gap-20 justify-center text-center">
                    <div class="col-auto">

                      <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{{$medidation->translation->name}}</h2>

                      </div>

                    </div>
                  </div>

                  <div class="row justify-center pt-60">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                      <div class="overflow-hidden js-testimonials-slider">
                        {{-- <div class="swiper-wrapper"> --}}

                          {{-- <div class="swiper-slide h-100"> --}}
                            {{-- <div data-anim="slide-up" class="testimonials -type-2 text-center"> --}}
                              {{-- <div class="testimonials__icon">
                                <img src="img/misc/quote.svg" alt="quote">
                              </div> --}}
                              <div class="testimonials__text md:text-20 fw-500 text-dark-1 text-center">{{$medidation->meditator->firstname}} {{$medidation->meditator->lastname}}</div>
                              <div class="testimonials__author">
                                {{-- <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                <div class="mt-5">Product Manager, Apple Inc</div> --}}
                                
                                <div class="mt-25">

                                  
        
                                  @foreach ($medidation->lessons as $vali)
                                      

                                  <div class="d-flex justify-between py-8 mb-40">
                                    <div class="d-flex items-center text-dark-1">
                                      {{-- <div class="icon-heart"></div> --}}
                                      <div class="ml-10" onclick="playerOpenClose()">{{$vali->audios[0]->name}}</div>
                                      {{-- <div class="ml-10">{{$vali->audios[0]->duration}}</div> --}}
                                    </div>
                                    <div class="text-dark-1">{{$vali->audios[0]->duration}} m</div>
                                  </div>
                                  @endforeach
        
                                </div>
                              </div>
                            {{-- </div> --}}
                          {{-- </div> --}}

                          

                        {{-- </div> --}}

                        {{-- <div class="pt-60 lg:pt-40">
                          <div class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">

                            <div class="col-auto">
                              <div class="pagination__item ">
                                <img src="img/home-3/testimonials/5.png" alt="image">
                              </div>
                            </div>

                          </div>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </section>


        </div>
      </div>
    </div>
  </div>
  <div class="player">
    <div class="p-controls-panel">
      <div class="p-title">
        1.Calm music 
      </div>
      <div class="p-buttons">
          <div class="p-prev-track" onclick="prevTrack()"><i class="fa fa-step-backward fa-1x"></i></div>
          <div class="p-playpause-track" onclick="playpauseTrack()"><i class="fa fa-play-circle fa-3x"></i></div>
          <div class="p-next-track" onclick="nextTrack()"><i class="fa fa-step-forward fa-1x"></i></div>
      </div>
      <div class="p-stop">
        <div>
          <div class="p-stop-btn" onclick="stopPlayer()">
            <i class="fas fa-stop"></i>
          </div>
            <div class="p-slider_container">
              <i class="fa fa-volume-down"></i>
              <input type="range" min="1" max="100" value="99" class="p-volume_slider" onchange="setVolume()">
              <i class="fa fa-volume-up"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="p-slider_container">
        <div class="p-current-time">00:00</div>
        <input type="range" min="1" max="100" value="0" class="p-seek_slider" onchange="seekTo()">
        <div class="p-total-duration">00:00</div>
    </div>
  </div>
@endsection