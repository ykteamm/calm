@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')  
      <div class="dashboard__main mt-0">
        <div class="dashboard__content pt-0 px-15 pb-0" style="padding-left: 0 !important; position: relative;background: linear-gradient(90deg, #162a39, #194d75);border-radius: 0;overflow: hidden;">
            @include('user.quiz.result-modal')
            <a class="btn btn-primary" data-bs-toggle="modal" href="#quizResultModal" role="button">Open first modal</a>
        </div>
      </div>
    </div>
  </div>
@endsection
