<div class="container">
    <div class="mt-30">
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{$progress}}%"></div>
        </div>
    </div>
</div>

<section class="">
    <div class="container mt-30">
        <h3 class="text-color-white-for text-center">
            Select the goals that matter to you
        </h3>
    </div>
</section>

<section>

    <div class="container">
        <div class="row y-gap-30 pt-60">

            <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                <div data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                    <div class="blogCard__image ratio ratio-3:2">
                        <img class="img-ratio" src="../calm/img/home-3/blog/img.png" alt="image">
                    </div>
                    <div class="px-30 py-30 bg-white">
                        <h4 class="text-17 lh-15 fw-500" wire:model="stress">Reduce Stress</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                    <div class="blogCard__image ratio ratio-3:2">
                        <img class="img-ratio" src="../calm/img/home-3/blog/img_1.png" alt="image">
                    </div>
                    <div class="px-30 py-30 bg-white">
                        <h4 class="text-17 lh-15 fw-500" wire:model="sleep">Improve Sleep</h4>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                <div  data-anim-child="slide-left delay-2"  class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                    <div class="blogCard__image ratio ratio-3:2">
                        <img class="img-ratio" src="../calm/img/home-3/blog/img.png" alt="image">
                    </div>
                    <div class="px-30 py-30 bg-white">
                        <h4 class="text-17 lh-15 fw-500" wire:model="focus">Increase Focus</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6" style="cursor: pointer;">
                <div  data-anim-child="slide-left delay-2" class="blogCard card_active -type-1 rounded-8  shadow-1 overflow-hidden is-in-view">
                    <div class="blogCard__image ratio ratio-3:2">
                        <img class="img-ratio" src="../calm/img/home-3/blog/img_1.png" alt="image">
                    </div>
                    <div class="px-30 py-30 bg-white">
                        <h4 class="text-17 lh-15 fw-500" wire:model="mood">Improve Mood</h4>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="text-center mt-30">
        <button type="button" wire:click="choose"  class="btn btn-primary">Continue</button>
    </div>

</section>
