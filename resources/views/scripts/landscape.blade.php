<script>
    function landscapeAudio(landscape){
        let info = localStorage.setItem('landscape', JSON.stringify(landscape));
        // playAudio();
        // playVideo();
        // console.log(landscape, info);
        var data = new FormData();
        data.append('landscape', landscape.id);
        data.append('landscape_audio_path', landscape.audio.path);
        data.append('landscape_video_path', landscape.video.path);
        fetch('landscape-save-session', {
            method: 'post',
            body: data
        }).then(async (res) => {
            console.log(await res.json());
            playVideo(null, landscape)
            playAudio(null, landscape)
        }).catch(err => {
            console.log(err);
        })
    }

    function mediaCancel() {
        var data = new FormData();
        data.append('landscape', null);
        data.append('landscape_audio_path', null);
        data.append('landscape_video_path', null);
        fetch('landscape-save-session', {
            method: 'post',
            body: data
        })
        localStorage.removeItem('landscape');
    }

    function playVideo(id = null, landscape = null){
        ln = localStorage.getItem('landscape');
        if(!landscape && ln) {
            landscape = JSON.parse(ln);
        } else {
            return;
        }
        var parentElement = document.getElementById('landscapeVideoTest');
        var landscapeVideo = document.createElement('video');
        if (id) {
            var landscapeVideo = document.getElementById(id);
        }
        var prevVideo = document.querySelector('.temporaryLandscapeVideoClass');
        if(prevVideo) {
            parentElement.removeChild(prevVideo)
        }
        landscapeVideo.src=location.origin+'/'+landscape.video.path
        if (!id){
            landscapeVideo.type="video/mp4"
            landscapeVideo.style.position = 'absolute'; 
            landscapeVideo.style.zIndex = '1'; 
            landscapeVideo.classList.add('temporaryLandscapeVideoClass')
            landscapeVideo.style.opacity='50%'; 
            landscapeVideo.style.right = '0'; 
            landscapeVideo.style.bottom ='0';
            landscapeVideo.style.left= '0';
            landscapeVideo.style.minWidth = '100%'; 
            landscapeVideo.style.minHeight='100%'; 
            landscapeVideo.autoplay=true
            landscapeVideo.loop=true
            landscapeVideo.muted=true 
            landscapeVideo.playsinline=true
            parentElement.appendChild(landscapeVideo)
        }
    }
    function playAudio(id = null, landscape = null){
        ln = localStorage.getItem('landscape');
        if(!landscape && ln) {
            landscape = JSON.parse(ln);
        } else {
            return;
        }
        var parentElement = document.getElementById('landscapeVideoTest');
        var landscapeAudio = document.createElement('audio');
        if (id) {
            var landscapeAudio = document.getElementById(id);
            console.log(id, landscapeAudio, landscape, parentElement);
        }
        document.body.appendChild(landscapeAudio);
        var prevAudio = document.querySelector('.temporaryLandscapeAudioClass');
        if(prevAudio && parentElement) {
            parentElement.removeChild(prevAudio)
        }
        landscapeAudio.src=location.origin+'/'+landscape.audio.path
        // landscapeAudio.muted = true;
        landscapeAudio.play()
        landscapeAudio.addEventListener('ended', function() {
            landscapeAudio.currentTime = 0;
            landscapeAudio.play();
        });
        window.addEventListener('load', function() {
            landscapeAudio.load();
        });
        if (!id) {
            parentElement.appendChild(landscapeAudio)
        }
    }
</script>

<script>
    // var audioElement1 = document.getElementById('audio-player');
    // var audioElement2 = document.getElementById('audio-player-1');
    // var video_bg = document.getElementById('myVideo');
    // var video_bg1 = document.getElementById('myVideo1');
    // var isPlaying1 = false;
    // var isPlaying2 = false;

    // function play_audio(task, audioElement) {
    //     if (task === 'play') {
    //         audioElement.play();
    //         if (audioElement === audioElement1) {
    //             isPlaying1 = true;
    //             video_bg.style.display = 'block';
    //             video_bg1.style.display = 'none';
    //             isPlaying2 = false;
    //         } else if (audioElement === audioElement2) {
    //             isPlaying1 = false;
    //             video_bg.style.display = 'none';
    //             video_bg1.style.display = 'block';
    //             isPlaying2 = true;
    //         }

    //         // Qaytaruvchi (looper) qo'shish
    //         audioElement.addEventListener('ended', function() {
    //             audioElement.currentTime = 0;
    //             audioElement.play();
    //         });
    //         // video_bg.style.display = 'none';
    //     }
    //     if (task === 'stop') {
    //         audioElement.pause();
    //         audioElement.currentTime = 0;
    //         isPlaying1 = false;
    //         isPlaying2 = false;

    //         // video_bg.style.display = 'block';
    //     }
    // }

    // document.getElementById('playBtn').addEventListener('click', function() {
    //     if (!isPlaying1) {
    //         play_audio('play', audioElement1);
    //         play_audio('stop', audioElement2);
    //     }
    // });

    // document.getElementById('playBtn1').addEventListener('click', function() {
    //     if (!isPlaying2) {
    //         play_audio('play', audioElement2);
    //         play_audio('stop', audioElement1);
    //     }
    // });

    // document.getElementById('stopBtn').addEventListener('click', function() {
    //     play_audio('stop', audioElement1);
    //     play_audio('stop', audioElement2);
    // });

    // // Saqlangan sahifani ochib bo'lganda audio ni yuklash
    // window.addEventListener('load', function() {
    //     audioElement1.load();
    //     audioElement2.load();
    // });
</script>