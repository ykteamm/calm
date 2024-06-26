@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">answer</h1>
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
          <form class="contact-form row y-gap-30" action="{{route('admin.answer.update', ['answer' => $answer->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">test select</label>
                <select name="test_id" id="">
                  @foreach ($tests as $test)
                    <option value="{{$test->id}}">{{$test->translation->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">answer title {{$lang->code}}</label>
                    <input name="translations[{{$key}}][id]" type="text" @isset($answer->translations[$key]) value="{{$answer->translations[$key]->id}}" @endisset style="display: none">
                    <input name="translations[{{$key}}][name]" type="text" @isset($answer->translations[$key]) value="{{$answer->translations[$key]->name}}" @endisset placeholder="{{"Title $lang->code"}}" >
                    <input name="translations[{{$key}}][language_code]" type="text" value="{{$lang->code}}" style="display: none">
                </div>
            @endforeach
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Answer order</label>
              <input name="order" type="number" value="{{$answer->order}}" placeholder="Answer order">
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