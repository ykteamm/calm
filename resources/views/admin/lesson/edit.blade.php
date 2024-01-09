@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Meditator</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-60">
    <div class="col-12">
      <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
        <div class="d-flex items-center py-20 px-30 border-bottom-light">
          <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
        </div>

        <div class="py-30 px-30">
          <form class="contact-form row y-gap-30" action="{{route('admin.lesson.update', ['lesson' => $lesson->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Meditation select</label>
              <select name="meditation_id" id="">
                <option value="{{$lesson->meditation_id}}" selected>{{$lesson->meditation->translation->name}}</option>
                @foreach ($meditations as $meditation)
                  <option value="{{$meditation->id}}">{{$meditation->translation->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="row">
              <div class="col-12 col-md-4">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Daily </label>
                <input name="daily" type="number" value="{{$lesson->daily}}" placeholder="" class="form-control form-control-sm">
              </div>
              <div class="col-12 col-md-4">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Duration </label>
                <input name="duration" type="number" value="{{$lesson->duration}}" placeholder="" class="form-control form-control-sm">
              </div>
              <div class="col-12 col-md-4">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Block </label>
                <input name="block" type="checkbox"  value="1" @if ($lesson->block == 1) checked @endif placeholder="" class="form-check">
              </div>
            </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Lesson {{$lang->code}}</label>
                    <input name="translations[{{$key}}][id]" type="text" @isset($lesson->translations[$key]) value="{{$lesson->translations[$key]->id}}" @endisset style="display: none">
                    <input name="translations[{{$key}}][name]" type="text" @isset($lesson->translations[$key]) value="{{$lesson->translations[$key]->name}}" @endisset placeholder="{{"Title $lang->code"}}" >
                    <input name="translations[{{$key}}][language_code]" type="text" value="{{$lang->code}}" style="display: none">
                </div>
            @endforeach
            <div class="row justify-between pt-15">
              <div class="col-auto">
              </div>
  
              <div class="col-auto">
                <button type="submit" class="button -md -purple-1 text-white">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection