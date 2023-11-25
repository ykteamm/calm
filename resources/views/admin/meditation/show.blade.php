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
          @if (isset($meditator->assets[0]) && ($avatar = $meditator->assets[0]))
          <div style="width: 300px;height:300px">
            <div>Avatar</div>
            <div>
              <form action="{{route('admin.meditator-unupload', ['meditator' => $meditator->id, 'asset' => $avatar->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
              </form>
            </div>
              <img src="{{asset($avatar->path)}}" alt="ALt">
            </div>
          @endif
          @if (isset($meditator->assets[1]) && ($image = $meditator->assets[1]))
          <div style="width: 300px;height:300px">
            <div>Image</div>
            <div>
              <form action="{{route('admin.meditator-unupload', ['meditator' => $meditator->id, 'asset' => $image->id])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
              </form>
            </div>
              <img src="{{asset($image->path)}}" alt="ALt">
            </div>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection