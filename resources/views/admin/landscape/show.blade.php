@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Landscape</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between meditators-center py-20 px-30 border-bottom-light">
        <div>Image</div>
        @if ($landscape->image)
          <img width="200" src="{{asset($landscape->image->path)}}" alt="ALt">
        @endif
      </div>
      <div class="d-flex justify-between meditators-center py-20 px-30 border-bottom-light">
        <div>Audio</div>
        @if ($landscape->audio)
          <audio src="{{asset($landscape->audio->path)}}" controls></audio>
        @endif
      </div>
      <div class="d-flex justify-between meditators-center py-20 px-30 border-bottom-light">
        <div>Video</div>
        @if ($landscape->video)
          <video width="600" autoplay muted loop playsinline>
            <source src="{{asset($landscape->video->path)}}" type="video/mp4">
          </video>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection