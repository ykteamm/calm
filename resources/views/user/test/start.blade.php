@extends('user.layouts.free')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="-home-9 px-0 js-dashboard-home-9">
        <div class="container">
            <div class="mt-20">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                    <div class="progress-bar" style="width: 5%"></div>
                </div>
            </div>
            <div class="pb-30 pr-30 pl-30" style="padding-top: 150px">
                <div class="row text-center">
                    <h1 class="text-color-white-for font_family_a">Ruhiy holatingizni aniqlash uchun bir nechta savollarga javob bering!</h1>
                    <div class="text-center mt-30">
                        <a href="{{route('test-choose-issue-view')}}" class="btn btn-primary font_family_a">Davom etamiz</a>
                    </div>
                    <div class="text-center mt-30">
                        <a href="{{route('main')}}" class="btn btn-primary font_family_a">Keyinroq</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
