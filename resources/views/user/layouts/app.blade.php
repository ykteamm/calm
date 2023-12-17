<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medidation</title>

        @include('partials.css')


    </head>
    <body class="preloader-visible" style="" data-barba="wrapper">

        <!-- preloader start -->
            @include('components.loader')
        <!-- preloader end -->

        <!-- barba container start -->
      <video autoplay muted loop playsinline id="iVideo">
        <source src="../calm/media/video_bg.mp4" type="video/mp4">
      </video>
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

      </body>
</html>
