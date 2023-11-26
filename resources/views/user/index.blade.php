@extends('user.layouts.app')
@section('user_content')

<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
      <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd">

        <div class="sidebar -base-sidebar">
          <div class="sidebar__inner">
            <div>
              <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">General</div>
              <div>

                @foreach ($categories as $key => $value)
                  <div class="sidebar__item text-color-white mb-20">
                    <a href="about-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                      <div class="icon-circle mr-10">
                        <i class="icon-discovery"></i>
                      </div>
                      {{$value->translation->name}}
                    </a>
                  </div>
                @endforeach
                
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="dashboard__main mt-0 main-color">
        <div class="dashboard__content pt-0 px-15 pb-0">

          @php
              $i = 0;
          @endphp
          @foreach ($categories_sub as $key => $value)

            @php
                $i = $i +1;
            @endphp
          <section class="layout-pt-md layout-pb-md">
            <div data-anim-wrap class="container">
              <div class="tabs -pills js-tabs">
                <div class="row y-gap-20 justify-between items-end">
                  <div class="col-auto">

                    <div class="sectionTitle ">

                      <h2 class="sectionTitle__title text-color-white-for">{{$value->translation->name}}</h2>

                    </div>

                  </div>

                  
                </div>

                <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">

                  <div class="tabs__pane -tab-item-1 is-active">
                    <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-3 md-2 sm-2">
                      <div class="swiper-wrapper">

                        @for ($i=1;$i<10;$i++)
                          
                        @foreach ($value->meditations as $g => $f)
                        

                          <div class="swiper-slide">
                            <div data-anim-child="slide-up delay-2">

                              <a href="{{route('meditation.show',$f->id)}}" class="coursesCard -type-1 ">
                                <div class="relative">
                                  <div class="coursesCard__image overflow-hidden rounded-8">
                                    @if ($f->image)
                                      <img class="w-1/1" src="{{asset($f->image->path)}}" alt="image">
                                    @endif
                                    <div class="coursesCard__image_overlay rounded-8"></div>
                                  </div>
                                  <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                    <div>
                                      <div class="px-15 rounded-200 bg-purple-1">
                                        <span class="text-11 lh-1 uppercase fw-500 text-white">Popular</span>
                                      </div>
                                    </div>

                                    <div>
                                      <div class="px-15 rounded-200 bg-green-1">
                                        <span class="text-11 lh-1 uppercase fw-500 text-dark-1">Best sellers</span>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                                <div class="h-100 pt-15">

                                  <div class="text-17 lh-15 fw-500 text-dark-1 mt-10 text-color-white-for">{{$f->translation->name}}</div>

                                  <div class="d-flex x-gap-10 items-center pt-10">

                                    <div class="d-flex items-center">
                                      <div class="text-14 lh-1 text-color-white-for">{{$f->meditator->firstname}} {{$f->meditator->lastname}}</div>
                                    </div>

                                  </div>
                                </div>
                              </a>

                            </div>
                          </div>

                        @endforeach

                        @endfor

                      </div>


                      <button class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-prev">
                        <i class="icon icon-arrow-left text-24"></i>
                      </button>

                      <button class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-50 rounded-full shadow-5 js-next">
                        <i class="icon icon-arrow-right text-24"></i>
                      </button>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
          @endforeach


        </div>
      </div>
    </div>
  </div>
@endsection