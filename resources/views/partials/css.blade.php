<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />



<!-- Stylesheets -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('calm/css/vendors.css')}}">
<link rel="stylesheet" href="{{asset('calm/css/main.css')}}">
<link rel="stylesheet" href="{{asset('calm/css/style.css')}}">

{{-- <link rel="stylesheet" href="{{asset('calm/bulma/bulma.min.css')}}">
<link rel="stylesheet" href="{{asset('calm/css/main.min.css')}}"> --}}

{{-- <link rel="stylesheet" href="{{asset('calm/css/player.css')}}"> --}}

{{-- @include('styles.player') --}}

{{-- <style>
    #iVideo {
    position: fixed;
    min-width: 100%;
    min-height: 100%;
    z-index:0;
    opacity: 20%;
    right: 0;
    bottom: 0;
    left: 0;
    display: block;
    z-index: 0r;
    object-fit: cover;
    }
    #mainContent {
        /* position: fixed;
        overflow-y: scroll;
        /* bottom: 0; */
        /* background: rgba(0, 0, 0, 0.5); */
    }
</style>
<style>
    .player {
        transition: all .2s ease;
        position: fixed;
        background-color: rgb(34, 42, 84);
        left: 0;
        right: 0;
        bottom: -17vh;
        height: 17vh;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
    .player.open {
      bottom: 0;
    }
    .p-controls-panel {
      width: 90%;
      display: flex;
      align-items: center;
    }


    .p-buttons {
      width: 20%;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
    }

    .p-title {
      width: 40%;
      color: #fff;
      text-align: start;
    }
    .p-stop {
      width: 40%;
      display: flex;
      justify-content: end;
    }
    .p-stop > div {
      /* background-color: red; */
      width: 40%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .p-stop-btn {
      cursor: pointer;
      color: #fff;
    }

    .p-playpause-track,
    .p-prev-track,
    .p-next-track {
      padding: 20px;
      opacity: 0.8;
      transition: opacity .2s;
    }

    .p-playpause-track:hover,
    .p-prev-track:hover,
    .p-next-track:hover {
      opacity: 1.0;
    }

    .p-slider_container {
      width: 100%;
      max-width: 600px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Modify the appearance of the slider */
    .p-seek_slider,
    .p-volume_slider {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      height: 3px;
      background: black;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }

    /* Modify the appearance of the slider thumb */
    .p-seek_slider::-webkit-slider-thumb,
    .p-volume_slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 10px;
      height: 10px;
      background: white;
      cursor: pointer;
      border-radius: 50%;
    }

    .p-seek_slider:hover,
    .p-volume_slider:hover {
      opacity: 1.0;
    }

    .p-seek_slider {
      background-color: #fff;
      width: 100%;
      cursor: pointer;
      height: 3px;
    }

    .p-volume_slider {
      background-color: #fff;
      width: 30%;
      cursor: pointer;
      height: 3px;
    }

    .p-current-time,
    .p-total-duration {
      color: #fff;
      padding: 5px;
    }

    i.fa-volume-down,
    i.fa-volume-up {
      color: #fff;
      padding: 5px;
    }

    i.fa-play-circle,
    i.fa-pause-circle,
    i.fa-step-forward,
    i.fa-step-backward {
      color: #fff;
      cursor: pointer;
    }
    @media (max-width: 500px) {
      .p-controls-panel {
        width: 100%;
        display: flex;
        flex-direction: column;
        /* align-items: center; */
      }
      .p-buttons {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
      }

      .p-title {
        display: none;
        width: 100%;
        color: #fff;
        text-align: start;
      }
      .p-stop {
        /* display: none; */
        width: 100%;
        display: flex;
        justify-content: end;
      }
      .p-stop > div {
        /* background-color: red; */
        width: 90%;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
    }
</style> --}}

<style>
    .quiz-font {
      font-family: math;
    }

    /* .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    } */


    .swiper-slide-custom {
      width: 230px !important;
    }
</style>
