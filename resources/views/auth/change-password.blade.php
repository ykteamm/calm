@extends('user.layouts.app')
@section('user_content')
<div class="dashboard__content bg-light-4">
    @if ($error = Session::get('error'))
      <div class="button -md -red-1 text-white">{{$error}}</div>
    @endif
  <div class="row pb-50 mb-10">
    <div class="col-auto">
      <h1 class="text-30 lh-12 fw-700">Lesson</h1>
      <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>
    </div>
  </div>
  <div class="row y-gap-60">
    <div class="col-12">
      <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
        <div class="py-30 px-30">
          <form class="contact-form row y-gap-30" action="{{route('auth.change-password')}}" method="POST">
            @csrf
            <div class="mb-10">
              <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Old password</label>
              <input name="old_password" type="password" placeholder="Old password">
          </div>
          <div class="mb-10">
            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">New password</label>
            <input name="new_password" type="password" placeholder="New password">
        </div>
            <div class="row justify-between pt-15">
              <div class="col-auto">
              </div>
              <div class="col-auto">
                <button type="submit" class="button -md -purple-1 text-white">Change</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection