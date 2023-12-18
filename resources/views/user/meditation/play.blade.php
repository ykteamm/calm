@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
   <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('{{asset($medidation->meditator->image->path)}}');height:100vh;background-size: cover;">
    {{-- <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('https://assets.calm.com/384/9c1d8d0876904827cf12a9cc228ad435.jpeg');height:100vh;background-size: cover;" > --}}
    <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 pd" style="background: rgba(0, 0, 0, 0.3);backdrop-filter: blur(12px);">
        <div class="sidebar -base-sidebar">
          <div class="sidebar__inner">
            <div>
              <div>
                @foreach ($menus as $key => $value)
                  <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                      <a href="{{route('menu-index', ['slug'=> $value->slug])}}" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                          <div class="icon-circle mr-10">
                              <i class="fas fa-sun"></i>
                          </div>
                          {{$value->translation->name}}
                      </a>
                  </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="dashboard__main mt-0" >
        {{-- <div class="dashboard__main mt-0 main-color" style="background-image: url('calm/2.jpg');height: 100vh"> --}}
        <div class="dashboard__content pt-0 px-15 pb-0" style="background: rgba(146, 164, 255, 0.129);height:100%">
            <section class="layout-pt-md layout-pb-lg">
                <div class="container">
                  <div class="row y-gap-20 justify-center text-center">
                    <div class="col-auto">
                      <div class="sectionTitle ">
                        <h2 class="sectionTitle__title " style="color: #fff;margin-bottom:30px">{{$medidation->translation->name}}</h2>
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
                              <h3 class="text-center" style="color: #fff;margin-bottom:30px">{{$medidation->meditator->firstname}} {{$medidation->meditator->lastname}}</h3>
                              <div class="testimonials__author">
                                {{-- <h5 class="text-17 lh-15 fw-500">Ali Tufan</h5>
                                <div class="mt-5">Product Manager, Apple Inc</div> --}}
                                
                          
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
                    <h3 class="text-center" style="margin: 40px 0;color:#fff">
                      Lessons
                    </h3>
                    @foreach ($medidation->lessons as $lesson)
                      <div onclick="playerOpenClose({{$lesson->audio}}, {{$medidation->lessons}})" class="d-flex justify-between py-8 mb-40" style="background: #fff;border-radius:20px;width:100%;margin: 30px 0;cursor: pointer">
                        <div class="d-flex items-center text-dark-1">
                          <div class="icon-heart"></div>
                          <h2 class="ml-10" >Lesson {{$lesson->translation->name}}</h2>
                        </div>
                        <div class="text-dark-1">{{2}} m</div>
                      </div>
                    @endforeach
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
