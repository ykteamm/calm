<div>
    <form action="{{route('save-rewards')}}" method="POST">
        @csrf
        @foreach ($rewards as $k => $reward)
            <div class="card py-5 my-2 border-1">
                <div class="card-header border-0" style="">
                    <div class="row">
                        <div class="col-1">
                            {{$k+1}}.
                        </div>
                        <div class="col-10">
                            <input name="rewards[{{$k}}][text]" class="w-100" value="{{$reward->text}}" type="text">
                        </div>
                        <div class="col-1 pointer">
                            <img wire:click="change({{$k}})" style="width:25px" src="{{asset('calm/change.png')}}" alt="">
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