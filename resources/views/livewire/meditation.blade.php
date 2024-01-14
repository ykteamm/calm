<div>
  <section class="layout-pt-md layout-pb-lg" style="z-index: 3000">
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
            <div class="row y-gap-20 justify-center text-center">
              <div class="col-auto">
                <div class="sectionTitle ">
                  <h2 class="sectionTitle__title " style="color: #fff;margin-bottom:30px">{{$meditation->translation->name}}</h2>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div style="height: 450px;overflow:auto;padding: 0">
        @foreach ($meditation->lessons as $lesson)
          <div @if (!$lesson->blocked) wire:click="played({{$lesson}})" onclick="playerOpenClose({{$lesson}}, {{$meditation->lessons}})" @endif class="d-flex justify-between py-8 mb-40" 
            style="background: #fff;border-radius:10px;width:100%;height:50px;margin: 20px 0;cursor: pointer">
            <div class="d-flex items-center text-dark-1">
              <div class="icon-heart"></div>
              <h5 class="ml-10 d-flex align-items-center">
                <i class="fas fa-play"></i>
                <span style="padding-left: 10px">
                  {{$lesson->translation->name}}
                </span>
              </h5>
            </div>
            <div class="px-5">
              @if ($lesson->blocked)
              <img style="width:30px" src="{{asset('calm/lock.png')}}" alt="">
              @else
                <div class="text-dark-1">{{2}}m</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</div>
