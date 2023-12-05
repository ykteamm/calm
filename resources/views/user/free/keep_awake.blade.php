<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 42%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center">
                        What tends to keep you awake at night?
                    </h3>
                </div>
            </section>

            <section>
                <form action="{{url('/free/choose/morning_night')}}" method="POST">
                    @csrf
                 <div class="container">
                        <div class="row y-gap-30 pt-60">

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="checkbox-ajax d-none" name="0_15_minute">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Stress</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="checkbox-ajax d-none" name="15_30_minute">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Discomfort</h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2"  class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="checkbox-ajax d-none" name="30_minute_more">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Noise</h4>
                                        </div>
                                    </div>
                                </div>

                            <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                    <input type="checkbox" value="0 - 15 minute" class="checkbox-ajax d-none" name="15_30_minute">
                                    <div class="blogCard__image ratio ratio-3:2">
                                        <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                    </div>
                                    <div class="px-30 py-30 bg-white">
                                        <h4 class="text-17 lh-15 fw-500">Just can't fall asleep</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="text-center mt-40">
                        <button type="submit"  class="btn btn-primary">Continue</button>
                    </div>
                </form>

            </section>

        </div>
    </div>
@endsection
