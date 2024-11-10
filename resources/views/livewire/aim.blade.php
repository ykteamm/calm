<div>
    <div>
    <form action="{{route('save-aims')}}" method="POST">
        @csrf
        @foreach ($aims as $k => $aim)
            <div class="card py-5 my-2 border-1" style="box-shadow: 0 0px 9px 0 rgb(81 172 188 / 20%), 0 0px 14px 0 rgb(0 145 251 / 19%);">
                <div class="card-header border-0" style="background-color:white;">
                    <div class="row">
                        <div class="col-1">
                            {{$k+1}}
                        </div>
                        <div class="col-8 pl-0 pr-0">
                            <input name="aims[{{$k}}][text]" class="w-100" value="{{$aim->text}}" type="text">
                        </div>
                        <div class="col-2 pointer">
                            <img wire:click="change({{$k}})" src="{{asset('calm/change.png')}}" alt="" width="20px" style="    margin-left: 20px !important;">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mb-5 pb-5" style="text-align: center;">
{{--            <button type="submit" class="btn btn-primary" style="font-size: 20px;--}}
{{--            border-radius: 12px;--}}
{{--            padding: 6px 30px;">Saqlash</button>--}}
        </div>
    </form>
    </div>
</div>
