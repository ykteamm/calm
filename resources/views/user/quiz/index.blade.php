@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">
          <div style="width:100%;height:100vh;" class="d-flex flex-column justify-content-between">
            <div class="pt-5 text-center" style="margin-top: 50px">
              <h1 class="text-white">Evaluate your mental well-being to achieve better diet results.</h1>
              {{-- <h1 class="text-white">{{__('common.check_yourself')}}</h1> --}}
            </div>
            {{-- <div class="text-center" style="margin-bottom: 280px">

            </div> --}}
            <div class="text-center" style="margin-bottom: 280px">
                {{-- <div class="row x-gap-10 y-gap-10"> --}}
                    <div class="col-auto">
                        <a href="{{route('quiz.index')}}" class=" btn text-white">
                            <button class="button -md -outline-dark-1 text-dark-1" style="color:white;border: 2px solid white;">{{__('common.start')}}</button>
                        </a>
                    </div>
                {{-- </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
