
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
                        <form class="contact-form row y-gap-30" action="{{route('auth.register')}}" method="POST">
                            @csrf
                            <div class="">
                                <label class="text-16 lh-1 fw-500 text-dark-1 ">{{__('common.login_name')}}</label>
                                <input name="firstname" type="text">
                            </div>
                            <div class="">
                                <label class="text-16 lh-1 fw-500 text-dark-1 ">{{__('common.login_surname')}}</label>
                                <input name="lastname" type="text">
                            </div>
                            <div class="">
                                <label class="text-16 lh-1 fw-500 text-dark-1 ">{{__('common.login_phone')}}</label>
                                <input name="phone" value="998" type="text" data-inputmask='"mask": "999 (99) 999-99-99"' data-mask name="phone" onfocus="this.removeAttribute('readonly');" readonly>
                            </div>
                            <div class="">
                                <label class="text-16 lh-1 fw-500 text-dark-1 ">{{__('common.login_password')}}</label>
                                <input name="password" type="password">
                            </div>
                            {{-- <div class="">
                                <label class="text-16 lh-1 fw-500 text-dark-1 ">{{__('common.login_re_password')}}</label>
                                <input name="password" type="password">
                            </div> --}}
                            <div class="row justify-center pt-15">
                                <div class="col-auto">
                                    <button type="submit" class="button -md -purple-1 text-white">{{__('common.register')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-20">
            <span>{{__('common.login_if_login')}}</span>
          </div>
          <div class="text-center mt-10">
            <a href="{{route('auth.login-view')}}" style="color: blue">
                {{__('common.login')}}
            </a>
          </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('calm/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('calm/js/inputmask/jquery.inputmask.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $(function () {
            $('[data-mask]').inputmask()
        });
    });
</script>
@endsection
