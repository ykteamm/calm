@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Package</h1>
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
          <form class="contact-form row y-gap-30" action="{{route('admin.rule.update', ['rule' => $rule->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Package select</label>
                <select name="package_id" id="">
                  <option value="{{$rule->package_id}}">{{$rule->package->translation->name}}</option>
                  @foreach ($packages as $package)
                    <option value="{{$package->id}}">{{$package->translation->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Result select</label>
                <select name="result_id" id="">
                  <option value="{{$rule->result_id}}">{{$rule->result->translation->name}}</option>
                  @foreach ($results as $result)
                    <option value="{{$result->id}}">{{$result->translation->name}}</option>
                  @endforeach
                  <option value="">No</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Min value</label>
                <input name="min" value="{{$rule->min}}" type="number" placeholder="min">
              </div>
              <div class="col-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Max value</label>
                <input name="max" value="{{$rule->max}}" type="number" placeholder="max">
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