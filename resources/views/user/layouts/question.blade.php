<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medidation</title>
        @include('partials.css')
        <link rel="stylesheet" href="{{asset('calm/css/animation.css')}}">
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
        <script src="{{asset('calm/js/one_active_click.js')}}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(function () {
                    document.getElementById('load').classList.add('d-none');
                    document.getElementById('ready').style.opacity = 1;
                    document.getElementById('ready').classList.add('show');
                }, 10000); // 20000 == 20 seconds

                setTimeout(function () {
                    document.getElementById('account').classList.remove('d-none');
                    document.getElementById('log_in').classList.remove('d-none');
                    document.getElementById('account').classList.add('show');
                    document.getElementById('log_in').classList.add('show');
                }, 13000);
            });
        </script>
        @livewireScripts


    </body>
</html>
