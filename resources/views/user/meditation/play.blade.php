@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
   <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('{{asset($meditation->lessons[0]->image->path)}}');height:100vh;background-size: cover;background-position: center center;
    background-repeat: no-repeat;">
    {{-- <div class="dashboard -home-9 px-0 js-dashboard-home-9" style="background-image: url('https://assets.calm.com/384/9c1d8d0876904827cf12a9cc228ad435.jpeg');height:100vh;background-size: cover;" > --}}
      @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0" >
        {{-- <div class="dashboard__main mt-0 main-color" style="background-image: url('calm/2.jpg');height: 100vh"> --}}
        <div class="dashboard__content pt-0 px-15 pb-0" style="height:100%">
          <div style="position: relative">
            @livewire('meditation', ['id' => $id], key($id))
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('user.meditation.player')
@endsection
