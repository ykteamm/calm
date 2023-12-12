<?php

?>
@extends('user.layouts.free')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-20">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        Mana bizning a'zolarimiz nima deydi:
                    </h3>
                </div>
            </section>

            <section>
                <form action="{{url('/free/choose/question')}}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row y-gap-30 pt-60">
                            @foreach($data as $dat)
                             @if($dat == "stress")
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
{{--                                        <input type="hidden" name="stress" value="stress" >--}}
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">95% kamroq stress haqida xabar beradi</h4>
                                        </div>
                                    </div>
                                </div>
                             @elseif($dat == "sleep")
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
{{--                                        <input type="hidden" name="sleep" value="sleep" >--}}
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">82% yaxshi uyqu haqida xabar berishadi</h4>
                                        </div>

                                    </div>
                                </div>
                             @elseif($dat == "focus")
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2"  class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
{{--                                        <input type="hidden" name="focus" value="focus" >--}}
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a" >75% e'tiborni kuchaytirganini bildiradi</h4>
                                        </div>
                                    </div>
                                </div>
                             @elseif($dat == "mood")
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
{{--                                        <input type="hidden" name="mood" value="mood" >--}}
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">92% kayfiyat yaxshilanganini qayd etgan</h4>
                                        </div>

                                    </div>
                                </div>
                             @endif

                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-30">
                        <button type="submit"  class="btn btn-primary">Davom etamiz</button>
                    </div>
                </form>
            </section>

        </div>
    </div>
@endsection
