@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')  
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">
            <div class="p-5 pt-0 bg-white">
                <h5 class="quiz-info-title w-60" style="line-height: 2rem;font-size: 1.5625rem;">
                    BASED ON OUR 1,000,000+ DATA POINTS, WE HAVE RECOMMENDED THESE FORMULAS FOR YOU. YOUR STARTER KIT WILL CONTAIN EACH OF THESE FOUR BLENDS.
                </h5>
                <div class="row pt-5" style="margin-top: 40px">
                    @foreach ($packages as $i => $package)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow border-0" style="width: 420px;height:700px;margin-bottom:20px">
                                <div style="padding:25px;" class="card-header bg-transparent border-0 d-flex justify-content-between">
                                    <h1 style="color: #127cba;font-size:30px" class="py-3">{{$package->translation->name}}</h1>
                                    <span id="resultHeaderLogo{{$i}}">
                                        <img style="width: 40px" src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg" alt=" Image " data-src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg">
                                    </span>
                                    <span id="resultHeaderCloseBtn{{$i}}" style="display: none" onclick="resultCollapser({{$i}})">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </span>
                                </div>
                                <div id="resultBody{{$i}}" style="padding:25px;" class="card-body pt-0">
                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem">
                                        KEY FOCUS AREAS
                                    </div>
                                    <ul style="padding-left: 20px">
                                        <li style="list-style-type: circle">Maintain focus</li>
                                        <li style="list-style-type: circle">Support attention</li>
                                        <li style="list-style-type: circle">Enter flow state</li>
                                    </ul>
                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem">
                                        KEY INGREDIENT
                                    </div>
                                    <div style="font-size: 18px">
                                        <span style="font-weight: 700">Alpha-GPC</span>
                                        has been shown to support healthy cognitive function and physical performance.
                                    </div>
                                    <div>
                                        @if ($package->image)
                                            <img style="width:300px;height:300px" src="{{$package->image->path}}" alt="image">
                                        @else
                                            <img src="https://images.prismic.io/thesis-shopify/f95908fa-3557-4515-8d2b-68785b433984_Alpha+GPC+and+Caffeine+VS+Placebo+Chart.jpg?auto=compress,format&w=1946" alt="image">
                                        @endif
                                    </div>
                                </div>
                                <div id="resultIngridient{{$i}}" style="padding:25px;display:none" class="card-body pt-0">
                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem">
                                        ALL INGREDIENTS:
                                    </div>
                                    <ul style="padding-left: 20px">
                                        @foreach ($package->medicines as $item)
                                            <li style="list-style-type: circle">{{$item->translation->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div onclick="resultCollapser({{$i}})" class="card-footer p-3 bg-transparent d-flex justify-content-between align-items-center pointer">
                                    <div id="resultCollapse{{$i}}">
                                        View All Ingredients
                                    </div>
                                    <div id="resultCollapseClose{{$i}}" style="display: none">
                                        Collapse Ingredients
                                    </div>
                                    <div id="resultCollapsePlus{{$i}}">
                                        +
                                    </div>
                                    <div id="resultCollapseMinus{{$i}}" style="display: none">
                                        -
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
