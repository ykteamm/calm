<?php

?>
@extends('user.layouts.free')
@section('user_content')

    <div class="content-wrapper js-content-wrapper">
        <div class="-home-9 px-0 js-dashboard-home-9">
            <div class="container">
                <div class="mt-20">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container mt-30">
                    <h3 class="text-color-white-for text-center font_family_a">
                        Natija
                    </h3>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row y-gap-30 pt-60">
                        <div class="col-lg-12 col-md-12 col-12" style="cursor: pointer;">
                            <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">

                                <div class="px-15 py-15 text-center bg-white">
                                    @if ($ball >= 5)
                                    <h4 class="text-17 lh-15 fw-500 font_family_a">
                                        Sizning ruhiyatingizda buzilishlar mavjud. Bu tanangizdagi yetishmovchiliklar, surunkali kasalliklar, kuchli stresslar yoki ruhiy travmalar sababli qolgan bo’lishi mumkin. Ruhiy holatni yaxshilash uchun avvalo organizmni yetishmagan vitamin va minerallar bilan to’yintirish, surunkali kasalliklarni davolash, stresslar va ruhiy travmalardan halos bo’lish uchun esa meditatsiyalar, ruhiyat mashqlari bilan shug’ullanishingiz lozim.
                                    </h4>

                                    @elseif($ball < 5 && $ball > 1)
                                    <h4 class="text-17 lh-15 fw-500 font_family_a">
                                        Sizning ruhiy holatingiz qoniqarli holatda. Sog’lom fikr va qalb muvozanatiga erishish, minnatdorchilikni, baxtni his qilish uchun meditatsiyalar qilishni, organizmni yetishmayotgan mahsulotlar bilan to’ldirishni tavsiya etamiz. Shunda siz to’laqonli sog’lom ruhiyat egasi bo’la olasiz.
                                    </h4>
                                    @elseif($ball < 5 && $ball > 1)
                                    <h4 class="text-17 lh-15 fw-500 font_family_a">
                                        Sizning ruhiy holatingiz havas qilarli darajada
                                    </h4>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-30">
                    <a href="{{route('auth.register')}}" class="btn btn-primary">Tugatish</a>
                </div>
            </section>

        </div>
    </div>
@endsection
