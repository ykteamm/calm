@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
      <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl">

        <div class="sidebar -base-sidebar">
          <div class="sidebar__inner">
            <div>
              <div class="text-16 lh-1 fw-500 text-dark-1 mb-30">General</div>
              <div>

                <div class="sidebar__item text-color-white">
                  <a href="about-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <i class="text-20 icon-discovery mr-15"></i>
                    Explore
                  </a>
                </div>

                <div class="sidebar__item text-color-white">
                  <a href="courses-list-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <i class="text-20 icon-play-button mr-15"></i>
                    Courses
                  </a>
                </div>

                <div class="sidebar__item text-color-white">
                  <a href="#" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <i class="text-20 icon-book mr-15"></i>
                    Books
                  </a>
                </div>

                <div class="sidebar__item text-color-white">
                  <a href="blog-list-1.html" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <i class="text-20 icon-list mr-15"></i>
                    Articles
                  </a>
                </div>

                <div class="sidebar__item text-color-white">
                  <a href="#" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">
                    <i class="text-20 icon-time-management mr-15"></i>
                    Calendar
                  </a>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="dashboard__main mt-0 main-color">
        <div class="dashboard__content pt-0 px-15 pb-0">

         
          <section class="layout-pt-lg layout-pb-md">
            <div data-anim-wrap class="container">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">

                  <div class="sectionTitle ">

                    <h2 class="sectionTitle__title ">Top Categories</h2>

                    <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                  </div>

                </div>

                <div class="col-auto">

                  <div class="d-flex x-gap-15 items-center justify-center">
                    <div class="col-auto">
                      <button class="d-flex items-center text-24 arrow-left-hover js-cat-slider-prev">
                        <i class="icon icon-arrow-left"></i>
                      </button>
                    </div>
                    <div class="col-auto">
                      <div class="pagination -arrows js-cat-slider-pag"></div>
                    </div>
                    <div class="col-auto">
                      <button class="d-flex items-center text-24 arrow-right-hover js-cat-slider-next">
                        <i class="icon icon-arrow-right"></i>
                      </button>
                    </div>
                  </div>

                </div>
              </div>

              <div class="overflow-hidden pt-50 js-section-slider" data-gap="30" data-loop data-slider-cols="xl-6 lg-4 md-3 sm-2" data-pagination="js-cat-slider-pag" data-nav-prev="js-cat-slider-prev" data-nav-next="js-cat-slider-next">
                <div class="swiper-wrapper">

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

                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-3">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/2.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Sales Marketing</div>
                          <div class="featureCard__text">565+ Courses</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-4">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/3.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Development IT</div>
                          <div class="featureCard__text">126+ Courses</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-5">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/4.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Engineering Architecture</div>
                          <div class="featureCard__text">35+ Courses</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-6">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/5.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Personal Development</div>
                          <div class="featureCard__text">908+ Courses</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide h-100 swiper-width">
                    <div data-anim-child="slide-left delay-7">
                      <div class="featureCard -type-1 -featureCard-hover-3">
                        <div class="featureCard__content">
                          <div class="featureCard__icon">
                            <img src="img/featureCards/6.svg" alt="icon">
                          </div>
                          <div class="featureCard__title">Finance Accounting</div>
                          <div class="featureCard__text">129+ Courses</div>
                        </div>
                      </div>
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
@endsection