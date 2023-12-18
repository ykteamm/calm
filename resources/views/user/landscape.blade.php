@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
      <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd" >

        <div class="sidebar -base-sidebar">
            <div class="menu_div">
                <button type="button" id="close_btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="sidebar__inner top_width">
            <div>
              <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">
                  <h2 class="font_family_a text-color-white-for">
                      Medidation
                  </h2>
              </div>
              <div>
                @foreach ($menus as $menu)
                  <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                    <a href="{{route('menu-index', ['slug'=> $menu->slug])}}" class="-dark-sidebar-white d-flex items-center font_family_a" style="font-size: 20px">
                      <div class="icon-circle mr-10">
                        <i class="icon-discovery"></i>
                      </div>
                      {{$menu->translation->name}}
                    </a>
                  </div>
                @endforeach

                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('landscape')}}" class="-dark-sidebar-white d-flex items-center font_family_a" style="font-size: 20px" >
                            <div class="icon-circle mr-10">
                                <i class="icon-discovery"></i>
                            </div>
                            Manzara
                        </a>
                    </div>

{{--                    <div class="sidebar__item text-color-white mb-20">--}}
{{--                        <a href="{{url('free')}}" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">--}}
{{--                            <div class="icon-circle mr-10">--}}
{{--                                <i class="icon-discovery"></i>--}}
{{--                            </div>--}}
{{--                            Free Uz--}}
{{--                        </a>--}}
{{--                    </div>--}}


              </div>
            </div>

          </div>
        </div>

      </div>

{{--        main-color class dashboard backgroud--}}
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">

            <div id="landscapeVideoTest" style="position: relative; z-index: 2; background: linear-gradient(90deg, #162a39, #194d75);color: #f1f1f1; width: 100%;height: 900px;padding: 20px;">
                {{-- @foreach ($landscapes as $item)
                    @if ($item->video)
                    <video autoplay loop muted playsinline id="landscapeVideoItem{{$item->id}}" class="background-video " style="position: absolute; z-index: 0;opacity: 50%; right: 0; bottom: 0;left: 0; min-width: 100%; min-height: 100%; display: none">
                        <source src="{{asset($item->video->path)}}" type="video/mp4">
                    </video>
                    @endif
                @endforeach --}}
                {{-- <video autoplay loop muted playsinline id="myVideo" class="background-video " style="position: absolute; z-index: 0;opacity: 50%; right: 0; bottom: 0;left: 0; min-width: 100%; min-height: 100%; display: none">
                    <source src="../calm/media/video_bg.mp4" type="video/mp4">
                </video>

                <video autoplay loop muted playsinline id="myVideo1" class="background-video " style="position: absolute; z-index: 0;opacity: 50%; right: 0; bottom: 0;left: 0; min-width: 100%; min-height: 100%; display: none">
                    <source src="../calm/media/forest.mp4" type="video/mp4">
                </video> --}}


                <div class="container">
                    <div class="menu__btn" id="menu_btn" style="padding: 0 !important;">
                        Menu
                    </div>
                </div>
                <div class="container pt-40" style="position: relative; z-index: 5;">
                    <div class="col-auto">
                        <h1 class="text-30 text-color-white lh-12 fw-700 font_family_a">
                            Scenes
                        </h1>
                        <h1>
                            <input type="range" class="volume" id="volume_audio" value="0" maxlength="100">
                        </h1>
                    </div>
                </div>

                <section class="layout-pb-lg" style="position: relative; z-index: 6">
                    <div class="container">
                        <div class="row y-gap-30 pt-60">
                            @foreach ($landscapes as $item)
                                <div class="col-lg-3 col-md-6" style="cursor: pointer;">
                                    <div onclick="landscapeAudio({{$item}})" id="playBtn" data-anim-child="slide-left delay-2" class="blogCard -type-1 rounded-8 border-light shadow-1 overflow-hidden is-in-view">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            @if ($item->image)
                                                <img class="img-ratio" src="{{$item->image->path}}" alt="image">
                                            @else
                                                <img class="img-ratio" src="../calm/img/home-3/blog/img.png" alt="image">
                                            @endif
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">{{$item->name}}</h4>
                                        </div>

                                    {{-- <button id="playBtn">Play</button>

                                    <button id="stopBtn">Stop</button> --}}

                                        {{-- <audio class="my_audio d-none" id="landscapeAudioItem{{$item->id}}" controls  preload="none">
                                            @if ($item->audio)
                                                <source src="{{asset($item->audio->path)}}" type="audio/ogg">
                                                <source src="{{asset($item->audio->path)}}" type="audio/mpeg">
                                            @else
                                                <source src="../player/desire.mp3" type="audio/ogg">
                                                <source src="../player/desire.mp3" type="audio/mpeg">
                                            @endif
                                            Your browser does not support the audio element.
                                        </audio> --}}

                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="col-lg-3 col-md-6" style="cursor: pointer;">
                                <div id="playBtn" data-anim-child="slide-left delay-2" class="blogCard -type-1 rounded-8 border-light shadow-1 overflow-hidden is-in-view">
                                    <div class="blogCard__image ratio ratio-3:2">
                                        <img class="img-ratio" src="../calm/img/home-3/blog/img.png" alt="image">
                                    </div>
                                    <div class="px-30 py-30 bg-white">
                                        <h4 class="text-17 lh-15 fw-500 font_family_a">Jasper Lake</h4>
                                    </div>

                                   <button id="playBtn">Play</button>

                                   <button id="stopBtn">Stop</button>

                                    <audio class="my_audio d-none" id="audio-player" controls  preload="none">
                                        <source src="../player/desire.mp3" type="audio/ogg">
                                        <source src="../player/desire.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" style="cursor: pointer;">
                                <div id="playBtn1" data-anim-child="slide-left delay-2" class="blogCard -type-1 rounded-8 border-light shadow-1 overflow-hidden is-in-view">
                                    <div class="blogCard__image ratio ratio-3:2">
                                        <img class="img-ratio" src="../calm/img/home-3/blog/img_1.png" alt="image">
                                    </div>
                                    <div class="px-30 py-30 bg-white">
                                        <h4 class="text-17 lh-15 fw-500 font_family_a">Denali</h4>
                                    </div>

                                                                   <button id="playBtn">Play</button>

                                                                   <button id="stopBtn">Stop</button>

                                    <audio class="my_audio1 d-none" id="audio-player-1" controls  preload="none">
                                        <source src="../player/sound.mp3" type="audio/ogg">
                                        <source src="../player/sound.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                </div>
                            </div> --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
