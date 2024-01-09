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
            @livewire('meditation', ['id' => $id], key($id))
        </div>
      </div>
    </div>
  </div>
  <div class="player">
    <div class="p-controls-panel">
      <div class="p-title">
        1.Calm music
      </div>
      <div class="p-buttons">
          <div class="p-prev-track" onclick="prevTrack()"><i class="fa fa-step-backward fa-1x"></i></div>
          <div class="p-playpause-track" onclick="playpauseTrack()"><i class="fa fa-play-circle fa-3x"></i></div>
          <div class="p-next-track" onclick="nextTrack()"><i class="fa fa-step-forward fa-1x"></i></div>
      </div>
      <div class="p-stop">
        <div>
          <div class="p-stop-btn" onclick="stopPlayer()">
            <i class="fas fa-stop"></i>
          </div>
            <div class="p-slider_container">
              <i class="fa fa-volume-down"></i>
              <input type="range" min="1" max="100" value="99" class="p-volume_slider" onchange="setVolume()">
              <i class="fa fa-volume-up"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="p-slider_container">
        <div class="p-current-time">00:00</div>
        <input type="range" min="1" max="100" value="0" class="p-seek_slider" onchange="seekTo()">
        <div class="p-total-duration">00:00</div>
    </div>
  </div>
@endsection
