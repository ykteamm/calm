@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
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
          <form class="contact-form row y-gap-30" action="{{route('admin.package.update', ['package' => $package->id])}}" method="POST">
            @csrf
            @method('put')
            @foreach ($langs as $key => $lang)
                <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">package title {{$lang->code}}</label>
                    <input name="translations[{{$key}}][id]" type="text" @isset($package->translations[$key]) value="{{$package->translations[$key]->id}}" @endisset style="display: none">
                    <input name="translations[{{$key}}][name]" type="text" @isset($package->translations[$key]) value="{{$package->translations[$key]->name}}" @endisset placeholder="{{"Title $lang->code"}}" >
                    <input name="translations[{{$key}}][language_code]" type="text" value="{{$lang->code}}" style="display: none">
                </div>
            @endforeach
            <div class="col-12">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Priority</label>
              <input name="priority" type="number" value="{{$package->priority}}">
            </div>
           <div class="row">
            <div class="col-4">
              Package medicines
              @foreach ($package->medicines as $medicine)
                <div class="form-check">
                  <input name="medicines_old[]" class="form-check-input" type="checkbox" value="{{$medicine->id}}" id="flexCheckDefault{{$medicine->id}}">
                  <label class="form-check-label" for="flexCheckDefault{{$medicine->id}}">
                      {{$medicine->translation->name}}
                  </label>
                </div>
              @endforeach
            </div>
            <div class="col-4">
              Other medicines
              @foreach ($medicines as $medicine)
                <div class="form-check">
                  <input name="medicines_new[]" class="form-check-input" type="checkbox" value="{{$medicine->id}}" id="flexCheckDefault{{$medicine->id}}">
                  <label class="form-check-label" for="flexCheckDefault{{$medicine->id}}">
                      {{$medicine->translation->name}}
                  </label>
                </div>
              @endforeach
            </div>
            <div class="col-4">
              Extra medicines
              @foreach ($medicines as $medicine)
                <div class="form-check">
                  <input name="extra[]" class="form-check-input" type="checkbox" value="{{$medicine->id}}" id="flexCheckDefault{{$medicine->id}}">
                  <label class="form-check-label" for="flexCheckDefault{{$medicine->id}}">
                      {{$medicine->translation->name}}
                  </label>
                </div>
              @endforeach
            </div>
           </div>
           <div class="h2 text-center my-4">
            Tests
          </div>
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('common.text')}}</th>
                <th scope="col">{{__('common.percent')}}</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($package->tests as $key => $test)
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td>{{$test->test->translation->name}}</td>
                  <td><input name="updates[{{$key}}][percent]" 
                    value="{{$test->percent}}"
                    type="number" class="form-control form-control-sm" 
                    style="width: 60px"> %</td>
                  <td>
                    <input name="updates[{{$key}}][id]" value="{{$test->id}}" type="checkbox" class="form-check">
                  </td>
                  <td>
                    <input name="deletes[]" value="{{$test->id}}" type="checkbox" class="form-check">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="h2 text-center my-4">
            Unadded tests
          </div>
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('common.text')}}</th>
                <th scope="col">{{__('common.percent')}}</th>
                <th scope="col">Add</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tests as $key => $test)
                <tr>
                  <th scope="row">{{$key + 1}}</th>
                  <td>{{$test->translation->name}}</td>
                  <td><input name="addes[{{$key}}][percent]" 
                    type="number" class="form-control form-control-sm" 
                    style="width: 60px"> %</td>
                  <td>
                    <input name="addes[{{$key}}][id]" value="{{$test->id}}" type="checkbox" class="form-check">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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