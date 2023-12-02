@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Emoji</h1>
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
          <form class="contact-form row y-gap-30" action="{{route('admin.emoji.update', ['emoji' => $emoji->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Emoji text</label>
              <input name="tex" type="text" value="{{$emoji->text}}" >
            </div>
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Emoji icon</label>
              <input name="icon" type="text" value="{{$emoji->icon}}" >
            </div>
            <div class="row justify-between pt-15">
              <div class="col-auto">
              </div>
  
              <div class="col-auto">
                <button type="submit" class="button -md -purple-1 text-white">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection