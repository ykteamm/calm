<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 96%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">

                    <div class="text-center">
                        <img src="../../player/img_2.png" id="animated-image" class="animated-image" style="width: 200px; height: 200px" alt="">
                    </div>

                        <div id="load" class="mt-20">
                            <div class="font_family_a">A</div>
                            <div class="font_family_a">D</div>
                            <div class="font_family_a">Q</div>
                            <div class="font_family_a">O</div>
                            <div class="font_family_a">M</div>
                            <div class="font_family_a">N</div>
                            <div class="font_family_a">A</div>
                            <div class="font_family_a">L</div>
                            <div class="font_family_a">R</div>
                            <div class="font_family_a">O</div>
                            <div class="font_family_a">Y</div>
                            <div class="font_family_a">Y</div>
                            <div class="font_family_a">A</div>
                            <div class="font_family_a">T</div>
                        </div>

                    <h2 id="ready" class="text-color-white-for text-center font_family_a animated-text-second" style="opacity: 0;">
                        <span style="color: rgb(251 101 89)">Sizning</span> dasturingiz tayyor.
                    </h2>

                    <div id="account" class="text-center mt-60 d-none">
                        <a href="{{url('auth/register')}}">
                            <button class="btn  font_family_a" style="background: #32c5ca; padding: 10px 70px;color: white">
                                Create an account
                            </button>
                        </a>
                    </div>

                    <div id="log_in" class="text-center mt-20 d-none">
                        <p class="font_family_a text-color-white-for">
                            Already have an account?
                            <a href="{{url('auth/login')}}" class="font_family_a" style="color: #32c5ca">
                                Log in
                            </a>
                        </p>
                    </div>

                </div>
            </section>



        </div>
    </div>
@endsection
