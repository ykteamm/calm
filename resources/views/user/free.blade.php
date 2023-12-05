<?php

?>
@extends('user.layouts.free')
@section('user_content')

<div class="content-wrapper js-content-wrapper">
    <div class="-home-9 px-0 js-dashboard-home-9">
        <div class="container">
            <div class="mt-30">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 5%"></div>
                </div>
            </div>
            <div class="pt-50 pb-30 pr-20 pl-20">
                <form action="{{url('free/choose')}}" method="POST">
                    @csrf
                    <div class="row text-center">
                        <h1 class="text-color-white-for">Answer a few questions to personalize your experince</h1>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Continue</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
  </div>
@endsection
