@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  @if ($error = Session::get('error'))
      <div class="button -md -red-1 text-white">{{$error}}</div>
  @endif
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Question</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
        <h2 class="text-17 fw-500">Question control</h2>
        <a href="{{route('admin.question.create')}}" class="text-14 text-purple-1 underline">Create</a>
      </div>
      @foreach ($question as $item)
        <div class="py-30 px-30 hover:green">
          <div class="d-flex" style="justify-content: space-between">
            <h4 class="ml-10 text-15 lh-1 fw-500">{{$item->translation->name}}</h4>
            <div class="d-flex items-center x-gap-20 y-gap-10 flex-wrap pt-10">
              <div class="d-flex items-center">
                <i class="icon-message text-15 mr-10"></i>
                <a href="{{route('admin.question.show', ['question' => $item->id])}}" class="text-14 text-purple-1 underline">Show</a>
              </div>
              <div class="d-flex items-center">
                <i class="icon-online-learning text-15 mr-10"></i>
                <a href="{{route('admin.question.edit', ['question' => $item->id])}}" class="text-14 text-purple-1 underline">Update</a>
              </div>
              <div class="d-flex items-center">
                <i class="icon-play text-15 mr-10"></i>
                <form action="{{route('admin.question.destroy', ['question' => $item->id])}}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-14 text-purple-1 underline">Delete</button>
                </form>
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