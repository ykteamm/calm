<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-20">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 37%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        Mеning asablarim taranglashgan. O‘zimni qo‘yishga joy topa olmayapman
                    </h3>
                </div>
            </section>

            <section>
                <form action="{{url('/free/choose/keep_awake')}}" method="POST">
                    @csrf
                 <div class="container">
                        <div class="row y-gap-30 pt-60">

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard  card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="d-none" name="0_15_minute">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a" >Har doim</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard  card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="d-none" name="15_30_minute">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">Tez - tez</h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2"  class="blogCard  card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="d-none" name="30_minute_more">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">Ba'zida</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard  card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="d-none" name="15_30_minute">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">Aslo unday emas</h4>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>


                    <div class="text-center mt-40">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>

            </section>

        </div>
    </div>
@endsection
