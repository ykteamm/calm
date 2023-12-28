<div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">
    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="tabs -pills js-tabs">
                <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">
                    <div class="tabs__pane -tab-item-1 is-active">
                        <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-3 md-2 sm-2">
                            <div class="swiper-wrapper">
                                @foreach ($meditations as $g => $f)
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
                                                                <span class="text-11 lh-1 uppercase fw-500 text-white">{{$f->category->translation->name}}</span>
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
</div>