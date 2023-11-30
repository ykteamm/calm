@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Variant</h1>
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
          <form class="contact-form row y-gap-30" action="{{route('admin.variant.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-12">
                @if (count($questions) == 0)
                  <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
                    <a href="{{route('admin.question.create')}}" class="text-14 text-purple-1 underline">Variant create</a>
                  </div>
                @else  
                  <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Variant select</label>
                  <select name="question_id" id="">
                    @foreach ($questions as $question)
                      <option value="{{$question->id}}">{{$question->translation->name}}</option>
                    @endforeach
                  </select>
                </div>
                @endif
            </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Variant {{$lang->code}}</label>
                    <input name="translations[{{$key}}][name]" type="text" placeholder="{{"Variant $lang->code"}}">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Answer {{$lang->code}}</label>
                    <input name="translations[{{$key}}][answer]" type="text" placeholder="{{"Answer $lang->code"}}">
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