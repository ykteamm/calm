<script>
    function landscapeAudio(landscape){
        let info = localStorage.setItem('landscape', JSON.stringify(landscape));
        var data = new FormData();
        data.append('landscape', landscape.id);
        data.append('landscape_audio_path', landscape.audio.path);
        data.append('landscape_video_path', landscape.video.path);
        fetch('landscape-save-session', {
            method: 'post',
            body: data
        }).then(async (res) => {
            playVideoSelected(landscape);
            playAudioSelected(landscape);
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
        let LANDSCAPE_VIDEO_ID = 'mainBackgroundVideo';
        let LANDSCAPE_AUDIO_ID = 'mainBackgroundAudio';
        let audio = document.getElementById(LANDSCAPE_AUDIO_ID);
        var mainBackgroundVideo = document.getElementById(LANDSCAPE_VIDEO_ID);
        var testBackgroundVideo = document.getElementById("testBackgroundVideo");

        audio?.pause();
        audio.style.display = 'none';
        mainBackgroundVideo?.pause();
        mainBackgroundVideo.style.display = 'none';
        testBackgroundVideo.style.display = 'none';
    }

    function playVideoSelected(landscape){
        let LANDSCAPE_VIDEO_ID = 'mainBackgroundVideo';
        var video = document.getElementById("mainBackgroundVideo");
        if(video) {
            mainBackgroundVideo = video;
            if (mainBackgroundVideo.style.display == 'none') {
                mainBackgroundVideo.style.display = 'block';
            }
            
        } else {
            var mainBackgroundVideo = document.createElement('video');
            mainBackgroundVideo.setAttribute('id', LANDSCAPE_VIDEO_ID);
            document.querySelector('.preloader-visible').appendChild(mainBackgroundVideo);
        }
        var testBackgroundVideo = document.getElementById("testBackgroundVideo");
        if (testBackgroundVideo) {
            if (testBackgroundVideo.style.display == 'none') {
                testBackgroundVideo.style.display = 'block';
            }
            testBackgroundVideo.src=location.origin+'/'+landscape.video.path;
            testBackgroundVideo.type="video/mp4"
            testBackgroundVideo.style.position = 'absolute'; 
            testBackgroundVideo.style.zIndex = '1'; 
            testBackgroundVideo.classList.remove('d-none')
            testBackgroundVideo.style.opacity='50%'; 
            testBackgroundVideo.style.right = '0'; 
            testBackgroundVideo.style.bottom ='0';
            testBackgroundVideo.style.left= '0';
            testBackgroundVideo.style.minWidth = '100%'; 
            testBackgroundVideo.style.minHeight='100%'; 
            testBackgroundVideo.autoplay=true
            testBackgroundVideo.loop=true
            testBackgroundVideo.muted=true 
            testBackgroundVideo.playsinline=true
        }
        mainBackgroundVideo.src = location.origin+'/'+landscape.video.path;
        // document.querySelector(".preloader-visible").appendChild(testBackgroundVideo);
    }

    function playAudioSelected(landscape){
        let LANDSCAPE_AUDIO_ID = 'mainBackgroundAudio';
        let audio = document.getElementById(LANDSCAPE_AUDIO_ID);
        if(audio) {
            landscapeAudio = audio;
        } else {
            var landscapeAudio = document.createElement('audio');
            landscapeAudio.setAttribute('id', LANDSCAPE_AUDIO_ID);
            document.body.appendChild(landscapeAudio);
        }
        landscapeAudio.src=location.origin+'/'+landscape.audio.path
        landscapeAudio.play()
        landscapeAudio.addEventListener('ended', function() {
            landscapeAudio.currentTime = 0;
            landscapeAudio.play();
        });
        window.addEventListener('load', function() {
            landscapeAudio.load();
        });
    }
</script>