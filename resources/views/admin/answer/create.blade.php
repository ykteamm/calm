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
          <form class="contact-form row y-gap-30" action="{{route('admin.answer.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">test select</label>
                <select name="test_id" id="">
                  @foreach ($tests as $test)
                    <option value="{{$test->id}}">{{$test->translation->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Type select</label>
                <select name="type" id="">
                  @foreach ($types as $type => $label)
                    <option value="{{$type}}">{{$label}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">package select</label>
                <select name="package_id" id="">
                  @foreach ($packages as $package)
                    <option value="{{$package->id}}">{{$package->translation->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">medicine select</label>
                <select name="medicine_id" id="">
                  @foreach ($medicines as $medicine)
                    <option value="{{$medicine->id}}">{{$medicine->translation->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">answer title {{$lang->code}}</label>
                    <input required name="translations[{{$key}}][name]" type="text" placeholder="{{"Title $lang->code"}}">
                    <input name="translations[{{$key}}][language_code]" type="text" value="{{$lang->code}}" style="display: none">
                </div>
            @endforeach
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Answer order</label>
              <input required name="order" type="number" placeholder="Answer order">
            </div>
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