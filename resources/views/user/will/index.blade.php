@extends('user.layouts.app')
@section('user_content')

<div class="content-wrapper js-content-wrapper">
    <style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.form-group {
padding: 30px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
.input-group {
margin-bottom: 30px;
}

#img-upload{
    width: 150px;
    height: 150px;
}

.as-console-wrapper {
display: none !important;
}
.gallery {
  --size: min(60vmin, 400px);
  /* position: absolute; */
  top: 50%;
  left: 50%;
  /* transform: translate(-50%, -50%); */
  box-shadow:
    0 0 10px #0002,
    0 20px 40px -20px #0004;
  /* width: var(--size); */
  height: var(--size);
  background: #fff;
  border: 6px solid #fff;
  display: grid;
  grid-template-rows: 50% 50%;
  grid-template-columns: 1fr 1fr;
  overflow: hidden;
  gap: 6px;
}

.gallery img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
    </style>
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
                            {{-- <form action="{{route('save-rewards')}}" method="POST"> --}}
                                @csrf
                                @foreach ($rewards as $k => $reward)
                                    <div class="card my-2 border-1" style="box-shadow:0 -1px 9px 0 rgb(255 0 0 / 20%), 0 0px 14px 0 rgb(0 145 251 / 19%);">
                                        <div class="card-header border-0" style="background: rgb(179, 225, 220)">
                                            <div class="row">

                                                @if ($doneAims)
                                                <div class="col-12" style="text-align: center">
                                                    <span>{{$reward->text}}</span>
                                                </div>
                                                @else
                                                <div class="col-9" style="text-align: center">
                                                    <span>{{$reward->text}}</span>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#lockRewardModal">
                                                        <img width="20px" style="    margin-left: 18px !important;" src="{{asset('calm/lock.png')}}" alt="Alt">
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
                                        <div class="collapse @if($doneAims) show @endif" id="rewardCollapse{{$reward->id}}">
                                            {{-- <div class="collapse show" id="rewardCollapse{{$reward->id}}"> --}}
                                            <div class="card-body">
                                                @if (isset($reward->images) && count($reward->images) > 0)
                                                <div class="gallery">
                                                    @foreach ($reward->images as $image)
                                                        {{-- <div class="col-4" > --}}
                                                            <img  src="{{asset($image->path)}}" alt="">
                                                        {{-- </div> --}}
                                                    @endforeach
                                                </div>
                                                @endif


                                                <form class="row align-items-center" style="margin-top:30px" action="{{route('reward-image-upload', ['reward' => $reward->id])}}" method="POST" enctype="multipart/form-data">

                                                    {{--  --}}


                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <span class="btn btn-default btn-file" style="border: 1px solid #50935a;
                                                            border-radius: 11px;">
                                                                + <input type="file" name="file" id="imgInp">
                                                            </span>
                                                        </div>

                                                        <div class="col-8">
                                                            {{-- <div class="form-group"> --}}
                                                                    <span class="input-group-btn">
                                                                    </span>
                                                                    <input type="text" class="fffff" name="img" class="form-control" readonly style="border: 1px solid #314730;
                                                                    border-radius: 10px;
                                                                    padding: 4px 20px;">


                                                                {{-- <img id='img-upload'/> --}}
                                                            {{-- </div> --}}
                                                            {{-- <input name="file" class="form-control" type="file" placeholder="Reward avatar"> --}}
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="submit" class="btn btn-primary text-white">
                                                                <i class="fas fa-save"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                                <form class="row align-items-center mt-20" action="{{route('update-reward-feelings', ['reward' => $reward->id])}}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="col-12">
                                                        <label>Mukofotinga rahmat ayting</label>
                                                        <textarea class="editor form-control" name="feelings" rows="10" cols="50">{{$reward->feelings}}</textarea>
                                                    </div>
                                                    <div class="col-12 mt-10" style="text-align: center">
                                                        <button type="submit" class="btn btn-primary text-white">Saqlash</button>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                    </div>
                                @endforeach
                                {{-- <div class="mb-5 pb-5">
                                    <button type="submit" class="btn btn-primary">Mukofotni</button>
                                </div> --}}
                            {{-- </form> --}}
                        @else
                            @if (count($aims) == 0)
                            <div>
                                <h5 class="text-center">Mark your accomplishments beforehand and reward yourself</h5>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    tinymce.init({
      selector: 'textarea.editor',
    });
  </script>
<script>
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

                $('.fffff').val(log);

            // if( input.length ) {
            //     input.val(log);
            // } else {
            //     if( log ) alert(log);
            // }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function sdfsdf()
        {
            readURL(this);

        }
        // $("#imgInp").change(function(){
        // });
    });
</script>
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
