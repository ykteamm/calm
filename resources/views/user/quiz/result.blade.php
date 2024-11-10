@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;border-radius: 0;overflow: hidden;">
            @if (!$done)

            @endif

            <div class="container mb-80">
                <div class="d-flex justify-content-center pt-5">
                    <div class="w-100" style="overflow:hidden">
                        <img style="" src="{{asset('packages/img.png')}}" alt="">
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
                    <button style="background-color: #ffffff;border-radius:25px;border:1px solid rgb(15, 28, 219);" class="w-100 d-flex justify-between btn mt-10">
                        <span style="font-weight:700">
                            <input type="radio" name="buys" id="subscribe" value="subscribe" style="margin-right: 3px" checked>
                            {{__('common.subscribe')}}
                        </span>
                                            <span style="font-weight:700">10 $</span>
                                        </button>

                                        <button style="background-color: #ffffff;border-radius:25px;border:1px solid rgb(15, 28, 219);" class="w-100 d-flex justify-between btn mt-10">
                        <span style="font-weight:700">
                            <input type="radio" name="buys" id="get_now" value="get_now" style="margin-right: 3px">
                            {{__('common.get_now')}}
                        </span>
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
                            <img class="" style="width:20%" src="https://images.prismic.io/thesis-shopify/37963230-f1ab-4b85-907d-a6cb47189a6e_Group+1415.png?auto=compress,format&w=72" alt="">
                            {{__('common.recieve')}}
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="text-center">
                            <img class="" style="width:20%" src="https://images.prismic.io/thesis-shopify/da6d8ed4-972f-47a9-9fae-5e2e130068c4_Group+1414.png?auto=compress,format&w=72" alt="">
                            {{__('common.using')}}
                        </div>
                    </div>
                </div>

                <div style="margin:30px 0">
                    <a href="{{route('medicine.return')}}" style="display: contents">
                        <button style="background-color: #391e83;border-radius:25px;" class="w-100 d-flex justify-content-center btn  mt-10">
                            <span style="font-weight:700;color:#fff;font-size:20px;">Retest solution</span>
                        </button>
                    </a>


                </div>


                {{-- <div style="height:1px;background-color:black">
                </div> --}}
                <div class="accordion -block js-accordion">

{{--                    <div class="accordion__item bg-light-4">--}}
{{--                      <div class="accordion__button">--}}
{{--                        <div class="accordion__icon">--}}
{{--                          <div class="icon" data-feather="plus"></div>--}}
{{--                          <div class="icon" data-feather="minus"></div>--}}
{{--                        </div>--}}
{{--                        <span class="text-17 fw-500 text-dark-1" style="margin-left: auto">{{auth()->user()->firstname}} {{__('common.your_health')}}</span>--}}
{{--                      </div>--}}

