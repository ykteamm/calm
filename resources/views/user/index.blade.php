<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
?>
@extends('user.layouts.app')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="dashboard -home-9 px-0 js-dashboard-home-9">
            @include('user.layouts.sidebar')
            <div class="dashboard__main mt-0 main-color">
                <div class="pt-0 pb-0 mb-80">
                    <div class="container pt-40 ">
                        <div class="col-auto" style="text-align: center;">
                            <h1 class="text-30 font_family_a text-color-white lh-12 fw-700">
                                @if(($time >= "04:00:00" && $time <= "12:00:00") == true)
                                    Good morning,
                                @elseif(($time >= "12:00:00" && $time <= "18:00:00") == true)
                                    Good day,
                                @elseif(($time >= "18:00:00" && $time <= "23:59:59") == true)
                                    Good evening
                                @else
                                    Good night,
                                @endif
                                @auth
{{--                                    {{auth()->user()}}--}}
                                    {{getProp(auth()->user(), 'firstname')}}
                                @endauth
                            </h1>
                        </div>
                    </div>
                    <section class="-type-1 mt-20">
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
                                            <h3 class="page-header__title font_family_a text-color-white-for" style="    text-align: right;
                                            font-size: 12px;">
                                                {{$motivation->translation->author}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                        <div class="container">
                            <div class="accordion -block text-left js-accordion" style="position: relative">
                                <div class="item_test"  data-bs-toggle="modal" data-bs-target="#emojiModal">
                                    <div class="accordion__button p-1">
                                        <div class="accordion__icon">
                                            <img src="player/smile.svg" style="width:30px" alt="Emoji">
                                        </div>
                                        <span class="ml-30 text-color-white-for">
                                            @lang('common.kayfiyat')
                                        </span>
                                        <span class="ml-80" >
                                        @foreach($emoj_have as $have)
                                                @if($have->user_id == getProp(auth()->user(), 'id'))
                                                    @foreach($emoji as $emoj)
                                                        @if($have->emoji_id == $emoj->id )
                                                            <div class=""  style="display: flex; justify-content: space-around;">
                                                            <div class="">
                                                                    @if(asset($emoj->image->path))
                                                                    <img src="{{asset($emoj->image->path)}}" style="width:30px" alt="Emoji">
                                                                @else
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                    </span>
                                    </div>
                                </div>
                            </div>
                            @include('user.modals.emoji')

                        </div>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($meditations as $key => $category)
                        @php
                            $i = $i +1;
                        @endphp
                        {{-- @if(isset($category->meditations[0]->lessons[0])) --}}
                        <section class="mt-40 mb-40">
                            <div data-anim-wrap class="container">
                                <div class="tabs -pills js-tabs">
                                    <div class="row y-gap-20 justify-between items-end">
                                        <div class="col-auto">
                                            <div class="sectionTitle ">
                                                <h2 class="sectionTitle__title font_family_a text-color-white-for">{{$category->translation->name}}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs__content pt-10 js-tabs-content">
                                        <div class="tabs__pane -tab-item-1 is-active">
                                            <div class="overflow-hidden ">
                                                <div class="js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-3 md-2 sm-2">
                                                    <div class="swiper-wrapper" style="transform: translate3d(px, 0px, 0px);">
                                                        @foreach ($category->meditations as $g => $meditation)
                                                            @php
                                                                $lesson = $meditation->lessons[0];
                                                            @endphp
                                                            <div class="swiper-slide" style="position: relative;">
                                                                <div data-anim-child="slide-up delay-2">

                                                                    <a  @if ($meditation->group == $single) href="{{route('lesson.user.show', ['lesson' => $lesson->id])}}" @else href="{{route('meditation.show', ['meditation' => $meditation->id])}}" @endif class="coursesCard -type-1 ">
                                                                        <div class="relative">
                                                                            <div class="coursesCard__image overflow-hidden rounded-8">
                                                                            @if ($lesson->image)
                                                                                <img class="w-1/1" src="{{asset($lesson->image->path)}}" alt="image">
                                                                            @endif
                                                                                <div class="coursesCard__image_overlay rounded-8"></div>
                                                                            </div>
                                                                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                                                                                <div>
                                                                                    <div class="px-15 rounded-200 bg-purple-1">
                                                                                        <span class="text-11 lh-1 fw-500 text-white">1-kun</span>
                                                                                    </div>
                                                                                </div>

                                                                                <div>
                                                                                    <div class="px-15 rounded-200 bg-purple-2">
                                                                                        <span class="text-11 lh-1 fw-500" style="color: black;">11 min</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="h-100 pt-5">
                                                                            <div class="text-17 lh-15 fw-500 text-dark-1 text-color-white-for">{{$meditation->translation->name}}</div>
                                                                            <div class="text-17 text-color-white-for">

                                                                                {{-- @if ($category->id == 1) --}}
                                                                                    {{-- {{$category->translation->name}} * Kurs --}}
                                                                                {{-- @else --}}
{{--                                                                                    {{$category->translation->name}} * {{getLabel($meditation->type)}}--}}
                                                                                {{-- @endif --}}

                                                                            </div>
                                                                            <div class="d-flex x-gap-10 items-center mb-10">
                                                                                <div class="d-flex items-center">
                                                                                    <div class="text-14 lh-1 text-color-white-for">
{{--                                                                                        <span style="font-size:18px;">{{$lesson->translation->name}}</span>--}}

                                                                                    </div>
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
                            </div>
                        </section>
                        {{-- @endif --}}

                        @if ($key == 2)
                            @if(!$todayRepliedGratitude && $gratitude)
                                <div class="container">
                                    <div class="accordion -block text-left js-accordion" style="position: relative">
                                        <div class="item_test"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="accordion__button p-1">
                                                <div class="accordion__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                </div>
                                                <span class="text-17 fw-500 text-dark-1 ml-30 text-color-white-for">
                                                    {{$gratitude->translation->name}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                @livewire('gratitude')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="container">
                                    <div class="accordion -block text-left js-accordion" style="z-index: 100! important;position:relative">
                                        <div class="item_test">
                                            <div class="p-3">
                                                <div class="row align-items-center">
                                                    <h4 class="col-11 text-17 fw-500 text-dark-1 text-color-white-for">
                                                        {{$todayRepliedGratitude->translation->name}}
                                                    </h4>
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
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
