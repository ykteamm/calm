<div>
    <form action="{{route('save-aims')}}" method="POST">
        @csrf
        @foreach ($aims as $k => $aim)
            <div class="card py-5 my-2 border-1">
                <div class="card-header border-0" style="">
                    <div class="row">
                        <div class="col-1">
                            {{$k+1}}
                        </div>
                        <div class="col-9">
                            <input name="aims[{{$k}}][text]" class="w-100" value="{{$aim->text}}" type="text">
                        </div>
                        <div class="col-1 pointer">
                            <img wire:click="change({{$k}})" style="width:25px" src="{{asset('calm/change.png')}}" alt="">
                        </div>
                        {{-- <div class="col-1">
                            <input name="aims[{{$k}}][id]" value="{{$aim->id}}" class="form-check" type="checkbox" >
                        </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mb-5 pb-5">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
