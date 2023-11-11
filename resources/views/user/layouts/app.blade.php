<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medidation</title>

        @include('partials.css')

    </head>
    <body class="preloader-visible" data-barba="wrapper">

        <!-- preloader start -->
            @include('components.loader')
        <!-- preloader end -->
      
        <!-- barba container start -->
        <div class="barba-container" data-barba="container">
      
      
          <main class="main-content  ">
      
            @include('components.user-header')
      
            @yield('user_content')
            
          </main>
        </div>
        <!-- barba container end -->
      
        <!-- JavaScript -->
        @include('partials.js')
      
      </body>
</html>
