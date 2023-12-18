<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
?>
@extends('user.layouts.app')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="dashboard -home-9 px-0 js-dashboard-home-9">
            <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd">
                <div class="sidebar -base-sidebar">
                    <div class="menu_div">
                        <button type="button" id="close_btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="sidebar__inner top_width">
                        <div>
                            <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">
                                <h2 class="font_family_a text-color-white-for">
                                    Medidation
                                </h2>
                            </div>
                            <div>
                                @foreach ($menus as $key => $value)
                                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                                        <a href="{{route('menu-index', ['slug'=> $value->slug])}}" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                                            <div class="icon-circle mr-10">
                                                {{--                                                <i class="icon-discovery"></i>--}}
                                                {{--                                                icon list--}}
                                                {{--                                                <i class="fas fa-home"></i>--}}
                                                {{--                                                <i class="far fa-moon"></i>--}}
                                                {{--                                                rotate 248deg--}}
                                                {{--                                                <i class="fab fa-opera"></i>--}}
                                                {{--                                                <i class="far fa-laugh"></i>--}}
                                                <i class="fas fa-sun"></i>
                                                {{--                                                before "\1F319" kun sarguzashti--}}
                                            </div>
                                            {{$value->translation->name}}
                                        </a>
                                    </div>
                                @endforeach

                                <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                                    <a href="{{route('landscape')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                                        <div class="icon-circle mr-10">
                                            {{--                                            <i class="icon-discovery"></i>--}}
                                            <i class="fas fa-mountain"></i>
                                        </div>
                                        Manzara
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__main mt-0 main-color">
                <div class="menu__btn" id="menu_btn">
                    Menu
                </div>
                <div class="dashboard__content pt-0 px-30 pb-0">
                    <div class="container pt-40">
                        <div class="col-auto">
                            <h1 class="text-30 font_family_a text-color-white lh-12 fw-700">
                                @if(($time >= "04:00:00" && $time <= "12:00:00") == true)
                                    Hayrli tong,
                                @elseif(($time >= "12:00:00" && $time <= "18:00:00") == true)
                                    Hayrli kun,
                                @elseif(($time >= "18:00:00" && $time <= "23:59:59") == true)
                                    Hayrli kech,
                                @else
                                    Hayrli tun,
                                @endif
                                @auth
                                    {{auth()->user()->firstname}}
                                @endauth
                            </h1>
                        </div>
                    </div>
                    <section class="page-header -type-1">
                        <div class="container">
                            <div class="page-header__content">
                                <div class="row justify-center text-center">
                                    <div class="col-auto">
                                        <div data-anim="slide-up delay-2" class="is-in-view">
                                            <p class="page-header__text font_family_a text-color-white-for">
                                                {{$motivation->translation->text}}
                                            </p>
                                        </div>
                                        <div data-anim="slide-up delay-1" class="is-in-view">
                                            <h3 class="page-header__title font_family_a text-color-white-for">
                                                {{$motivation->translation->author}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion" style="z-index: 100! important;position:relative">
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <div class="col-1">
                                    <div class="accordion__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                            <img src="player/smile.svg" sty alt="">
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                    </div>
                                </div>
                                <div class="col-9 text_cent">
                                        <span class="text-17 fw-500 text-dark-1 font_family_a text-color-white-for">
                                            How are you feeling?
                                        </span>
                                </div>
                                @foreach($emoj_have as $have)
                                    @if($have->user_id == auth()->user()->id)
                                        @foreach($emoji as $emoj)
                                            @if($have->emoji_id == $emoj->id )
                                                <div class="col-2"  style="display: flex; justify-content: space-around;">
                                                    <div class="accordion__icon ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                            @if(asset($emoj->image->path))
                                                            <img src="{{asset($emoj->image->path)}}" sty alt="">
                                                            @else
                                                            @endif
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <div class="accordion__content">
                                @if($user_emoj_have)
                                    @foreach($emoj_have as $have)
                                        @if($have->user_id == auth()->user()->id)
                                            <div class="accordion__content__inner">
                                                <form action="{{route('feeling.update', ['feeling' => $have->id])}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        @foreach($emoji as $emoj)
                                                            <div class="col-md-2 col-4 pb-10">
                                                                <div class="accordion__item add-class">
                                                                    <input type="checkbox" class="d-none" value="{{$emoj->id}}" name="emoji_id">
                                                                    <input type="hidden" class="d-none" value="{{auth()->user()->id}}" name="user_id">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="accordion__button justify-content-around">
                                                                                <div class="accordion__icon" >
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                                        @if(asset($emoj->image->path))
                                                                                            <img src="{{asset($emoj->image->path)}}" sty alt="">
                                                                                        @else
                                                                                        @endif
                                                                                    </svg>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <p class="text-color-white-for text-center font_family_a pb-10">{{$emoj->text}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-10 pl-10 pr-10">
                                                        <button class="button -md -purple-1 font_family_a text-white">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                                @else
                                    <div class="accordion__content__inner">
                                        <form action="{{route('feeling.store')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                @foreach($emoji as $emoj)
                                                    <div class="col-md-2 col-4 pb-10">
                                                        <div class="accordion__item add-class">
                                                            <input type="checkbox" class="d-none" value="{{$emoj->id}}" name="emoji_id">
                                                            <input type="hidden" class="d-none" value="{{auth()->user()->id}}" name="user_id">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="accordion__button justify-content-around">
                                                                        <div class="accordion__icon" >
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                                @if(asset($emoj->image->path))
                                                                                    <img src="{{asset($emoj->image->path)}}" sty alt="">
                                                                                @else
                                                                                @endif
                                                                            </svg>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <p class="text-color-white-for text-center font_family_a pb-10">{{$emoj->text}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="d-flex justify-content-center pt-10 pl-10 pr-10">
                                                <button class="button -md -purple-1 font_family_a text-white">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <section class="layout-pt-md layout-pb-md">
                        <div data-anim-wrap class="container">
                            <div class="tabs -pills js-tabs">
                                <div class="row y-gap-20 justify-between items-end">
                                    <div class="col-auto">
                                        <div class="sectionTitle ">
                                            <h2 class="sectionTitle__title font_family_a text-color-white-for">Popular</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">
                                    <div class="tabs__pane -tab-item-1 is-active">
                                        <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-3 md-2 sm-2">
                                            <div class="swiper-wrapper">
                                                @foreach ($popularMeditations as $g => $f)
                                                    <div class="swiper-slide">
                                                        <div data-anim-child="slide-up delay-2">

                                                            <a href="{{route('meditation.show', ['meditation' => $f->id])}}" class="coursesCard -type-1 ">
                                                                <div class="relative">
                                                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                                                    @if ($f->meditator->image)
                                                                        <img class="w-1/1" src="{{asset($f->meditator->image->path)}}" alt="image">
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
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($meditations as $key => $category)
                        @php
                            $i = $i +1;
                        @endphp
                        <section class="layout-pt-md layout-pb-md">
                            <div data-anim-wrap class="container">
                                <div class="tabs -pills js-tabs">
                                    <div class="row y-gap-20 justify-between items-end">
                                        <div class="col-auto">
                                            <div class="sectionTitle ">
                                                <h2 class="sectionTitle__title font_family_a text-color-white-for">{{$category->translation->name}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">
                                        <div class="tabs__pane -tab-item-1 is-active">
                                            <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-3 md-2 sm-2">
                                                <div class="swiper-wrapper">
                                                    @foreach ($category->meditations as $g => $f)
                                                        <div class="swiper-slide">
                                                            <div data-anim-child="slide-up delay-2">

                                                                <a href="{{route('meditation.show', ['meditation' => $f->id])}}" class="coursesCard -type-1 ">
                                                                    <div class="relative">
                                                                        <div class="coursesCard__image overflow-hidden rounded-8">
                                                                        @if ($f->meditator->image)
                                                                            <img class="w-1/1" src="{{asset($f->meditator->image->path)}}" alt="image">
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
                    @if(!$todayRepliedGratitude && $gratitude)
                        <div class="container">
                            <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion" >
                                <div class="item_test"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="accordion__button">
                                        <div class="accordion__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </div>
                                        <span class="text-17 fw-500 text-dark-1 ml-30 text-color-white-for">
                                            {{$gratitude->translation->name}}
                                        </span>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background: #1a4d73">
                                            <div class="modal-header row" style="border-bottom: none">
                                                <div class="col-md-11 col-sm-11 col-11">
                                                    <h5 class="modal-title text-color-white-for" id="exampleModalLabel">
                                                        {{$gratitude->translation->name}}
                                                    </h5>
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
                                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                                    <input type="hidden" value="{{$gratitude->id}}" name="gratitude_id">
                                                    <div class="row">
                                                        <div class="col-12 d-flex align-items-center">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">1.</label>
                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
                                                        </div>
                                                        <div class="col-12 d-flex align-items-center">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">2.</label>
                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
                                                        </div>
                                                        <div class="col-12 d-flex align-items-center">
                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">3.</label>
                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
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
                    @else
                        <div class="container">
                            {{-- <div class="accordion -block" style="display: flex; justify-content: flex-end">
                                <div class="col-1"  data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                    <div class="accordion__button">
                                        <div class="accordion__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion" style="z-index: 100! important;position:relative">
                                <div class="item_test">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <h4 class="col-11 text-17 fw-500 text-dark-1 text-color-white-for">
                                                {{$todayRepliedGratitude->translation->name}}
                                            </h4>
                                            <!-- Modal -->
                                            {{-- <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    @if ($gratitude)
                                                        <div class="modal-content" style="background: #1a4d73">
                                                            <div class="modal-header row" style="border-bottom: none">
                                                                <div class="col-md-11 col-sm-11 col-11">
                                                                    <h5 class="modal-title text-color-white-for" id="exampleModalLabel">
                                                                        {{$gratitude->translation->name}}
                                                                    </h5>
                                                        
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
                                                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                                                                    @if ($gratitude)
                                                                        <h5 class="modal-title text-color-white-for" id="exampleModalLabel">
                                                                            <input type="hidden" value="{{$gratitude->id}}" name="gratitude_id">
                                                                        </h5>
                                                                    @endif
                                                                    <div class="row">
                                                                        <div class="col-12 d-flex align-items-center">
                                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">1.</label>
                                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
                                                                        </div>
                                                                        <div class="col-12 d-flex align-items-center">
                                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">2.</label>
                                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
                                                                        </div>
                                                                        <div class="col-12 d-flex align-items-center">
                                                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">3.</label>
                                                                            <input type="text" class="placeholder123" required name="titles[]" placeholder="I'm grateful for...">
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
                                                    @endif
                                                </div>
                                            </div> --}}
                                        </div>
                                        <br>
                                        <ol class="list-group list-group-numbered">
                                            @foreach($todayRepliedGratitude->replies as $reply)
                                                <li class="list_li list-group-item">{{$reply->text}}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            {{-- @if($lastRepliedGratitude)
                            @else
                                @php
                                    $date = Carbon::parse($for->created_at);
                                    $format = $date->format('Y-m-d')
                                @endphp
                            @endif --}}
                        </div>
                    @endif
                    <div class="container">
                        @if (count($recentlyViewedMeditations) != 0)
                            <div class="text-center pt-3" style="margin-top: 30px">
                                <h2 style="color: #c6c2c2">Recently viewed</h2>
                            </div>
                            <ul class="comments__list mt-30 mb-30" style="z-index: 100! important;position:relative">
                                @foreach ($recentlyViewedMeditations as $item)
                                    <li class="comments__item mt-30 mb-30">
                                        <div class="row comments__item-inner">
                                            <div class="comments__img col-md-2 col-sm-4 col-5">
                                                @if ($item->meditator->avatar)
                                                    <img src="{{asset($item->meditator->avatar->path)}}" class="bg-image" style="border-radius: 20px;" alt="">
                                                @else
                                                    <img src="../calm/img/about-1/1.png" class="bg-image" style="border-radius: 20px;" alt="">
                                                @endif
                                            </div>

                                            <div class="comments__body  col-md-9 col-sm-8 col-7">
                                                <h4 class="text-17 fw-500 lh-15" style="color: #c6c2c2;">
                                                    {{$item->translation->name}}
                                                    <span class="text-13 text-light-1 fw-400" style="color: #c6c2c2;">10 min</span>
                                                </h4>
                                                <h5 class="text-15 fw-500 mt-15" style="color: white;">{{$item->meditator->firstname}} {{$item->meditator->lastname}}</h5>
                                                <p class="mt-10" style="color: white;">This course is a very applicable. Professor Ng explains precisely each algorithm</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
