<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{asset('calm/js/vendors.js')}}"></script>
<script src="{{asset('calm/js/main.js')}}"></script>
<script src="{{asset('calm/js/player.js')}}"></script>
<script src="{{asset('calm/js/click.js')}}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var menuBtn = document.getElementById('menu_btn');
        var dashboard = document.querySelector('.dashboard');
        var closeButton = document.getElementById('close_btn');
        menuBtn.addEventListener('click', function () {
            // Click hodisasida ishlatiladigan funktsiya
            // menuBtn.classList.toggle('clicked');
            dashboard.classList.toggle('-is-sidebar-hidden');
        });
        closeButton.addEventListener('click', function () {
            // Close button bosganda sidebarni yopish
            dashboard.classList.add('-is-sidebar-hidden');
        });
    });
</script>
<script>
    // JavaScript orqali sahifani yangilash
    document.getElementById('question').addEventListener('click', function() {
        location.reload();
    });
</script>


<script>
    var audioElement1 = document.getElementById('audio-player');
    var audioElement2 = document.getElementById('audio-player-1');
    var video_bg = document.getElementById('myVideo');
    var video_bg1 = document.getElementById('myVideo1');
    var isPlaying1 = false;
    var isPlaying2 = false;

    function play_audio(task, audioElement) {
        if (task === 'play') {
            audioElement.play();
            if (audioElement === audioElement1) {
                isPlaying1 = true;
                video_bg.style.display = 'block';
                video_bg1.style.display = 'none';
                isPlaying2 = false;
            } else if (audioElement === audioElement2) {
                isPlaying1 = false;
                video_bg.style.display = 'none';
                video_bg1.style.display = 'block';
                isPlaying2 = true;
            }

            // Qaytaruvchi (looper) qo'shish
            audioElement.addEventListener('ended', function() {
                audioElement.currentTime = 0;
                audioElement.play();
            });
            // video_bg.style.display = 'none';
        }
        if (task === 'stop') {
            audioElement.pause();
            audioElement.currentTime = 0;
            isPlaying1 = false;
            isPlaying2 = false;

            // video_bg.style.display = 'block';
        }
    }

    document.getElementById('playBtn').addEventListener('click', function() {
        if (!isPlaying1) {
            play_audio('play', audioElement1);
            play_audio('stop', audioElement2);
        }
    });

    document.getElementById('playBtn1').addEventListener('click', function() {
        if (!isPlaying2) {
            play_audio('play', audioElement2);
            play_audio('stop', audioElement1);
        }
    });

    document.getElementById('stopBtn').addEventListener('click', function() {
        play_audio('stop', audioElement1);
        play_audio('stop', audioElement2);
    });

    // Saqlangan sahifani ochib bo'lganda audio ni yuklash
    window.addEventListener('load', function() {
        audioElement1.load();
        audioElement2.load();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var volumeInput = document.getElementById('volume_audio');
        var audioPlayer = document.getElementById('audio-player');

        // Input o'zgarganda
        volumeInput.addEventListener('input', function() {
            var volumeValue = volumeInput.value / 100;
            audioPlayer.volume = volumeValue;
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var volumeInput = document.getElementById('volume_audio');
        var audioPlayer = document.getElementById('audio-player-1');

        // Input o'zgarganda
        volumeInput.addEventListener('input', function() {
            var volumeValue = volumeInput.value / 100;
            audioPlayer.volume = volumeValue;
        });
    });
</script>

<script>
    let player = document.querySelector(".player")
    let playpause_btn = document.querySelector(".p-playpause-track");
    let next_btn = document.querySelector(".p-next-track");
    let prev_btn = document.querySelector(".p-prev-track");

    let seek_slider = document.querySelector(".p-seek_slider");
    let volume_slider = document.querySelector(".p-volume_slider");
    let curr_time = document.querySelector(".p-current-time");
    let total_duration = document.querySelector(".p-total-duration");
    let player_title = document.querySelector(".p-title");

    let track_index = 0;
    let isPlaying = false;
    let updateTimer;

    // Create new audio element
    let curr_track = document.createElement('audio');

    // Define the tracks that have to be played
    let track_list = [
      {
        name: "Night Owl",
        artist: "Broke For Free",
        image: "https://images.pexels.com/photos/2264753/pexels-photo-2264753.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
        path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/no_curator/Tours/Enthusiast/Tours_-_01_-_Enthusiast.mp3"
      },
      {
        name: "Enthusiast",
        artist: "Tours",
        image: "https://images.pexels.com/photos/3100835/pexels-photo-3100835.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
        path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/no_curator/Tours/Enthusiast/Tours_-_01_-_Enthusiast.mp3"
      },
      {
        name: "Shipping Lanes",
        artist: "Chad Crouch",
        image: "https://images.pexels.com/photos/1717969/pexels-photo-1717969.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=250&w=250",
        path: "https://files.freemusicarchive.org/storage-freemusicarchive-org/music/ccCommunity/Chad_Crouch/Arps/Chad_Crouch_-_Shipping_Lanes.mp3",
      },
    ];

    function playerOpenClose()
    {
      if(player.classList.contains('open')) {
        player.classList.remove('open');
        pauseTrack()
      } else {
        player.classList.add('open');
        playTrack()
      }
    }

    function stopPlayer()
    {
      pauseTrack()
      player.classList.remove('open');
    }

    function loadTrack(track_index) {
      clearInterval(updateTimer);
      resetValues();

      // Load a new track
      curr_track.src = track_list[track_index].path;
      player_title.innerHTML = track_list[track_index].name + '. ' + track_list[track_index].artist

      curr_track.load();
      // Set an interval of 1000 milliseconds for updating the seek slider
      updateTimer = setInterval(seekUpdate, 1000);

      // Move to the next track if the current one finishes playing
      curr_track.addEventListener("ended", nextTrack);
    }


    // Reset Values
    function resetValues() {
      curr_time.textContent = "00:00";
      total_duration.textContent = "00:00";
      seek_slider.value = 0;
    }

    function playpauseTrack() {
      if (!isPlaying) playTrack();
      else pauseTrack();
    }

    function playTrack() {
      curr_track.play();
      isPlaying = true;

      // Replace icon with the pause icon
      playpause_btn.innerHTML = '<i class="fa fa-pause-circle fa-3x"></i>';
    }

    function pauseTrack() {
      curr_track.pause();
      isPlaying = false;

      // Replace icon with the play icon
      playpause_btn.innerHTML = '<i class="fa fa-play-circle fa-3x"></i>';;
    }

    function nextTrack() {
      if (track_index < track_list.length - 1)
        track_index += 1;
      else track_index = 0;
      loadTrack(track_index);
      playTrack();
    }

    function prevTrack() {
      if (track_index > 0)
        track_index -= 1;
      else track_index = track_list.length;
      loadTrack(track_index);
      playTrack();
    }

    function seekTo() {
      seekto = curr_track.duration * (seek_slider.value / 100);
      curr_track.currentTime = seekto;
    }

    function setVolume() {
      curr_track.volume = volume_slider.value / 100;
    }

    function seekUpdate() {
      let seekPosition = 0;

      // Check if the current track duration is a legible number
      if (!isNaN(curr_track.duration)) {
        seekPosition = curr_track.currentTime * (100 / curr_track.duration);
        seek_slider.value = seekPosition;

        // Calculate the time left and the total duration
        let currentMinutes = Math.floor(curr_track.currentTime / 60);
        let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(curr_track.duration / 60);
        let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

        // Adding a zero to the single digit time values
        if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
        if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
        if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
        if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

        curr_time.textContent = currentMinutes + ":" + currentSeconds;
        total_duration.textContent = durationMinutes + ":" + durationSeconds;
      }
    }

    // Load the first track in the tracklist
    loadTrack(track_index);
</script>
