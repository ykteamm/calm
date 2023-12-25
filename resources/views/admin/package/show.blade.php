@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">package</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <div class="d-flex justify-between items-center py-20 px-30 border-bottom-light">
        <h2 class="text-17 fw-500">{{$package->translation->name}}</h2>
      </div>
      <div class="row">
          <div class="col-6">
            @foreach ($package->translations as $tr)
              <div class="py-30 px-30 hover:green">
                <div class="d-flex" style="justify-content: space-between">
                  <h4 class="ml-10 text-15 lh-1 fw-500">{{$tr->name}}</h4>
                </div>
              </div>
            @endforeach
          </div>
          <div class="col-6">
            @if ($package->image)
              <img style="width:300px" src="{{asset($package->image->path)}}" alt="IMage">
            @endif
          </div>
      </div>
      <div class="h2 text-center py-4">
        {{__('common.medicines')}}
      </div>
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('common.text')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($package->medicines as $key => $medicine)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <td>{{$medicine->translation->name}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="h2 text-center py-4">
        {{__('common.tests')}}
      </div>
      <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('common.text')}}</th>
            <th scope="col">{{__('common.percent')}}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($package->tests as $key => $test)
            <tr>
              <th scope="row">{{$key + 1}}</th>
              <td>{{$test->test->translation->name}}</td>
              <td>{{$test->percent}} %</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection