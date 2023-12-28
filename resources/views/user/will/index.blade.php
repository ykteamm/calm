@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        @include('user.will.slider')
        <div class="container" style="margin-top: 20px">
            <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                <li style="width:45%" class="nav-item text-center" role="presentation">
                  <div style="" class="nav-link w-20 border border-2 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    {{__('common.task')}}
                  </div>
                </li>
                <li style="width:45%" class="nav-item text-center" role="presentation">
                  <div style="" class="nav-link w-20 border border-2" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    {{__('common.reward')}}
                  </div>
                </li>
            </ul>
            <div style="margin-top: 10px" class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @if (count($aims) > 0)
                        <form action="{{route('save-aims')}}" method="POST">
                            @csrf
                            @foreach ($aims as $k => $aim)
                                <div class="card py-5 my-2 border-1">
                                    <div class="card-header border-0" style="">
                                        <div class="row">
                                            <div class="col-11">
                                                <span class="mr-5">{{$k+1}}.</span><span>{{$aim->text}}</span>
                                            </div>
                                            @if (!$aim->done)
                                                <div class="col-1">
                                                    <input name="aims[{{$k}}][id]" value="{{$aim->id}}" class="form-check" type="checkbox" >
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mb-5 pb-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    @else
                        @livewire('aim')
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @if (!$doneAims)
                        <div class="alert alert-danger text-center">
                            Sizda bu hafta bajarilga topshiriqlar navjud emas
                        </div>
                    @else
                        @if (count($rewards) > 0)
                            <form action="{{route('save-rewards')}}" method="POST">
                                @csrf
                                @foreach ($rewards as $k => $aim)
                                    <div class="card py-5 my-2 border-1">
                                        <div class="card-header border-0" style="">
                                            <div class="row">
                                                <div class="col-11">
                                                    <span class="mr-5">{{$k+1}}.</span><span>{{$aim->text}}</span>
                                                </div>
                                                @if (!$aim->done)
                                                    <div class="col-1">
                                                        <input name="rewards[{{$k}}][id]" value="{{$aim->id}}" class="form-check" type="checkbox" >
                                                    </div>
                                                @else
                                                    <div class="col-1">
                                                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#showThanks">
                                                            <img src="{{asset('calm/show.png')}}" alt="Alt">
                                                        </button>
                                                    </div>
                                                    @include('user.will.thanks')                                                
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mb-5 pb-5">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        @else
                            @livewire('reward')
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection