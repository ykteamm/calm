@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')  
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">
          <div style="width:100%;height:100vh;" class="d-flex flex-column justify-content-between">
            <div class="pt-5 text-center" style="margin-top: 50px">
              <h1 class="text-white">{{__('common.check_yourself')}}</h1>
            </div>
            <div class="text-center" style="margin-bottom: 50px">
              <a href="{{route('quiz.index')}}" class=" btn btn-secondary text-white">{{__('common.start')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
