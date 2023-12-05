<?php

?>
@extends('user.layouts.app')
@section('user_content')

<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
      <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd">

        <div class="sidebar -base-sidebar">
          <div class="sidebar__inner">
            <div>
              <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">General</div>
              <div>

                @foreach ($categories as $key => $value)
                  <div class="sidebar__item text-color-white mb-20">
                    <a href="about-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                      <div class="icon-circle mr-10">
                        <i class="icon-discovery"></i>
                      </div>
                      {{$value->translation->name}}
                    </a>
                  </div>
                @endforeach

                    <div class="sidebar__item text-color-white mb-20">
                        <a href="{{url('manzara')}}" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                            <div class="icon-circle mr-10">
                                <i class="icon-discovery"></i>
                            </div>
                            Manzara Uz
                        </a>
                    </div>

                    <div class="sidebar__item text-color-white mb-20">
                        <a href="{{url('free')}}" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                            <div class="icon-circle mr-10">
                                <i class="icon-discovery"></i>
                            </div>
                            Free Uz
                        </a>
                    </div>


              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="dashboard__main mt-0 main-color">
        <div class="dashboard__content pt-0 px-15 pb-0">

            <div class="container pt-40">
                <div class="col-auto">
                    <h1 class="text-30 text-color-white lh-12 fw-700">
{{--                        @dd($time >= "04:00:00" && $time <= "12:00:00")--}}
                        @if(($time >= "04:00:00" && $time <= "12:00:00") == true)
                            Hayrli tong,
                        @elseif(($time >= "12:00:00" && $time <= "18:00:00") == true)
                            Hayrli kun,
                        @elseif(($time >= "18:00:00" && $time <= "23:59:59") == true)
                            Hayrli kech,
                        @else
                            Hayrli tung,
                        @endif
                        Abrorbek
                    </h1>
                </div>
            </div>

{{--            @dd($graduate)--}}
{{--            @dd($motivation)--}}
            <section class="page-header -type-1">
                <div class="container">
                    <div class="page-header__content">
                        <div class="row justify-center text-center">
                            @foreach($motivation as $motiv)
                                @if($motiv->language_code == "en")
                                    <div class="col-auto">
                                        <div data-anim="slide-up delay-2" class="is-in-view">
                                            <p class="page-header__text text-color-white-for">
                                                {{$motiv->text}}
                                            </p>
                                        </div>
                                        <div data-anim="slide-up delay-1" class="is-in-view">
                                            <h1 class="page-header__title text-color-white-for">
                                                {{$motiv->author}}
                                            </h1>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>


            <div class="container pt-40">
                <div class="col-auto">
                    <h1 class="text-30 text-color-white lh-12 fw-700">
                        Scenes
                    </h1>

                    <h1>
                        <input type="range" class="volume" id="volume_audio" value="0" maxlength="100">
                    </h1>
                </div>
            </div>

            <section class="layout-pb-lg">
                <div class="container">
                    <div class="row y-gap-30 pt-60">

                        <div class="col-lg-3 col-md-6" style="cursor: pointer;">
                            <div id="playBtn" data-anim-child="slide-left delay-2" class="blogCard -type-1 rounded-8 border-light shadow-1 overflow-hidden is-in-view">
                                <div class="blogCard__image ratio ratio-3:2">
                                    <img class="img-ratio" src="../calm/img/home-3/blog/img.png" alt="image">
                                </div>
                                <div class="px-30 py-30 bg-white">
{{--                                    <a href="#" class="d-flex items-center text-14 lh-1 text-light-1 mb-15">--}}
{{--                                        <div class="icon-calendar-2"></div>--}}
{{--                                        <div class="ml-8">6 April, 2022</div>--}}
{{--                                    </a>--}}
                                    <h4 class="text-17 lh-15 fw-500">Jasper Lake</h4>
{{--                                    <a href="#" class="d-flex items-center text-14 lh-1 text-light-1 mt-15">--}}
{{--                                        <div class="icon-location"></div>--}}
{{--                                        <div class="ml-8">London, UK</div>--}}
{{--                                    </a>--}}
                                </div>

{{--                                <button id="playBtn">Play</button>--}}

{{--                                <button id="stopBtn">Stop</button>--}}

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
                                    {{--                                    <a href="#" class="d-flex items-center text-14 lh-1 text-light-1 mb-15">--}}
                                    {{--                                        <div class="icon-calendar-2"></div>--}}
                                    {{--                                        <div class="ml-8">6 April, 2022</div>--}}
                                    {{--                                    </a>--}}
                                    <h4 class="text-17 lh-15 fw-500">Denali</h4>
                                    {{--                                    <a href="#" class="d-flex items-center text-14 lh-1 text-light-1 mt-15">--}}
                                    {{--                                        <div class="icon-location"></div>--}}
                                    {{--                                        <div class="ml-8">London, UK</div>--}}
                                    {{--                                    </a>--}}
                                </div>

                                {{--                                <button id="playBtn">Play</button>--}}

                                {{--                                <button id="stopBtn">Stop</button>--}}

                                <audio class="my_audio1 d-none" id="audio-player-1" controls  preload="none">
                                    <source src="../player/sound.mp3" type="audio/ogg">
                                    <source src="../player/sound.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                            </div>
                        </div>


                    </div>
                </div>
            </section>

        </div>
      </div>
    </div>
  </div>
@endsection
