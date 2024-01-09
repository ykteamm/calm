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
          <form class="contact-form row y-gap-30" action="{{route('admin.meditation.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Meditators select</label>
                <select name="meditator_id" id="">
                  @foreach ($meditators as $meditator)
                    <option value="{{$meditator->id}}">{{$meditator->firstname}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Categoris select</label>
                <select name="category_id" id="">
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->translation->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Type select</label>
                <select name="type" id="">
                  @foreach ($types as $code => $type)
                    <option value="{{$code}}">{{$type}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Group select</label>
                <select name="group" id="">
                  @foreach ($groups as $code => $type)
                    <option value="{{$code}}">{{$type}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Meditation {{$lang->code}}</label>
                    <input name="translations[{{$key}}][name]" type="text" placeholder="{{"Title $lang->code"}}">
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