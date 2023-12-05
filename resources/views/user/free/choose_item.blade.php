<?php

?>
@extends('user.layouts.free')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center">
                        Here's what our members are saying:
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
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">95% report less stress</h4>
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
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">82% report better sleep</h4>
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
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">75% report increased focus</h4>
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
                                        <div class="px-30 py-30 bg-white">
                                            <h4 class="text-17 lh-15 fw-500">92% report improved mood</h4>
                                        </div>

                                    </div>
                                </div>
                             @endif

                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-30">
                        <button type="submit"  class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </section>

        </div>
    </div>
@endsection
