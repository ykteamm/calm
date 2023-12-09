@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  @if ($error = Session::get('error'))
      <div class="button -md -red-1 text-white">{{$error}}</div>
  @endif
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Emoji</h1>
      <div class="mt-10">Emoji ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
        <h2 class="text-17 fw-500">Emoji control</h2>
        <a href="{{route('admin.emoji.create')}}" class="text-14 text-purple-1 underline">Create</a>
      </div>
      @foreach ($emojies as $item)
        <div class="py-30 px-30 hover:green">
          <div class="d-flex" style="justify-content: space-between">
            <h4 class="ml-10 text-15 lh-1 fw-500">{{$item->text}}</h4>
            <h4 class="ml-10 text-15 lh-1 fw-500">{{$item->icon}}</h4>
            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
              @if ($image = $item->image)
                <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                  <img src="{{asset($image->path)}}" width="200" alt="Image">
                </div>
              @endif
              <div class="d-flex items-center">
                <i class="icon-message text-15 mr-10"></i>
                <a href="{{route('admin.emoji.show', ['emoji' => $item->id])}}" class="text-14 text-purple-1 underline">Show</a>
              </div>
              <div class="d-flex items-center">
                <i class="icon-online-learning text-15 mr-10"></i>
                <a href="{{route('admin.emoji.edit', ['emoji' => $item->id])}}" class="text-14 text-purple-1 underline">Update</a>
              </div>
              <div class="d-flex items-center">
                <i class="icon-play text-15 mr-10"></i>
                <form action="{{route('admin.emoji.destroy', ['emoji' => $item->id])}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-14 text-purple-1 underline">Delete</button>
                </form>
              </div>
              <div class="d-flex items-center">
                <i class="icon-online-learning text-15 mr-10"></i>
                <a href="{{route('admin.emoji-image-view', ['emoji' => $item->id])}}" class="text-14 text-purple-1 underline">Image</a>
              </div>
            </div>
            <div class="">
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
