<?php

?>
@extends('user.layouts.question')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-30">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 78%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center">
                        How old are you?
                    </h3>
                    <br><br>
                    <h5 class="text-center text-color-white-for">
                        Your guidance will be tailored to your age group.
                    </h5>
                </div>
            </section>

            <section>
                <form action="{{url(route('free-choose-age_metrics'))}}" method="POST">
                    @csrf
                 <div class="container">
                        <div class="row pt-60">
                            <div class="text-center">
                                <input type="number" name="age"  placeholder="AGE" class="text-center" style="width: 100px;height: 50px" required>
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
