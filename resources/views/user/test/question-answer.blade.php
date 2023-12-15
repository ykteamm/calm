@extends('user.layouts.question')
@section('user_content')
    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-20">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 37%"></div>
                    </div>
                </div>
            </div>
            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        {{ $question->translation->name }}
                    </h3>
                </div>
            </section>
            <section>
                <form action="{{route('test-answer-question')}}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row y-gap-30 pt-60">
                            @foreach($question->variants as $variant)
                                <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                                    <div data-anim-child="slide-left delay-2" class="blogCard  card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                                        <input type="text" name="variant_id" value="{{$variant->id}}" class="d-none">
                                        <input type="text" name="question_id" value="{{$question->id}}" class="d-none">
                                        <div class="blogCard__image ratio ratio-3:2">
                                            <img class="img-ratio" src="../../calm/img/home-3/blog/img.png" alt="image">
                                        </div>
                                        <div class="px-15 py-15 text-center bg-white">
                                            <h4 class="text-17 lh-15 fw-500 font_family_a" >{{$variant->translation->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-40">
                        <button type="submit" id="question" class="d-none btn btn-primary">Davom etamiz</button>
                    </div>
                </form>
            </section>

        </div>
    </div>
@endsection
