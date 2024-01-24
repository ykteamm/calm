<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medidation</title>

        @include('partials.css')

        @livewireStyles
    </head>
    <body class="preloader-visible" style="" data-barba="wrapper">

        <!-- preloader start -->
            @include('components.loader')
        <!-- preloader end -->

        <!-- barba container start -->
        @if ((request()->segment(1) == 'menu') || true || request()->getPathInfo() == '/')
            @if ((request()->getPathInfo() != '/quiz') && (request()->getPathInfo() != '/will') && (request()->getPathInfo() != '/auth/login') && (request()->getPathInfo() != '/auth/register') && (request()->getPathInfo() != '/quiz-result') && (request()->getPathInfo() != '/medicine'))
                @if (session('landscape_video_path'))
                    <video id="mainBackgroundVideo" autoplay loop muted playsinline style="position: fixed; z-index: 0;opacity: 50%; right: 0; bottom: 0;left: 0; min-width: 100%; min-height: 100%">
                        <source src="{{asset(session('landscape_video_path'))}}" type="video/mp4">
                    </video>
                @endif
            @endif
        @endif
        <audio id="mainBackgroundAudio" class="d-none" autoplay controls  preload="none">
            <source src="{{asset(session('landscape_audio_path'))}}" type="audio/ogg">
            <source src="{{asset(session('landscape_audio_path'))}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="barba-container" id="mainContent" data-barba="container">

          <main class="main-content">

            {{-- @include('components.user-header') --}}

            @yield('user_content')
            {{-- @include('user.player.player') --}}

          </main>
          {{-- @include('components.user-sidebar') --}}
        </div>
        <!-- barba container end -->

        <!-- JavaScript -->
{{--        <script src="https://cdn.jsdelivr.net/gh/livewire/vue@v0.3.x/dist/livewire-vue.js"></script>--}}
        @include('partials.js')
        @yield('script')

        @livewireScripts
        <script>
            let sliderItems = document.querySelectorAll('.swiper-slide');
            let sliders = document.querySelectorAll('.js-section-slider');
            sliders.forEach(element => {
                element.classList.add('swiper-slide-custom')
            });
            sliderItems.forEach(element => {
                element.classList.add('swiper-slide-custom')
            });
        </script>
        <script>
            let landscape = localStorage.getItem('landscape');
            if (landscape) {
                landscape = JSON.parse(landscape);
                try {
                    if (!['/quiz', '/will', '/auth/login', '/auth/register'].includes(location.pathname)) {
                        playVideoSelected(landscape);
                    }
                    playAudioSelected(landscape);
                } catch (error) {
                    console.log("Bu app error", error);
                }
            } else {
                let mainBackgroundVideo = document.getElementById('mainBackgroundVideo');
                if (mainBackgroundVideo) {
                    mainBackgroundVideo.style.display = 'none';
                }
            }
        </script>
      </body>
</html>
