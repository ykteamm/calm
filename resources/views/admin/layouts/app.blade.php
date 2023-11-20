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
          <div class="content-wrapper js-content-wrapper">
            <div class="dashboard -home-9 js-dashboard-home-9">
              <div class="dashboard__sidebar scroll-bar-1">
                @include('admin.layouts.sidebar')
              </div>
              <div class="dashboard__main">
                @yield('admin_content')
                @include('admin.layouts.footer')
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- barba container end -->
      @include('partials.js')
    </body>
</html>
