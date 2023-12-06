<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 80%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        DID YOU KNOW?
                    </h3>
                    <br><br>
                    <h5 class="text-center text-color-white-for font_family_a">
                        Balance has helped 542,273 people your age improve mental wellness.
                    </h5>

                    <h6 class="text-center text-color-white-for font_family_a">
                        As of January 2022
                    </h6>
                </div>
            </section>

            <section>
                <form action="{{route('free-choose-is_student')}}" method="POST">
                    @csrf

                    <div class="text-center mt-40">
                        <button type="submit"  class="btn btn-primary font_family_a">Continue</button>
                    </div>
                </form>

            </section>

        </div>
    </div>
@endsection
