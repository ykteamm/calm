<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 96%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center">
                        Are you a morning person or a night person?
                    </h3>
                </div>
            </section>

            <section>
                <form>
                    @csrf
                 <div class="container">
                        <div class="row y-gap-30 pt-60">

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox"  class="d-none" name="new">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">New to meditation</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="" class="d-none" name="">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Tried it once or twice</h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2"  class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="" class="d-none" name="30_minute_more">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Meditate occasionally</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="" class="d-none" name="">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img_1.png" alt="image">
                                        </div>
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">Meditate often</h4>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>


                    <div class="text-center mt-40">
                        <a href="/"><button type="button"  class="btn btn-primary">Continue</button></a>

                    </div>
                </form>

            </section>

        </div>
    </div>
@endsection
