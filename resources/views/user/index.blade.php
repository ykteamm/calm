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

                @for ($i=0;$i<7;$i++)

                <div class="sidebar__item text-color-white mb-20">
                  <a href="about-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <div class="icon-circle mr-10">
                      <i class="icon-discovery"></i>
                    </div>
                    Explore
                  </a>
                </div>

                @endfor
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="dashboard__main mt-0 main-color">
        <div class="dashboard__content pt-0 px-15 pb-0">

          @for ($j=0;$j<2;$j++)
         
          <section class="layout-pt-lg layout-pb-md">
            <div data-anim-wrap class="container">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">

                  <div class="sectionTitle">

                    <h2 class="sectionTitle__title text-color-white-for">Top Categories</h2>

                    {{-- <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p> --}}

                  </div>

                </div>

                <div class="col-auto">

                  <div class="d-flex x-gap-15 items-center justify-center">
                    <div class="col-auto">
                      <button class="d-flex items-center text-24 arrow-left-hover js-cat-slider-prev{{$j}}">
                        <i class="icon icon-arrow-left"></i>
                      </button>
                    </div>
                    <div class="col-auto">
                      <div class="pagination -arrows js-cat-slider-pag{{$j}}"></div>
                    </div>
                    <div class="col-auto">
                      <button class="d-flex items-center text-24 arrow-right-hover js-cat-slider-next{{$j}}">
                        <i class="icon icon-arrow-right"></i>
                      </button>
                    </div>
                  </div>

                </div>
              </div>

              <div class="overflow-hidden pt-50 js-section-slider" data-gap="30" data-loop data-slider-cols="xl-6 lg-4 md-3 sm-2" data-pagination="js-cat-slider-pag{{$j}}" data-nav-prev="js-cat-slider-prev{{$j}}" data-nav-next="js-cat-slider-next{{$j}}">
                <div class="swiper-wrapper">

                  @for ($i=0;$i<7;$i++)
                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-2">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/1.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Design Creative</div>
                          <div class="featureCard__text">573+ Courses</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endfor

                  

                </div>
              </div>
            </div>
          </section>

          @endfor


        </div>
      </div>
    </div>
  </div>
@endsection