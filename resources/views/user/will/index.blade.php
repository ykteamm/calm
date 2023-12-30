@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        {{-- @include('user.will.slider') --}}
        <div class="container mb-80" style="margin-top: 20px">
            @if (count($aims) > 0 && count($rewards) == 0)
                <h2 class="text-center">
                    Siz maqsadlaringizga mos o'zingizga mukofot kiritishingiz lozim!
                </h2>
                <div>
                    @livewire('reward')
                </div>
            @else
                @if ($aimdone = \Illuminate\Support\Facades\Session::get('aimdone'))
                    {{-- <div class="button -md -green-1 text-white">{{$aimdone}}</div> --}}
                    <div class="button -md -green-2 text-white mb-20">
                        <span style="color: black">
                            Siz o'z oldingizga qo'ygan vazifani bajardingiz endi mukofotingizni olib o'zingizga rahmat ayting
                        </span>
                    </div>
                @endif
                <ul class="nav nav-pills mb-3 justify-content-between" id="pills-tab" role="tablist">
                    <li style="width:45%" class="nav-item text-center" role="presentation">
                    <div  class="nav-link w-20 border border-2 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <img src="{{asset('packages/maqsad.svg')}}" alt="" style="width: 70%;">
                        <div>
                            <span style="font-size: 20px">{{__('common.task')}}</span>
                        </div>
                        
                    </div>
                    </li>
                    <li style="width:45%" class="nav-item text-center" role="presentation">
                    <div style="" class="nav-link w-20 border border-2" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <img src="{{asset('packages/mukofot.svg')}}" alt="" style="width: 70%;">
                        <div>
                            <span style="font-size: 20px">{{__('common.reward')}}</span>
                        </div>
                    </div>
                    </li>
                </ul>
                <div style="margin-top: 10px" class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        @if (count($aims) > 0)
                            <form action="{{route('save-aims')}}" method="POST">
                                @csrf
                                @foreach ($aims as $k => $aim)
                                    <div class="card py-5 my-2 border-1" style="box-shadow:0 -1px 9px 0 rgb(255 0 0 / 20%), 0 0px 14px 0 rgb(0 145 251 / 19%);">
                                        <div class="card-header border-0" style="background: white">
                                            <div class="row">
                                                <div class="col-10">
                                                    {{-- <span style="width: 10%" class="mr-5">{{$k+1}}.</span> --}}
                                                    <span>{{$aim->text}}</span>
                                                    {{-- <input disabled style="background: white;width: 90%" name="aims[{{$k}}][text]"  value="{{$aim->text}}" type="text"> --}}
                                                    <input class="d-none" name="aims[{{$k}}][old]" value="{{$aim->id}}" type="text">
                                                </div>
                                                @if (!$aim->done)
                                                    <div class="col-2">
                                                        <input name="aims[{{$k}}][id]" value="{{$aim->id}}" onchange="checkk()" class="form-check checkbut" type="checkbox" style="width:17px;">
                                                    </div>
                                                @else
                                                <div class="col-2">
                                                    <i class="fas fa-check" style="color: rgb(63, 234, 37)"></i>
                                                    {{-- <input name="aims[{{$k}}][id]" value="{{$aim->id}}" onchange="checkk()" class="form-check checkbut" type="checkbox" style="width:17px;"> --}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mb-5 pb-5" style="text-align: center">
                                    <button type="submit" class="btn btn-primary" id="asdfg" style="display: none;">Vazifani bajardim</button>
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
                                    <div class="card my-2 border-1" style="box-shadow:0 -1px 9px 0 rgb(255 0 0 / 20%), 0 0px 14px 0 rgb(0 145 251 / 19%);">
                                        <div class="card-header border-0" style="background: rgb(179, 225, 220)">
                                            <div class="row">
                                                <div class="col-12" style="text-align: center">
                                                    {{-- <span style="width: 10%" class="mr-5">{{$k+1}}.</span> --}}
                                                    <span>{{$reward->text}}</span>
                                                    {{-- <input style="width: 90%" name="rewards[{{$k}}][text]" value="{{$reward->text}}" type="text"> --}}
                                                </div>
                                                @if ($doneAims)
                                                    {{-- @if (!$reward->done)
                                                        <div class="col-2">
                                                            <input name="rewards[{{$k}}][id]" value="{{$reward->id}}" class="form-check" type="checkbox" style="width:17px;" >
                                                            <input class="d-none" name="rewards[{{$k}}][old]" value="{{$reward->id}}" type="text" >
                                                        </div>
                                                    @else
                                                        <div class="col-2">
                                                            <a class="@if($reward->done) show @endif" data-bs-toggle="collapse" href="#rewardCollapse{{$reward->id}}" role="button" aria-expanded="false" aria-controls="rewardCollapse{{$reward->id}}">
                                                                <img src="{{asset('calm/show.png')}}" alt="Alt">
                                                            </a>
                                                        </div>
                                                    @endif --}}
                                                @else
                                                    <div class="col-1">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#lockRewardModal">
                                                            <img width="20px" style="    margin-left: 20px !important;" src="{{asset('calm/lock.png')}}" alt="Alt">
                                                        </button>
                                                    </div>
                                                    <div class="modal fade" id="lockRewardModal" tabindex="-1" aria-labelledby="lockRewardModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content text-center">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Mukofotni olish uchun oldin o'zingizga belgilab olgan vazifalaringizni birini bajaring</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="collapse show" id="rewardCollapse{{$reward->id}}">
                                            {{-- <div class="collapse show" id="rewardCollapse{{$reward->id}}"> --}}
                                            <div class="card-body">
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
                                                        <div class="image-upload-wrap">
                                                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                                            <div class="drag-text">
                                                              <h3>Drag and drop a file or select add Image</h3>
                                                            </div>
                                                          </div>
                                                        <label>Image</label>
                                                        <input name="file" class="form-control" type="file" placeholder="Reward avatar">
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="submit" class="btn btn-primary text-white">Upload</button>
                                                    </div>
                                                </form>
                                                <form class="row align-items-center" action="{{route('update-reward-feelings', ['reward' => $reward->id])}}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="col-10">
                                                        <label>Feelings</label>
                                                        <textarea class="form-control" name="feelings">
                                                            {{$reward->feelings}}
                                                        </textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="submit" class="btn btn-primary text-white">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                    </div>
                                @endforeach
                                {{-- <div class="mb-5 pb-5">
                                    <button type="submit" class="btn btn-primary">Mukofotni</button>
                                </div> --}}
                            </form>
                        @else
                            @if (count($aims) == 0)
                            <div>
                                <h5 class="text-center">Oldin o'zinga maqsadlar belgilab oling va o'zingizni mukofotlang</h5>

                            </div>
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
@section('script')
<script src="{{ asset('calm/js/jquery-3.3.1.min.js') }}"></script>

<script>

    function checkk()
    {
        var array = []
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

        for (var i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value)
        }

        if(array.length > 0)
        {
            $('#asdfg').css('display','');
        }else{
            $('#asdfg').css('display','none');

        }
    }
    
</script>

@endsection