<div class="a-player">
    <div class="a-main">
        <div class="a-items">
            <div>
                <div class="a-control">
                    <img src="{{asset('player/prev.svg')}}" alt="">
                    <img src="{{asset('player/pause.svg')}}" alt="">
                    <img src="{{asset('player/next.svg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="a-audio">
            <audio controls>
                <source src="http://localhost:8000/audios/202311123456Z0Q98.mp3" type="audio/mp3">
                Your browser does not support the audio tag.
              </audio>
        </div>
    </div>
</div>
<script>

</script>
<style>
    .a-player {
        background-color: #080747;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 15vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .a-main {
        width: 100%;
    }
    .a-items {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .a-items > div {
        width: 30%;
    }
    .a-control {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .a-audio {
        width: 100vw;
    }

    audio {
        width: 100%; /* Set the width */
        background: transparent;
    }
    audio::-moz-range-thumb {
        
    }

    audio::-webkit-media-controls-panel {
        background: #080747;
        border: 0;
    }

    audio::-webkit-media-controls-mute-button {
        display: none;
        position: absolute;
        opacity: 0;
    }
    audio::-webkit-media-controls-play-button {
        opacity: 0;
        position: absolute;
    }

    audio::-webkit-media-controls-timeline-container {
        /* background: red;
        color: rgb(255, 0, 128);
        border: 2px solid yellow;
        opacity: 0; */
    }

    audio::-webkit-media-controls-current-time-display {
        color: rgb(255, 255, 255);
        
        /* opacity: 0; */
        /* border:  */
    }

    audio::-webkit-media-controls-time-remaining-display {
        color: rgb(255, 255, 255);
        /* background: red;
        color: rgb(255, 0, 128);
        border: 2px solid yellow;
        opacity: 0; */
    }

    audio::-webkit-media-controls-timeline {
        height: 2px;
        background: #ffffff;
        /* border: 2px solid #ffffff; */
    }
    audio::-webkit-media-controls-timeline::-webkit-media-slider-thumb {
        height: 2px;
        background-color: #ff0000;
        /* background: #ffffff; */
        /* border: 2px solid #ffffff; */
    }

    audio::-webkit-media-controls-volume-slider-container {
        /* background: red;
        color: rgb(255, 0, 128);
        border: 2px solid yellow;
        opacity: 0; */
    }

    audio::-webkit-media-controls-volume-slider {
        background: red;
        color: rgb(255, 0, 128);
        border: 2px solid yellow;
        opacity: 0;
    }

    audio::-webkit-media-controls-seek-back-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
        opacity: 0;
    }

    audio::-webkit-media-controls-seek-forward-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
    }

    audio::-webkit-media-controls-fullscreen-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
    }

    audio::-webkit-media-controls-rewind-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
    }

    audio::-webkit-media-controls-return-to-realtime-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
    }

    audio::-webkit-media-controls-toggle-closed-captions-button {
        background: red;
        color: rgb(255, 0, 128);
        height: 100px;
        border: 2px solid yellow;
    }
</style>