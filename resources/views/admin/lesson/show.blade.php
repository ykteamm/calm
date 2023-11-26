@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Lesson</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <h4 class="ml-10 text-15 lh-1 fw-500">Name: {{$lesson->translation->name}}</h4>
      <div class="d-flex items-center rounded-16 bg-white -dark-bg-dark-4 p-2 m-3 shadow-4 h-100" style="justify-content:space-between;border: 1px solid rgb(124, 124, 179)">
        <div>{{$lesson->translation->name}}</div>
        @if ($lesson->audio)
        <audio src="{{asset($lesson->audio->path)}}" controls></audio>
        <div class="d-flex items-center">
          <i class="icon-online-learning text-15 mr-10"></i>
          <a href="{{route('admin.lesson-audio-update-view', ['lesson' => $lesson->id, 'audio' => $lesson->audio->id])}}" class="text-14 text-purple-1 underline">Update</a>
        </div>
        <div class="d-flex items-center">
          <i class="icon-online-learning text-15 mr-10"></i>
          <a href="{{route('admin.lesson-audio-download', ['lesson' => $lesson->id, 'audio' => $lesson->audio->id])}}" class="text-14 text-purple-1 underline">Download</a>
        </div>
        <div class="d-flex items-center">
          <i class="icon-play text-15 mr-10"></i>
          <form action="{{route('admin.lesson-audio-delete', ['lesson' => $lesson->id, 'audio' => $lesson->audio->id])}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="text-14 text-purple-1 underline">Delete</button>
          </form>
        </div>
        @endif
      </div>
      <div class="d-flex justify-between meditators-center py-20 px-30 border-bottom-light">
      </div>
    </div>
  </div>
</div>
@endsection