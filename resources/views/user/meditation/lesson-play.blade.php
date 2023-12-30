@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
   <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('{{asset($lesson->image->path)}}');height:100vh;background-size: cover;background-position: center center;
    background-repeat: no-repeat;">
    {{-- <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('https://assets.calm.com/384/9c1d8d0876904827cf12a9cc228ad435.jpeg');height:100vh;background-size: cover;" > --}}
      @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0" >
        {{-- <div class="dashboard__main mt-0 main-color" style="background-image: url('calm/2.jpg');height: 100vh"> --}}
        <div class="dashboard__content pt-0 px-15 pb-0" style="background: rgba(146, 164, 255, 0.129);height:100%">
            <section class="layout-pt-md layout-pb-lg">
                <div class="container">
                    <div class="teamCard__img" style="text-align: center">
                      @if ($lesson->meditation->meditator->image)
                          <img src="{{asset($lesson->meditation->meditator->image->path)}}" alt="image" style="width:20%" class="rounded-200">
                      @endif
                      </div>
                    <div style="text-align: center">
                        <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12" style="color:white;">{{$lesson->meditation->meditator->firstname}} {{$lesson->meditation->meditator->lastname}}</h4>
                    </div>

                  <div class="row justify-center pt-60">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                      <div class="overflow-hidden js-testimonials-slider">
                        <div class="row y-gap-20 justify-center text-center">
                            <div class="col-auto">
                              <div class="sectionTitle ">
                                <h2 class="sectionTitle__title " style="color: #fff;margin-bottom:30px">{{$lesson->meditation->translation->name}}</h2>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <button id="lessonPlayButton" onclick="playerOpenClose({{$lesson->audio}}, {{$lesson->meditation->lessons}})" class="d-none">
                      {{-- @foreach ($lesson->meditation->lessons as $lesson)
                        <div onclick="playerOpenClose({{$lesson->audio}}, {{$lesson->meditation->lessons}})" class="d-flex justify-between py-8 mb-40" style="background: #fff;border-radius:20px;width:100%;margin: 30px 0;cursor: pointer">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-heart"></div>
                            <h2 class="ml-10" >Lesson {{$lesson->translation->name}}</h2>
                          </div>
                          <div class="text-dark-1">{{2}} m</div>
                        </div>
                      @endforeach --}}
                    </button>
                  </div>
                </div>
              </section>
        </div>
      </div>
    </div>
  </div>
  <div class="player">
    <div class="p-controls-panel">
      <div class="p-titl" style="color: #fff">
          {{$lesson->translation->name}}
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
@section('script')
    <script>
      let button = document.getElementById('lessonPlayButton');
      window.addEventListener('load', () => {
        button.click();
      })
    </script>
@endsection