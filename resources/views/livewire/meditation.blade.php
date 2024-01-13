<div>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="teamCard__img" style="text-align: center">
                <img src="{{asset($meditation->meditator->image->path)}}" alt="image" style="width:20%" class="rounded-200">
              </div>
            <div style="text-align: center">
                <h4 class="teamCard__title text-17 lh-15 fw-500 mt-12" style="color:white;">{{$meditation->meditator->firstname}} {{$meditation->meditator->lastname}}</h4>
            </div>
          <div class="row justify-center pt-60">
            <div class="col-xl-6 col-lg-8 col-md-10">
              <div class="overflow-hidden js-testimonials-slider">
                {{-- <div class="swiper-wrapper"> --}}
                        <div class="row y-gap-20 justify-center text-center">
                            <div class="col-auto">
                              <div class="sectionTitle ">
                                <h2 class="sectionTitle__title " style="color: #fff;margin-bottom:30px">{{$meditation->translation->name}}</h2>
                              </div>
                            </div>
                          </div>
                {{-- </div> --}}

                {{-- <div class="pt-60 lg:pt-40">
                  <div class="pagination -avatars row x-gap-40 y-gap-20 justify-center js-testimonials-pagination">

                    <div class="col-auto">
                      <div class="pagination__item ">
                        <img src="img/home-3/testimonials/5.png" alt="image">
                      </div>
                    </div>

                  </div>
                </div> --}}
              </div>
            </div>
            @foreach ($meditation->lessons as $lesson)
              <div @if (!$lesson->blocked) wire:click="played({{$lesson}})" onclick="playerOpenClose({{$lesson}}, {{$meditation->lessons}})" @endif class="d-flex justify-between py-8 mb-40" style="background: #fff;border-radius:20px;width:100%;margin: 30px 0;cursor: pointer">
                <div class="d-flex items-center text-dark-1">
                  <div class="icon-heart"></div>
                  <h5 class="ml-10" >
                    <i class="fas fa-play"></i>
                    {{$lesson->translation->name}}</h5>
                </div>
                @if ($lesson->blocked)
                  <img src="{{asset('calm/lock.png')}}" alt="">
                @else
                  <div class="text-dark-1">{{2}} m</div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </section>
</div>
