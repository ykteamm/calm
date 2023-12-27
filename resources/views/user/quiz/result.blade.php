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
                    <div class="w-100" style="overflow:hidden">
                        <img style="" src="https://images.prismic.io/thesis-shopify/b5bc5d03-e7fa-40be-9fee-3ea365089712_StarterKitBYOBDesktop02.png?auto=compress,format&rect=0,0,2790,760&w=2790&h=760" alt="">
                    </div>
                </div>
                <div style="margin:30px 0">
                    {{-- <a style="background-color: #ffffff;border:1px solid rgb(15, 28, 219);" class="d-flex justify-content-between btn  ">
                        <span style="font-weight:700">{{__('common.subscribe')}}</span>
                        <span style="font-weight:700">10 $</span>
                    </a>
                    <a style="background-color: #ffffff;border:1px solid rgb(15, 28, 219);" class="d-flex justify-content-between btn  mt-3">
                        <span style="font-weight:700">{{__('common.get_now')}}</span>
                        <span style="font-weight:700">15 $</span>
                    </a> --}}
                    <button style="background-color: #ffffff;border-radius:25px;border:1px solid rgb(15, 28, 219);" class="w-100 d-flex justify-between btn  mt-10">

                        <span style="font-weight:700"><input type="radio" name="buys" id="" style="margin-right: 3px"> {{__('common.subscribe')}}</span>
                        <span style="font-weight:700">10 $</span></span>
                    </button>

                    <button style="background-color: #ffffff;border-radius:25px;border:1px solid rgb(15, 28, 219);" class="w-100 d-flex justify-between btn  mt-10">
                        <span style="font-weight:700"><input type="radio" name="buys" id="" style="margin-right: 3px"> {{__('common.get_now')}}</span>
                        <span style="font-weight:700">15 $</span>
                    </button>

                    <button style="background-color: #5877dd;border-radius:25px;" class="w-100 d-flex justify-content-center btn  mt-10">
                        <span style="font-weight:700;color:#fff;font-size:20px;">{{__('common.buy_now')}}</span>
                    </button>
                </div>
                <div class="d-flex align-items-center justify-content-center bg-white w-100" style="margin:30px 0">
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="" style="width:20%" src="https://images.prismic.io/thesis-shopify/5432b31e-96d7-4a78-83f0-aba004455adb_Group+1420.png?auto=compress,format&w=72" alt="">
                            {{__('common.delivery')}}

                        </div>
                        {{-- <div style="padding-top:40px" class="text-center">
                            {{__('common.delivery')}}
                        </div> --}}
                    </div>
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="" style="width:20%" src="https://images.prismic.io/thesis-shopify/5432b31e-96d7-4a78-83f0-aba004455adb_Group+1420.png?auto=compress,format&w=72" alt="">
                            {{__('common.recieve')}}
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="" style="width:20%" src="https://images.prismic.io/thesis-shopify/5432b31e-96d7-4a78-83f0-aba004455adb_Group+1420.png?auto=compress,format&w=72" alt="">
                            {{__('common.using')}}
                        </div>
                    </div>
                </div>



                {{-- <div style="height:1px;background-color:black">
                </div> --}}
                <div class="accordion -block js-accordion">

                    <div class="accordion__item bg-light-4">
                      <div class="accordion__button">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="plus"></div>
                          <div class="icon" data-feather="minus"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1" style="margin-left: auto">{{auth()->user()->firstname}} {{__('common.your_health')}}</span>
                      </div>

                      <div class="accordion__content">
                        <div class="accordion__content__inner">
                            {{-- <div class="bg-white"> --}}
                                <div class="row pt-5" style="margin-top: 40px">
                                    @foreach ($steroids as $steroid)
                                      <div class="col-12 mt-5 pt-5">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="card-header text-center">
                                              <span style="font-size:21px;font-weight:700">
                                                {{$steroid->translation->name}}
                                              </span>
                                            </div>
                                            <div class="card-body pl-2 py-0">
                                              {{-- <div class="text-center">
                                                <img src="https://images.prismic.io/thesis-shopify/e1c18ab3-0b9a-45a6-80a4-6eca547b1de9_Energy.jpg"
                                                style="width: 300px;" alt="...">
                                              </div> --}}
                                              <div class="d-flex justify-content-between btn btn-secondary mt-10">
                                                <div>
                                                  Sizning daraja
                                                </div>
                                                <button class="btn btn-success btn-sm">
                                                  <h6 class="text-white">{{$steroid->chart}}</h6>
                                                </button>
                                              </div>
                                              <div class="btn btn-secondary d-flex justify-content-between mt-1">
                                                <div>
                                                  O'rtacha holatda
                                                </div>
                                                <button class="btn btn-success btn-sm">
                                                  <h6 class="text-white">{{$steroid->avg}}</h6>
                                                </button>
                                              </div>
                                            </div>
                                            <div class="card-footer border-0">
                                              <div>
                                                <span style="color: blue">{{$steroid->info->translation->name}}</span>
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi cupiditate itaque tenetur ullam reiciendis a necessitatibus ut repudiandae. Dolorem, adipisci!
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    @endforeach
                                </div>
                            {{-- </div> --}}
                        </div>
                      </div>
                    </div>

                    <div class="accordion__item bg-light-4">
                      <div class="accordion__button">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="plus"></div>
                          <div class="icon" data-feather="minus"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1" style="margin-left: auto">{{auth()->user()->firstname}} {{__('common.your_medicines')}}</span>
                      </div>

                      <div class="accordion__content">
                        <div class="accordion__content__inner">
                            {{-- <div class="p-5 pt-0 bg-white"> --}}
                                {{-- <div class="row pt-5" style="margin-top: 40px"> --}}
                                    @foreach ($packages as $i => $package)
                                        <div class="col-md-12">
                                            <div class="card shadow border-0" style="margin-bottom:20px">
                                                <div style="padding:25px;" class="card-header bg-transparent border-0 d-flex justify-content-between">
                                                    <h1 style="color: #127cba;font-size:30px" class="py-3">{{$package->translation->name}} {{$package->qty}}x</h1>
                                                    <span id="resultHeaderLogo{{$i}}">
                                                        <img style="width: 40px" src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg" alt=" Image " data-src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg">
                                                    </span>
                                                    <span id="resultHeaderCloseBtn{{$i}}" style="display: none" onclick="resultCollapser({{$i}})">
                                                        <button type="button" class="btn-close"  aria-label="Close"></button>
                                                    </span>
                                                </div>
                                                <div id="resultBody{{$i}}" style="padding:25px;" class="card-body pt-0">
                                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem">
                                                        KEY FOCUS AREAS
                                                    </div>
                                                    <ul style="padding-left: 20px">
                                                      @foreach ($package->medicines as $item)
                                                          <li style="list-style-type: circle">{{$item->translation->name}}</li>
                                                      @endforeach
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
                                                            <img style="width:250px;height:250px" src="{{$package->image->path}}" alt="image">
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
                                                    <div id="resultCollapsePlus{{$i}}" style="font-size:25px;">
                                                        +
                                                    </div>
                                                    <div id="resultCollapseMinus{{$i}}" style="display: none;font-size:25px;">
                                                        -
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                      </div>
                    </div>

                  </div>
                {{-- <div style="margin:30px 0">
                    <button data-bs-toggle="modal" data-bs-target="#quizChartModal" style="background-color: #6f8c46" class="w-100 d-flex justify-content-center btn  ">
                        <span style="font-weight:700;color:#fff;font-size:20px">{{__('common.your_health')}}</span>
                    </button>
                    <button data-bs-toggle="modal" data-bs-target="#quizResultModal" style="background-color: #6f8c46" class="w-100 d-flex justify-content-center btn  mt-3">
                        <span style="font-weight:700;color:#fff;font-size:20px">{{__('common.your_medicines')}}</span>
                    </button>
                </div> --}}
                {{-- @include('user.quiz.result-modal') --}}
                {{-- @include('user.quiz.chart-modal') --}}
                <section class="layout-pt-sm layout-pb-sm border-bottom-light">
                    <div class="container">
                      <div class="row y-gap-30 justify-between">

                        <div class="col-xl-3 col-md-6">
                          <div class="d-flex items-center">
                            <div>
                              <h4 class="text-20 fw-500 text-center">1. Har hafta yangi dori sinab k'oring</h4>
                              <div class="text-dark-1 text-center">Har hafta uchun bitta formula tanlang va uning ta'sirini kunlik kuzatib boring.</div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                          <div class="d-flex items-center">
                            <div>
                              <h4 class="text-20 fw-500 text-center">2. Holatingizni kuzatib boring</h4>
                              <div class="text-dark-1 text-center" >Qolgan 3 formulaning ta'sirini oy oxirigacha kuzatoib boring</div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                          <div class="d-flex items-center">
                            <div>
                              <h4 class="text-20 fw-500 text-center">3. Shaxsiy formulangizni optimallashitiring</h4>
                              <div class="text-dark-1 text-center">Oy o'rtasida sizga yaxshi ta'sir ko'rsatayotganni tekshiramiz va shifokorlarimiz sizning to'plamingizni optimallashtirishda yordamlashadi.</div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </section>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
