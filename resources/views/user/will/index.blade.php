@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        {{-- @include('user.will.slider') --}}
        <div class="container" style="margin-top: 20px">
            <div class="menu__btn" id="menu_btn" style="color: black;">
                Menu
            </div>
            @if (count($aims) > 0 && count($rewards) == 0)
                <h2 class="text-center">
                    Siz maqsadlaringizga mos mukofot kiritishingiz lozim!
                </h2>
                <div>
                    @livewire('reward')
                </div>
            @else
                @if ($aimdone = \Illuminate\Support\Facades\Session::get('aimdone'))
                    <div class="button -md -green-1 text-white">{{$aimdone}}</div>
                @endif
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
                                                    <span style="width: 10%" class="mr-5">{{$k+1}}.</span>
                                                    <input name="aims[{{$k}}][text]" style="width: 90%" value="{{$aim->text}}" type="text">
                                                    <input class="d-none" name="aims[{{$k}}][old]" value="{{$aim->id}}" type="text">
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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        @else
                            @livewire('aim')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if (count($rewards) > 0)
                            <form action="{{route('save-rewards')}}" method="POST">
                                @csrf
                                @foreach ($rewards as $k => $reward)
                                    <div class="card py-5 my-2 border-1">
                                        <div class="card-header border-0" style="">
                                            <div class="row">
                                                <div class="col-11">
                                                    <span style="width: 10%" class="mr-5">{{$k+1}}.</span>
                                                    <input style="width: 90%" name="rewards[{{$k}}][text]" value="{{$reward->text}}" type="text">
                                                </div>
                                                @if ($doneAims)
                                                    @if (!$reward->done)
                                                        <div class="col-1">
                                                            <input name="rewards[{{$k}}][id]" value="{{$reward->id}}" class="form-check" type="checkbox" >
                                                            <input class="d-none" name="rewards[{{$k}}][old]" value="{{$reward->id}}" type="text">
                                                        </div>
                                                    @else
                                                        <div class="col-1">
                                                            <a class="@if($reward->done) show @endif" data-bs-toggle="collapse" href="#rewardCollapse{{$reward->id}}" role="button" aria-expanded="false" aria-controls="rewardCollapse{{$reward->id}}">
                                                                <img src="{{asset('calm/show.png')}}" alt="Alt">
                                                            </a>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="col-1">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#lockRewardModal">
                                                            <img style="width: 15px" src="{{asset('calm/lock.png')}}" alt="Alt">
                                                        </button>
                                                    </div>
                                                    <div class="modal fade" id="lockRewardModal" tabindex="-1" aria-labelledby="lockRewardModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content text-center">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">OLdin vazifangizni bajaring</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="collapse @if($reward->done) show @endif" id="rewardCollapse{{$reward->id}}">
                                            <div class="card card-body">
                                                <div class="row">
                                                    @foreach ($reward->images as $image)
                                                        <div class="col-6">
                                                            <img style="width: 200px" src="{{asset($image->path)}}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                    
                                                <form class="row align-items-center" style="margin-top:30px" action="{{route('reward-image-upload', ['reward' => $reward->id])}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-10">
                                                        <label>Image</label>
                                                        <input name="file" class="form-control" type="file" placeholder="Reward avatar">
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="submit" class="btn btn-primary text-white">Upload</button>
                                                    </div>
                                                </form>
                                                <div class="">
                                                    <label>Feelings</label>
                                                    <textarea class="form-control" name="rewards[{{$k}}][feelings]">
                                                        {{$reward->feelings}}
                                                    </textarea>
                                                </div>
                                            </div>
                                          </div>
                                    </div>
                                @endforeach
                                <div class="mb-5 pb-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        @else
                            @if (count($aims) == 0)
                                <h2 class="text-center">Oldin o'z oldingizga vazifa qo'ying</h2>
                            @else
                                @livewire('reward')
                            @endif
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
