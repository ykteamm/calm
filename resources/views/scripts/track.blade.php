<script>
  class Audio {
    #lesson;
    #lessons;
    #audio;
    #updateTimerInterval;
    #updateTimerCallback;
    #restartAudioCallback;
    #player;
    #playPauseBtn;
    #nextBtn;
    #prevBtn;
    #seekSlider;
    #volumeSlider;
    #currentTime;
    #totalDuration;
    #playerTitle;
    #playerTitleSm;
    #isPlaying;

    constructor() {
      this.mount();
    }

    setLesson(lesson) {
      this.lesson = lesson;
    }

    setLessons(lessons = []) {
      this.lessons = lessons;
    }

    unmount() {
      this.isPlaying = false;
      this.audio = null;
      this.player = null;
      this.playPauseBtn = null;
      this.nextBtn = null;
      this.prevBtn = null;
      this.seekSlider = null;
      this.volumeSlider = null;
      this.currentTime = null;
      this.totalDuration = null;
      this.playerTitle = null;
      this.lessons = [];
    }

    mount(){
      this.isPlaying = true;
      this.audio = document.createElement('audio');
      this.player = document.querySelector(".player")
      this.playPauseBtn = document.querySelector(".p-playpause-track");
      this.nextBtn = document.querySelector(".p-next-track");
      this.prevBtn = document.querySelector(".p-prev-track");
      this.seekSlider = document.querySelector(".p-seek_slider");
      this.volumeSlider = document.querySelector(".p-volume_slider");
      this.currentTime = document.querySelector(".p-current-time");
      this.totalDuration = document.querySelector(".p-total-duration");
      this.playerTitle = document.querySelector(".p-title");
      this.playerTitleSm = document.querySelector(".p-title-sm");
      this.lessons = [];
      return this;
    }

    play(path = null, name = null){
      if (this.loadAudio(path, name)) {
        try {
          this.clearTimer()
          this.resetValues();
          this.setTimer();
          this.setRestarter();
          this.playTrack();
        } catch (error) {
          console.log(error);
        }
        return this;
      }
    }

    setRestarter() {
      if (this.restartAudioCallback) {
        this.audio.addEventListener("ended", this.restartAudioCallback);
      }
      return this;
    }

    async loadAudio(path = null, name = null) {
      try {
        if (path && typeof path == "string") {
          this.audio.src = path;
          this.playerTitle.innerHTML = name ? name : "Audio";
          this.playerTitleSm.innerHTML = name ? name : "Audio";
          this.audio.load();
        } else if (path && typeof path == "object") {
          this.setLesson(path);
          this.audio.src = location?.origin + '/' + this.lesson?.audio?.path;
          this.playerTitle.innerHTML = this.lesson?.translation?.name
          this.playerTitleSm.innerHTML = this.lesson?.translation?.name
          this.audio.load();
        } else if (this.lesson) {
          this.audio.src = location?.origin + '/' + this.lesson?.audio?.path;
          this.playerTitle.innerHTML = this.lesson?.translation?.name
          this.playerTitleSm.innerHTML = this.lesson?.translation?.name
          this.audio.load();
        }
        return true;
      } catch (error) {
        console.log(error, "Error load audio");
        return false;
      }
    }
    
    clearTimer() {
      if (this.updateTimerInterval) {
        clearInterval(this.updateTimerInterval)
      }
    }

    setTimer() {
      if (this.updateTimerCallback) {
        this.updateTimerInterval = setInterval(this.updateTimerCallback, 1000);
      }
    }

    registerTimer(callback) {
      if (typeof callback == "function") {
        this.updateTimerCallback = callback(this);
      }
    }

    registerRestarter(callback) {
      if (typeof callback == "function") {
        this.restartAudioCallback = callback(this);
      }
    }

    showPlayer(path = null, name = null){
      this.play(path, name);
      this.player.classList.add('open');
      return this;
    }

    hidePlayer() {
      if (this.player) {
        if(this.player.classList.contains('open')) {
          this.player.classList.remove('open');
        } 
      }
      this.unmount();
    }

    resetValues() {
      this.currentTime.textContent = "00:00";
      this.totalDuration.textContent = "00:00";
      this.seekSlider.value = 0;
      return this;
    }

    playTrack() {
      this.audio.play();
      this.isPlaying = true;
      this.playPauseBtn.innerHTML = '<i class="fa fa-pause-circle fa-3x"></i>';
      return this;
    }

    playPauseTrack() {
      if (!this.isPlaying) this.playTrack();
      else this.pauseTrack();
      return this;
    }
  
    pauseTrack() {
      this.audio.pause();
      this.isPlaying = false;
      this.playPauseBtn.innerHTML = '<i class="fa fa-play-circle fa-3x"></i>';
      return this;
    }
  
    stopPlayer(){
      this.pauseTrack()
      this.player.classList.remove('open');
      return this;
    }

    restart() {
      this.play()
      return this;
    }

    setVolume() {
      this.audio.volume = this.volumeSlider.value / 100;
      return this;
    }
  
    seekUpdate() {
      let seekPosition = 0;
      if (!isNaN(this.audio.duration)) {
        seekPosition = this.audio.currentTime * (100 / this.audio.duration);
        this.seekSlider.value = seekPosition;
        let currentMinutes = Math.floor(this.audio.currentTime / 60);
        let currentSeconds = Math.floor(this.audio.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(this.audio.duration / 60);
        let durationSeconds = Math.floor(this.audio.duration - durationMinutes * 60);
        if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
        if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
        if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
        if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }
    
        this.currentTime.textContent = currentMinutes + ":" + currentSeconds;
        this.totalDuration.textContent = durationMinutes + ":" + durationSeconds;
      }
      return this;
    }

    seekTo() {
      let seekto = this.audio.duration * (this.seekSlider.value / 100);
      this.audio.currentTime = seekto;
    }

    nextTrack() {
      if (this.lessons.length > 0) {
        let index = this.lessons.findIndex(les => les.id == this.lesson.id);
        if (index < this.lessons.length && this.lessons[index + 1]) {
          this.lesson = this.lessons[index + 1];
          this.play();
        }
      }
    }
  
    prevTrack() {
      if (this.lessons.length > 0) {
        let index = this.lessons.findIndex(les => les.id == this.lesson.id);
        if (index > 0 && this.lessons[index - 1]) {
          this.lesson = this.lessons[index - 1];
          this.play();
        }
      }
    }
  }

  
  let audioplayer = new Audio();
  audioplayer.registerTimer(function (player) {
    return function () {
      player.seekUpdate();
    }
  })

  audioplayer.registerRestarter(function (player) {
    return function () {
      player.restart();
    }
  })

  function playerOpenClose(lesson, lessons){
    audioplayer.setLesson(lesson);
    audioplayer.setLessons(lessons);
    audioplayer.showPlayer();
  } 

  function prevTrack() {
    audioplayer.prevTrack()
  }

  function nextTrack() {
    audioplayer.nextTrack()
  }

  function stopPlayer(){
    audioplayer.stopPlayer()
  }

  function playPauseTrack() {
    audioplayer.playPauseTrack();
  }

  function setVolume() {
    audioplayer.setVolume();
  }

  function seekTo() {
    audioplayer.seekTo();
  }
</script>