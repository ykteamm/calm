<div class="player">
    <div class="p-controls-panel">
      <div class="p-title">
        1.Calm music
      </div>
      <div class="p-buttons">
          <div class="p-prev-track" onclick="prevTrack()"><i class="fa fa-step-backward fa-1x"></i></div>
          <div class="p-playpause-track" onclick="playPauseTrack()"><i class="fa fa-play-circle fa-3x"></i></div>
          <div class="p-next-track" onclick="nextTrack()"><i class="fa fa-step-forward fa-1x"></i></div>
      </div>
      <div class="p-stop">
        <div class="row">
          <div class="col-1 p-0 p-stop-btn" onclick="stopPlayer()">
            <i class="fas fa-stop"></i>
          </div>
          <div class="text-white col-6 p-0 p-title-p">
            <div class="p-title-sm">
              1.Calm music
            </div>
          </div>
          <div class="col-5 p-0">
            <div class="p-volume-slider_container">
              <i class="fa fa-volume-down"></i>
              <input type="range" min="1" max="100" value="99" class="p-volume_slider" onchange="setVolume()">
              <i class="fa fa-volume-up"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-seek-slider_container">
        <div class="p-current-time">00:00</div>
        <input type="range" min="1" max="100" value="0" class="p-seek_slider" onchange="seekTo()">
        <div class="p-total-duration">00:00</div>
    </div>
</div>