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