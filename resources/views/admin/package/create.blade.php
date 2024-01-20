@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">package
      <h1 class="text-30 lh-12 fw-700">package</h1>
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
          <form class="contact-form row y-gap-30" action="{{route('admin.package.store')}}" method="POST">
            @csrf
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Priority</label>
              <input name="priority" type="number" class="form-control form-control-sm" placeholder="Priority">
          </div>
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">package title {{$lang->code}}</label>
                    <input name="translations[{{$key}}][name]" type="text" placeholder="{{"Title $lang->code"}}">
                    <input name="translations[{{$key}}][language_code]" type="text" value="{{$lang->code}}" style="display: none">
                </div>
            @endforeach
            <div class="row">
              <div class="col-6">
                Medicines
                @foreach ($medicines as $medicine)
                  <div class="form-check">
                    <input name="medicines[]" class="form-check-input" type="checkbox" value="{{$medicine->id}}" id="flexCheckDefault{{$medicine->id}}">
                    <label class="form-check-label" for="flexCheckDefault{{$medicine->id}}">
                        {{$medicine->translation->name}}
                    </label>
                  </div>
                @endforeach
              </div>
              <div class="col-6">
                Extra Medicines
                @foreach ($medicines as $medicine)
                  <div class="form-check">
                    <input name="extra_medicines[]" class="form-check-input" type="checkbox" value="{{$medicine->id}}" id="flexCheckDefault{{$medicine->id}}">
                    <label class="form-check-label" for="flexCheckDefault{{$medicine->id}}">
                        {{$medicine->translation->name}}
                    </label>
                  </div>
                @endforeach
              </div>
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