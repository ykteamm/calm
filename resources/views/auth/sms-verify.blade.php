@extends('user.layouts.app')
@section('user_content')
<div class="dashboard__content bg-light-4">
    @if ($error = Session::get('error'))
      <div class="button -md -red-1 text-white">{{$error}}</div>
    @endif
    <div class="row pb-20 mb-10">
        <h1 class="text-30 lh-12 fw-700" style="text-align: center;">{{__('common.nvt')}}</h1>
    </div>
  <div class="row y-gap-60">
    <div class="col-12">
      <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
        <div class="py-30 px-30">
          <form class="contact-form row y-gap-30" action="{{route('auth.sms-verify')}}" method="POST">
            @csrf
            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{__('common.verify_text')}}</label>
            <input name="sms_verif_code" type="number" placeholder="{{__('common.verify_pl_text')}}" required>
            <div class="row justify-center pt-15">
              <div class="col-auto">
                <button type="submit" class="button -md -purple-1 text-white">{{__('common.verify')}}</button>
              </div>
            </div>
          </form>
        </div>
        <div class="text-center mt-20">
            <span>Agar sizga 1 daqiqa ichida tasdiqlash kodi kelmasa qayta ro'yhatdan o'ting</span>
          </div>
          <div class="text-center mt-10">
            <a href="{{route('auth.register-view')}}" style="color: blue">
                {{__('common.register')}}
            </a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
