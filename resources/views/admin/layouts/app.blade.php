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
      {{-- @include('components.loader') --}}
      <!-- preloader end -->
      <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
      </div>
      <!-- barba container start -->
      <div class="barba-container" data-barba="container">
    
    
        <main class="main-content">
    
    
          @include('components.admin-header')
    
    
          @yield('admin_content')
        </main>
    
        @include('components.sidebar')
      </div>
      <!-- barba container end -->
    
      <!-- JavaScript -->
      @include('partials.js')
    </body>
</html>
