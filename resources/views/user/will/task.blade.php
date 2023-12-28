<div>
    {{-- <button style="background-color: #ffffff;border-radius:25px;border:1px solid rgb(15, 28, 219);" class="w-100 d-flex justify-between btn  mt-10">

        <span style="font-weight:700"><input type="radio" name="buys" id="" style="margin-right: 3px"> {{__('common.subscribe')}}</span>
        <span style="font-weight:700">10 $</span></span>
    </button> --}}
    <form>
        @foreach ($aims as $k => $aim)
            <div class="card py-5 my-2 border-1">
                <div class="card-header border-0" style="">
                    <div class="row">
                        <div class="col-1">
                            {{$k+1}}.
                        </div>
                        <div class="col-9">
                            <input name="aims[{{$k}}][text]" class="w-100" value="{{$aim->text}}" type="text">
                        </div>
                        <div class="col-1">
                            <img style="width:25px" src="{{asset('calm/change.png')}}" alt="">
                        </div>
                        <div class="col-1">
                            <input name="aims[{{$k}}][id]" value="{{$aim->id}}" class="form-check" type="checkbox" >
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mb-5 pb-5">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>