{{--                      <div class="accordion__content">--}}
{{--                        <div class="accordion__content__inner">--}}
{{--                            --}}{{-- <div class="bg-white"> --}}
{{--                                <div class="row pt-5" style="margin-top: 40px">--}}
{{--                                    @foreach ($steroids as $steroid)--}}
{{--                                      <div class="col-12 mt-5 pt-5">--}}
{{--                                        <div class="card mb-3" style="max-width: 540px;">--}}
{{--                                            <div class="card-header text-center">--}}
{{--                                              <span style="font-size:21px;font-weight:700">--}}
{{--                                                {{$steroid->translation->name}}--}}
{{--                                              </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body pl-2 py-0">--}}
{{--                                              --}}{{-- <div class="text-center">--}}
{{--                                                <img src="https://images.prismic.io/thesis-shopify/e1c18ab3-0b9a-45a6-80a4-6eca547b1de9_Energy.jpg"--}}
{{--                                                style="width: 300px;" alt="...">--}}
{{--                                              </div> --}}
{{--                                              <div class="d-flex justify-content-between btn btn-secondary mt-10">--}}
{{--                                                <div>--}}
{{--                                                  Sizning daraja--}}
{{--                                                </div>--}}
{{--                                                <button class="btn btn-success btn-sm">--}}
{{--                                                  <h6 class="text-white">{{$steroid->chart}}%</h6>--}}
{{--                                                </button>--}}
{{--                                              </div>--}}
{{--                                              --}}{{-- <div class="btn btn-secondary d-flex justify-content-between mt-1">--}}
{{--                                                <div>--}}
{{--                                                  O'rtacha holatda--}}
{{--                                                </div>--}}
{{--                                                <button class="btn btn-success btn-sm">--}}
{{--                                                  <h6 class="text-white">{{$steroid->avg}}%</h6>--}}
{{--                                                </button>--}}
{{--                                              </div> --}}
{{--                                            </div>--}}
{{--                                            <div class="card-footer border-0">--}}
{{--                                              <div>--}}
{{--                                                <span style="color: rgb(0, 0, 0);font-size:17px;">{{$steroid->info->translation->name}}</span>--}}
{{--                                              </div>--}}
{{--                                            </div>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            --}}{{-- </div> --}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}

{{--                    <div class="accordion__item bg-light-4">--}}
{{--                      <div class="accordion__button">--}}
{{--                        <div class="accordion__icon">--}}
{{--                          <div class="icon" data-feather="plus"></div>--}}
{{--                          <div class="icon" data-feather="minus"></div>--}}
{{--                        </div>--}}
{{--                        <span class="text-17 fw-500 text-dark-1" style="margin-left: auto">{{auth()->user()->firstname}} {{__('common.your_medicines')}}</span>--}}
{{--                      </div>--}}

{{--                      <div class="accordion__content">--}}
{{--                        <div class="accordion__content__inner">--}}
{{--                             <div class="p-5 pt-0 bg-white"> --}}
{{--                                 <div class="row pt-5" style="margin-top: 40px"> --}}
{{--                                    @foreach ($packages as $i => $package)--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="card shadow border-0" style="margin-bottom:20px">--}}
{{--                                                <div style="padding:25px;" class="card-header bg-transparent border-0 d-flex justify-content-between">--}}
{{--                                                    @if ($package->id == 1)--}}

{{--                                                        @if ($package->percent < 50)--}}
{{--                                                            <h1 style="color: #127cba;font-size:30px" class="py-3">{{$package->translation->name}} {{$package->qty}}x</h1>--}}
{{--                                                        @endif--}}

{{--                                                        @if ($package->percent >= 50 && $package->percent < 80)--}}
{{--                                                            <h1 style="color: #127cba;font-size:30px" class="py-3">Yengil {{$package->translation->name}} {{$package->qty}}x</h1>--}}
{{--                                                        @endif--}}

{{--                                                    @elseif($package->id == 2)--}}
{{--                                                        @if ($package->percent < 50)--}}
{{--                                                        <h1 style="color: #127cba;font-size:30px" class="py-3">{{$package->translation->name}} {{$package->qty}}x</h1>--}}
{{--                                                        @endif--}}

{{--                                                        @if ($package->percent >= 50 && $package->percent < 80)--}}
{{--                                                            <h1 style="color: #127cba;font-size:30px" class="py-3">Yengil {{$package->translation->name}} {{$package->qty}}x</h1>--}}
{{--                                                        @endif--}}
{{--                                                    @else--}}
{{--                                                    <h1 style="color: #127cba;font-size:30px" class="py-3">{{$package->translation->name}} {{$package->qty}}x</h1>--}}

{{--                                                    @endif--}}
{{--                                                    <span id="resultHeaderLogo{{$i}}">--}}
{{--                                                        <img style="width: 40px" src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg" alt=" Image " data-src="https://thesis-shopify.cdn.prismic.io/thesis-shopify/aa82fd19-1bd4-45c9-82be-b43526730783_Clarity_blue.svg">--}}
{{--                                                    </span>--}}
{{--                                                    <span id="resultHeaderCloseBtn{{$i}}" style="display: none" onclick="resultCollapser({{$i}})">--}}
{{--                                                        <button type="button" class="btn-close"  aria-label="Close"></button>--}}
{{--                                                    </span>--}}
{{--                                                </div>--}}
{{--                                                <div id="resultBody{{$i}}" style="padding:25px;" class="card-body pt-0">--}}
{{--                                                    <ul style="padding-left: 20px;font-size:17px;">--}}
{{--                                                      @if ($package->id == 1)--}}
{{--                                                        <li style="list-style-type: circle">Tez uxlash</li>--}}
{{--                                                        <li style="list-style-type: circle">Sifatli uyqu</li>--}}
{{--                                                      @elseif($package->id == 3)--}}
{{--                                                        <li style="list-style-type: circle">Kayfiyat barqarorligi</li>--}}
{{--                                                        <li style="list-style-type: circle">Mamnunlik hissi</li>--}}
{{--                                                        <li style="list-style-type: circle">Irodani mustahkamlash</li>--}}
{{--                                                      @elseif($package->id == 2)--}}
{{--                                                        <li style="list-style-type: circle">Gormonal muvozanat</li>--}}
{{--                                                        <li style="list-style-type: circle">Buqoq ishini yaxshilash</li>--}}
{{--                                                      @else--}}
{{--                                                        <li style="list-style-type: circle">Stress paytida</li>--}}
{{--                                                        <li style="list-style-type: circle">Kuchli charchoqda</li>--}}
{{--                                                        <li style="list-style-type: circle">Yaxshi kayfiyat uchun</li>--}}
{{--                                                      @endif--}}

{{--                                                  </ul>--}}
{{--                                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem;" class="mt-20">--}}
{{--                                                        Asosiy ta'siri--}}
{{--                                                    </div>--}}
{{--                                                    <div style="font-size: 16px">--}}
{{--                                                        @if ($package->id == 1)--}}
{{--                                                        <span>--}}
{{--                                                            Bosh miyadagi uyqu markazini stimullash, qon aylanishini va moddalar almashinuvini yaxshilash. Tinch va sifatli uyquni taminlash.--}}
{{--                                                        </span>--}}

{{--                                                        @elseif($package->id == 3)--}}
{{--                                                        <span>--}}
{{--                                                            Bosh miyada impulslar o’tishini yaxshilash. Baxt gormonlari ishlab chiqarilishini yaxshilash, parchalanishini kamaytirish. Kayfiyatni yaxshilash, qoniqishni his qilish, qon bosimini normallashtirish.--}}
{{--                                                        </span>--}}

{{--                                                        @elseif($package->id == 2)--}}
{{--                                                        <span>--}}
{{--                                                            Qalqonsimon bez faoliyatini, qon aylanishi, mushaklar tonusini yaxshilash. Umumiy tanada moddalar almashinuvini kuchaytirish, yetarli energiya bilan ta’minlash.--}}
{{--                                                        </span>--}}

{{--                                                        @else--}}
{{--                                                        <span>--}}
{{--                                                            Bosh miyada qon aylanishini yaxshilash, tinchlantirish, yurak urishini normallashtirish. Charchoq hissini kamaytirish. Bosh og’riqlarini kamaytirish.--}}

{{--                                                        </span>--}}

{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                    <div class="mt-10">--}}
{{--                                                        @if ($package->image)--}}
{{--                                                            <img style="width:250px;height:250px" src="{{$package->image->path}}" alt="image">--}}
{{--                                                        @else--}}
{{--                                                            <img src="https://images.prismic.io/thesis-shopify/f95908fa-3557-4515-8d2b-68785b433984_Alpha+GPC+and+Caffeine+VS+Placebo+Chart.jpg?auto=compress,format&w=1946" alt="image">--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div id="resultIngridient{{$i}}" style="padding:25px;display:none" class="card-body pt-0">--}}
{{--                                                    <div style="letter-spacing: .01rem;font-weight:402;color:#1e1e1e;margin-bottom:0.5rem">--}}
{{--                                                        Tarkib:--}}
{{--                                                    </div>--}}
{{--                                                    <ul style="padding-left: 20px">--}}
{{--                                                        @foreach ($package->medicines as $item)--}}
{{--                                                            <li style="list-style-type: circle">{{$item->translation->name}}</li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <div onclick="resultCollapser({{$i}})" class="card-footer p-3 bg-transparent d-flex justify-content-between align-items-center pointer">--}}
{{--                                                    <div id="resultCollapse{{$i}}">--}}
{{--                                                        Tarkibni ko'rish--}}
{{--                                                    </div>--}}
{{--                                                    <div id="resultCollapseClose{{$i}}" style="display: none">--}}
{{--                                                        Tarkibni berkitish--}}
{{--                                                    </div>--}}
{{--                                                    <div id="resultCollapsePlus{{$i}}" style="font-size:25px;">--}}
{{--                                                        +--}}
{{--                                                    </div>--}}
{{--                                                    <div id="resultCollapseMinus{{$i}}" style="display: none;font-size:25px;">--}}
{{--                                                        ---}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                 </div> --}}
{{--                             </div> --}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}

                  </div>
                 <div style="margin:30px 0">
                    <button data-bs-toggle="modal" data-bs-target="#quizChartModal" style="background-color: #6f8c46" class="w-100 d-flex justify-content-center btn  ">
                        <span style="font-weight:700;color:#fff;font-size:20px">{{__('common.your_health')}}</span>
                    </button>
{{--                    <button data-bs-toggle="modal" data-bs-target="#quizResultModal" style="background-color: #6f8c46" class="w-100 d-flex justify-content-center btn  mt-3">--}}
{{--                        <span style="font-weight:700;color:#fff;font-size:20px">{{__('common.your_medicines')}}</span>--}}
{{--                    </button>--}}
                </div>
{{--                 @include('user.quiz.result-modal')--}}
                 @include('user.quiz.chart-modal')

{{--                  <div class="personalized__WorkBlock">--}}
{{--                    <div class="personalized__steps">--}}


{{--                        <div class="personalized__stepItem mt-20" style="z-index: 2;--}}
{{--                            color: #1d4d57;--}}
{{--                            background-color: #e6ebe6;--}}
{{--                            display: flex;--}}
{{--                            border-radius: 0.25rem;">--}}
{{--                          <div class="personalized__stepLeft">--}}
{{--                            <div class="personalized__stepItemNoBg" style="padding-right: 0.25rem;--}}
{{--                            padding-bottom: 0.25rem;--}}
{{--                            background-color: #f7f7f7;--}}
{{--                            border-bottom-right-radius: 0.25rem;">--}}
{{--                              <span class="personalized__stepItemNo" style="font-weight: 600;--}}
{{--                              font-size: 1.25rem;--}}
{{--                              background-color: #1d4d57;--}}
{{--                              color: #fff;--}}
{{--                              width: 2.2rem;--}}
{{--                              height: 2.2rem;--}}
{{--                              display: flex;--}}
{{--                              justify-content: center;--}}
{{--                              align-items: center;--}}
{{--                              border-radius: 0.25rem;"><text>1</text></span>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="personalized__stepRight p-3">--}}
{{--                            <h3 class="personalized__stepHeading" style="    font-size: 1.2rem;--}}
{{--                            line-height: 1.5625rem;">Har hafta yangi dori sinab ko'ring</h3>--}}
{{--                            <p class="personalized__stepDesc" style="margin-top: 0.375rem;--}}
{{--                            font-size: 1rem;--}}
{{--                            line-height: 1.6875rem;">Har hafta uchun bitta formula tanlang va uning ta'sirini kunlik kuzatib boring.</p>--}}
{{--                          </div>--}}
{{--                        </div>--}}

{{--                        <div class="personalized__stepItem mt-20" style="z-index: 2;--}}
{{--                            color: #1d4d57;--}}
{{--                            background-color: #e6ebe6;--}}
{{--                            display: flex;--}}
{{--                            border-radius: 0.25rem;">--}}
{{--                          <div class="personalized__stepLeft">--}}
{{--                            <div class="personalized__stepItemNoBg" style="padding-right: 0.25rem;--}}
{{--                            padding-bottom: 0.25rem;--}}
{{--                            background-color: #f7f7f7;--}}
{{--                            border-bottom-right-radius: 0.25rem;">--}}
{{--                              <span class="personalized__stepItemNo" style="font-weight: 600;--}}
{{--                              font-size: 1.25rem;--}}
{{--                              background-color: #1d4d57;--}}
{{--                              color: #fff;--}}
{{--                              width: 2.2rem;--}}
{{--                              height: 2.2rem;--}}
{{--                              display: flex;--}}
{{--                              justify-content: center;--}}
{{--                              align-items: center;--}}
{{--                              border-radius: 0.25rem;"><text>2</text></span>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="personalized__stepRight p-3">--}}
{{--                            <h3 class="personalized__stepHeading" style="font-size: 1.2rem;--}}
{{--                            line-height: 1.5625rem;">Holatingizni kuzatib boring</h3>--}}
{{--                            <p class="personalized__stepDesc" style="margin-top: 0.375rem;--}}
{{--                            font-size: 1rm;--}}
{{--                            line-height: 1.6875rem;">Qolgan 3 formulaning ta'sirini oy oxirigacha kuzatib boring</p>--}}
{{--                          </div>--}}
{{--                        </div>--}}

{{--                        <div class="personalized__stepItem mt-20" style="z-index: 2;--}}
{{--                            color: #1d4d57;--}}
{{--                            background-color: #e6ebe6;--}}
{{--                            display: flex;--}}
{{--                            border-radius: 0.25rem;">--}}
{{--                          <div class="personalized__stepLeft">--}}
{{--                            <div class="personalized__stepItemNoBg" style="padding-right: 0.25rem;--}}
{{--                            padding-bottom: 0.25rem;--}}
{{--                            background-color: #f7f7f7;--}}
{{--                            border-bottom-right-radius: 0.25rem;">--}}
{{--                              <span class="personalized__stepItemNo" style="font-weight: 600;--}}
{{--                              font-size: 1.25rem;--}}
{{--                              background-color: #1d4d57;--}}
{{--                              color: #fff;--}}
{{--                              width: 2.2rem;--}}
{{--                              height: 2.2rem;--}}
{{--                              display: flex;--}}
{{--                              justify-content: center;--}}
{{--                              align-items: center;--}}
{{--                              border-radius: 0.25rem;"><text>3</text></span>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="personalized__stepRight p-3">--}}
{{--                            <h3 class="personalized__stepHeading" style="    font-size: 1.2rem;--}}
{{--                            line-height: 1.5625rem;">Shaxsiy formulangizni optimallashitiring</h3>--}}
{{--                            <p class="personalized__stepDesc" style="margin-top: 0.375rem;--}}
{{--                            font-size: 1rem;--}}
{{--                            line-height: 1.6875rem;">Oy o'rtasida sizga yaxshi ta'sir ko'rsatayotganni tekshiramiz va shifokorlarimiz sizning to'plamingizni optimallashtirishda yordamlashadi.</p>--}}
{{--                          </div>--}}
{{--                        </div>--}}




{{--                    </div>--}}
{{--                  </div>--}}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
