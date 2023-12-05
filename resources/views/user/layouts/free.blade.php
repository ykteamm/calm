<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medidation</title>
        @include('partials.css')
        @livewireStyles


    </head>
    <body class="preloader-visible main-color" data-barba="wrapper" >

        <!-- preloader start -->
            @include('components.loader')
        <!-- preloader end -->

        <!-- barba container start -->
        <div class="barba-container" data-barba="container">


          <main class="main-content">

            {{-- @include('components.user-header') --}}

            @yield('user_content')
            {{-- @include('user.player.player') --}}

          </main>
          @include('components.user-sidebar')
        </div>
        <!-- barba container end -->

        <!-- JavaScript -->
        @include('partials.js')
        <script src="{{asset('calm/js/click.js')}}"></script>
        <script src="{{asset('calm/js/active.js')}}"></script>
        @livewireScripts


    </body>
</html>
