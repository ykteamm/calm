@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Meditator</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between meditators-center py-20 px-30 border-bottom-light">
        <h2 class="text-17 fw-500">{{$meditator->firstname}}</h2>
          @if (isset($meditator->avatar))
          <div style="width: 300px;height:300px">
            <div>Avatar</div>
              <img src="{{asset($meditator->avatar->folder.'/'.$meditator->avatar->name.'.'.$meditator->avatar->extension)}}" alt="ALt">
            </div>
          @endif
          @if (isset($meditator->image))
          <div style="width: 300px;height:300px">
            <div>Image</div>
              <img src="{{asset($meditator->image->folder.'/'.$meditator->image->name.'.'.$meditator->image->extension)}}" alt="ALt">
            </div>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection