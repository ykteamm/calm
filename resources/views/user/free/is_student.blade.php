<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 87%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        Sizning jinsingiz ?
                    </h3>

{{--                    <h5 class="text-color-white-for text-center font_family_a">--}}
{{--                        This will inform whether you receive guidance related to school.--}}
{{--                    </h5>--}}
                </div>
            </section>

            <section>
                <form action="{{route('free-choose-medicate')}}" method="POST">
                    @csrf
                 <div class="container">
                        <div class="row y-gap-30 pt-60">

                                <div class="col-lg-6 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox" value="0 - 15 minute" class="checkbox-ajax d-none" name="0_15_minute">

                                        <div class="px-30 py-30 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">Erkak</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-6" style="cursor: pointer;">
                                    <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="checkbox"  value="0 - 15 minute" class="checkbox-ajax d-none" name="15_30_minute">

                                        <div class="px-30 py-30 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a">Ayol</h4>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>


                    <div class="text-center mt-40">
                        <button type="submit" id="question" class="d-none btn btn-primary font_family_a">Continue</button>
                    </div>
                </form>

            </section>

        </div>
    </div>
@endsection
