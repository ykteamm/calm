@extends('admin.layouts.app')
@section('admin_content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Package rule</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-30 pt-30">
    <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
      <h4 class="ml-10 text-15 lh-1 fw-500">Package: {{$rule->package->translation->name}}</h4>
      <h4 class="ml-10 text-15 lh-1 fw-500">Result: @if($rule->result) {{$rule->result->translation->name}} @else No @endif</h4>
      <h4 class="ml-10 text-15 lh-1 fw-500">Min: {{$rule->min}}</h4>
      <h4 class="ml-10 text-15 lh-1 fw-500">Max: {{$rule->max}}</h4>
    </div>
  </div>
</div>
@endsection