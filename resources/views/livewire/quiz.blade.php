<div class="" style="background-color: #ebebeb;height:100vh">
    <div style="padding-top: 1.1875rem;padding-bottom: 1.75rem;">
        <div class="relative">
            <h1 class="text-center">{{__('common.test')}}</h1>
            <div class="position-absolute top-0 bottom-0 d-flex align-items-center" style="left: 30px">
                @if (!$isCompleted)
                    <button @if (!$hasPrev) disabled @endif type="button" wire:click="previous" style="font-size: 1.175rem;line-height: 1.8875rem;">
                        {{"<  "}}{{__('common.previous')}}
                    </button>
                @endif
            </div>
        </div>
    </div>
    @if (!$hasNext)
        @if ($isCompleted)
            <a href="{{route('quiz.result')}}"  class=" d-flex align-items-center justify-content-center btn mb-4 offset-3 col-6 text-white" style="background-color: #1d4d57;height:50px;border-radius:30px; margin-top:180px">
                {{__('common.show_result')}}
            </a>
        @else
            <button wire:click="calculate"  class=" btn mb-4 offset-3 col-6 text-white" style="background-color: #1d4d57;height:50px;border-radius:30px; margin-top:180px">
                {{__('common.complete')}}
            </button>
        @endif
    @else
        <div class="container text-center">
            <h4 class="" style="font-size: 3rem;
            line-height: 2.8125rem;
            color: #1d4d57">
                {{$question->translation->name}}
            </h4>
            <div class="d-flex flex-column row" style="margin-top: 40px">
                @foreach ($question->answers as $answ)
                <button wire:click="select({{$answ}})" class="mb-4 offset-3 col-6" 
                    style="color: #1d4d57;height:50px;
                        background-color:@if($answ->id == getProp($answer, 'id')) #3e646022 @else #fff @endif;
                        @if($answ->id == getProp($answer, 'id')) border:1px solid #1d4d57 @endif;
                        border-radius:30px">
                        {{$answ->translation->name}}
                    </button>
                @endforeach
            </div>
        </div>
    @endif
</div>
