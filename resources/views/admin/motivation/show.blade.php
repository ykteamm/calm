@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Motivation</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
        Author: <h2 class="text-17 fw-500">{{$motivation->translation->author}}</h2>
      </div>
      <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
        Text: <h4 class="text-17 fw-500">{{$motivation->translation->text}}</h4>
      </div>
      <h4>Translations</h4>
      @foreach ($motivation->translations as $tr)
        <div class="py-30 px-30 hover:green">
          <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
            Author: <h2 class="text-17 fw-500">{{$tr->author}}</h2>
          </div>
          <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
            Text: <h4 class="text-17 fw-500">{{$tr->text}}</h4>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection