@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')  
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;border-radius: 0;overflow: hidden;">
            @if (!$done)
                
            @endif

            <div class="container">
                <div class="d-flex justify-content-center pt-5">
                    <div class="w-100" style="height:350px;overflow:hidden">
                        <img style="margin-top: -200px" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" alt="">
                    </div>
                </div>
                <div style="margin:30px 0">
                    <a class="d-flex justify-content-between btn  btn-secondary ">
                        <span style="font-weight:700">{{__('common.subscribe')}}</span>
                        <span style="font-weight:700">10 $</span>
                    </a>
                    <a class="d-flex justify-content-between btn  btn-secondary mt-3">
                        <span style="font-weight:700">{{__('common.get_now')}}</span>
                        <span style="font-weight:700">15 $</span>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-center bg-white w-100" style="margin:30px 0">
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="w-50" src="https://ideausher.com/wp-content/uploads/2022/01/Blog-Image-Top-10-Food-Delivery-Apps-in-Sydney.png" alt="">
                        </div>
                        <div style="padding-top:40px" class="h4 text-center">
                            {{__('common.delivery')}}
                        </div>
                    </div>   
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="w-50" src="https://www.apsfulfillment.com/wp-content/uploads/2022/11/APS_28-New.jpg" alt="">
                        </div>
                        <div style="padding-top:40px" class="h4 text-center">
                            {{__('common.recieve')}}
                        </div>
                    </div>   
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="w-50" src="https://static.startuptalky.com/2022/02/Delivery-Business-Ideas-India-StartupTalky.jpg" alt="">
                        </div>
                        <div style="padding-top:40px" class="h4 text-center">
                            {{__('common.using')}}
                        </div>
                    </div>                     
                </div>
                <div style="height:1px;background-color:black">
                </div>
                <div style="margin: 30px 0" class="d-flex align-items-center justify-content-between">
                    <a class="btn btn-primary" href="{{route('chart.info')}}">
                        {{__('common.your_health')}}
                    </a>
                    <a class="btn btn-primary" href="{{route('packages.info')}}">
                        {{__('common.your_medicines')}}
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
