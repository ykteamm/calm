<?php
?>
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
                                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                                        <a href="about-1.html" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                                            <div class="icon-circle mr-10">
                                                <i class="icon-discovery"></i>
                                            </div>
                                            {{$value->translation->name}}
                                        </a>
                                    </div>
                                @endforeach

                                <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                                    <a href="{{url('manzara')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                                        <div class="icon-circle mr-10">
                                            <i class="icon-discovery"></i>
                                        </div>
                                        Manzara
                                    </a>
                                </div>

                                {{--                    <div class="sidebar__item text-color-white mb-20">--}}
                                {{--                        <a href="{{url('free')}}" class="-dark-sidebar-white d-flex items-center lh-1 fw-500">--}}
                                {{--                            <div class="icon-circle mr-10">--}}
                                {{--                                <i class="icon-discovery"></i>--}}
                                {{--                            </div>--}}
                                {{--                            Savollar--}}
                                {{--                        </a>--}}
                                {{--                    </div>--}}


                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="dashboard__main mt-0 main-color">
                <div class="dashboard__content pt-0 px-30 pb-0">



                    <div class="container pt-40">
                        <div class="col-auto">
                            <h1 class="text-30 font_family_a text-color-white lh-12 fw-700">
                                {{--                        @dd($time >= "04:00:00" && $time <= "12:00:00")--}}
                                @if(($time >= "04:00:00" && $time <= "12:00:00") == true)
                                    Hayrli tong,
                                @elseif(($time >= "12:00:00" && $time <= "18:00:00") == true)
                                    Hayrli kun,
                                @elseif(($time >= "18:00:00" && $time <= "23:59:59") == true)
                                    Hayrli kech,
                                @else
                                    Hayrli tung,
                                @endif
                                @auth
                                    {{auth()->user()->username}}
                                @endauth
                                {{--                        Abrorbek--}}
                            </h1>
                        </div>
                    </div>

                    {{--            @dd($graduate)--}}
                    {{--            @dd($motivation)--}}
                    <section class="page-header -type-1">
                        <div class="container">
                            <div class="page-header__content">
                                <div class="row justify-center text-center">
                                    @foreach($motivation as $motiv)
                                        @if($motiv->language_code == "en")
                                            <div class="col-auto">
                                                <div data-anim="slide-up delay-2" class="is-in-view">
                                                    <p class="page-header__text font_family_a text-color-white-for">
                                                        {{$motiv->text}}
                                                    </p>
                                                </div>
                                                <div data-anim="slide-up delay-1" class="is-in-view">
                                                    <h1 class="page-header__title font_family_a text-color-white-for">
                                                        {{$motiv->author}}
                                                    </h1>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>


                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="accordion__icon" style="margin-right: 22px;" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                        <img src="player/smile.svg" sty alt="">
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                </div>

                                <span class="text-17 fw-500 text-dark-1 font_family_a text-color-white-for">
                            How are you feeling?
                        </span>
                            </div>

                            <div class="accordion__content" style="">
                                <div class="accordion__content__inner">
                                    <form action="" method="POST">
                                        <div class="row">

                                            <div class="col-md-2 col-4 pb-10">
                                                <div class="accordion__item add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/calm.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for text-center font_family_a pb-10">Calm</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="hidden" class="form-control" name="icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-4 pb-10">
                                                <div class="accordion__item  add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/sad.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for text-center font_family_a pb-10">Sad</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-4 pb-10 ">
                                                <div class="accordion__item add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/tired-face.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for font_family_a text-center pb-10">Tired</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-4 pb-10 ">
                                                <div class="accordion__item add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/anxi.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for font_family_a text-center pb-10">Anxious</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-4 pb-10">
                                                <div class="accordion__item add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/panic.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for font_family_a text-center pb-10">Panicked</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-4 pb-10">
                                                <div class="accordion__item add-class">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="accordion__button justify-content-around">
                                                                <div class="accordion__icon" >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                        <img src="player/unsure.svg" sty alt="">
                                                                    </svg>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-color-white-for font_family_a text-center pb-10 title-color">Unsure</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center pt-10 pl-10 pr-10">
                                            <button class="button -md -purple-1 font_family_a text-white">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

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

                                                <h2 class="sectionTitle__title font_family_a text-color-white-for">{{$value->translation->name}}</h2>

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

                                                                    <a href="" class="coursesCard -type-1 ">
                                                                        <div class="relative">
                                                                            <div class="coursesCard__image overflow-hidden rounded-8">
                                                                                                                   @if ($f->meditator->image)
                                                                                                                   <img class="w-1/1" src="{{asset($f->meditator->image->path)}}" alt="image">
                                                                                                                   @else
                                                                                <img class="w-1/1" src="https://assets.calm.com/640/609df0416991dfe06e3c61e779158566.png" alt="image">
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





                    <div class="container">

                        <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">

                            {{--                    @dd($graduate)--}}

                            <div class="item_test"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="accordion__button">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </div>
                                    @foreach($graduate as $grad)
                                        @if($grad->language_code == "en")
                                            <span class="text-17 fw-500 text-dark-1 ml-30 text-color-white-for">
                                           {{$grad->name}}
                                    </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="background: #1a4d73">
                                        <div class="modal-header row" style="border-bottom: none">
                                            <div class="col-md-11 col-sm-11 col-11">
                                                @foreach($graduate as $grad)
                                                    @if($grad->language_code == "en")
                                                        <h5 class="modal-title text-color-white-for" id="exampleModalLabel">
                                                            {{$grad->name}}
                                                        </h5>
                                                    @endif
                                                @endforeach

                                            </div>

                                            <div class="col-md-1 col-sm-1 col-1">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <br><br>
                                            <div class="col-md-12 text-center">
                                                <h6 class="modal-title text-color-white-for" id="question" style="cursor: pointer;">
                                                    <i class="fas fa-exchange-alt mr-10"></i>
                                                    Change question?
                                                </h6>
                                            </div>

                                        </div>

                                        <div class="modal-body">
                                            <form action="{{url('create-reply')}}" class="contact-form" method="POST">
                                                @csrf

                                                <input type="hidden" value="2" name="user_id">
                                                @foreach($graduate as $grad)
                                                    @if($grad->language_code == "en")
                                                        <input type="hidden" value="{{$grad->object_id}}" name="gratitude_id">
                                                    @endif
                                                @endforeach

                                                <div class="row">
                                                    <div class="col-12 d-flex align-items-center">
                                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">1.</label>
                                                        <input type="text" class="placeholder123" name="titles[]" placeholder="I'm grateful for...">
                                                    </div>
                                                    <div class="col-12 d-flex align-items-center">
                                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">2.</label>
                                                        <input type="text" class="placeholder123" name="titles[]" placeholder="I'm grateful for...">
                                                    </div>
                                                    <div class="col-12 d-flex align-items-center">
                                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">3.</label>
                                                        <input type="text" class="placeholder123" name="titles[]" placeholder="I'm grateful for...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="border: none">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-plus-circle"></i>
                                                        Create
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="container">

                        <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">

                            <div class="item_test">
                                <div class="p-3">
                                    <h5 class="text-17 fw-500 text-dark-1 text-color-white-for">
                                        Fri, 27 Oct 2023 at 12:04 AM
                                    </h5>
                                    <br>
                                    <h4 class="text-17 fw-500 text-dark-1 text-color-white-for">
                                        O'zingizga minnatdorchilik bildiring ?
                                    </h4>
                                    <br>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list_li list-group-item">A list item</li>
                                        <li class="list_li list-group-item">A list item</li>
                                        <li class="list_li list-group-item">A list item</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="container">
                        <ul class="comments__list mt-30 mb-30">
                            <li class="comments__item mt-30 mb-30">
                                <div class="row comments__item-inner">

                                    <div class="comments__img col-md-2 col-sm-3 col-4">
                                        <!-- <div class="bg-image rounded-full js-lazy loaded" data-ll-status="loaded"> -->
                                        <img src="../calm/img/about-1/1.png" class="bg-image" style="border-radius: 20px;" alt="">
                                        <!-- </div> -->
                                    </div>

                                    <div class="comments__body  col-md-9 col-sm-8 col-7">
                                        <!-- <div class="comments__header"> -->
                                        <h4 class="text-17 fw-500 lh-15" style="color: #c6c2c2;">
                                            Course
                                            <span class="text-13 text-light-1 fw-400" style="color: #c6c2c2;">10 min</span>
                                        </h4>

                                        <!-- </div> -->

                                        <h5 class="text-15 fw-500 mt-15" style="color: white;">The best LMS Design</h5>
                                        <!-- <div class="comments__text mt-10"> -->
                                        <p class="mt-10" style="color: white;">This course is a very applicable. Professor Ng explains precisely each algorithm</p>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </li>

                            <li class="comments__item mt-30 mb-30">
                                <div class="row comments__item-inner">

                                    <div class="comments__img col-md-2 col-sm-3 col-4">
                                        <!-- <div class="bg-image rounded-full js-lazy loaded" data-ll-status="loaded"> -->
                                        <img src="../calm/img/about-1/1.png" style="border-radius: 20px;" class="bg-image" alt="">
                                        <!-- </div> -->
                                    </div>

                                    <div class="comments__body  col-md-9 col-sm-8 col-7">
                                        <!-- <div class="comments__header"> -->
                                        <h4 class="text-17 fw-500 lh-15" style="color: #c6c2c2;">
                                            Course
                                            <span class="text-13 text-light-1 fw-400" style="color: #c6c2c2;">10 min</span>
                                        </h4>

                                        <!-- </div> -->

                                        <h5 class="text-15 fw-500 mt-15" style="color: white;">The best LMS Design</h5>
                                        <!-- <div class="comments__text mt-10"> -->
                                        <p class="mt-10" style="color: white;">This course is a very applicable. Professor Ng explains precisely each algorithm</p>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </li>

                            <li class="comments__item mt-30 mb-30">
                                <div class="row comments__item-inner">

                                    <div class="comments__img col-md-2 col-sm-3 col-4">
                                        <!-- <div class="bg-image rounded-full js-lazy loaded" data-ll-status="loaded"> -->
                                        <img src="../calm/img/about-1/1.png" style="border-radius: 20px;" class="bg-image" alt="">
                                        <!-- </div> -->
                                    </div>

                                    <div class="comments__body  col-md-9 col-sm-8 col-7">
                                        <!-- <div class="comments__header"> -->
                                        <h4 class="text-17 fw-500 lh-15" style="color: #c6c2c2;">
                                            Course
                                            <span class="text-13 text-light-1 fw-400" style="color: #c6c2c2;">10 min</span>
                                        </h4>

                                        <!-- </div> -->

                                        <h5 class="text-15 fw-500 mt-15" style="color: white;">The best LMS Design</h5>
                                        <!-- <div class="comments__text mt-10"> -->
                                        <p class="mt-10" style="color: white;">This course is a very applicable. Professor Ng explains precisely each algorithm</p>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

