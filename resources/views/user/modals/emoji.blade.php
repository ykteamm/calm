<div class="modal fade" id="emojiModal" tabindex="-1" aria-labelledby="emojiModalLabel" aria-hidden="true" style="z-index: 44000 !important">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="emojiModalLabel">Kayfiyatingizni belgilang    </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if($user_emoj_have)
            @foreach($emoj_have as $have)
                @if($have->user_id == auth()->user()->id)
                    <div class="accordion__content__inner">
                        <form action="{{route('feeling.update', ['feeling' => $have->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach($emoji as $emoj)
                                    <div class="col-md-2 col-4 pb-10">
                                        <div class="accordion__item add-class">
                                            <input type="checkbox" class="d-none" value="{{$emoj->id}}" name="emoji_id">
                                            <input type="hidden" class="d-none" value="{{auth()->user()->id}}" name="user_id">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="accordion__button justify-content-around">
                                                        <div class="accordion__icon" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                                @if(asset($emoj->image->path))
                                                                    <img width="100" src="{{asset($emoj->image->path)}}" sty alt="">
                                                                @else
                                                                @endif
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <p class="text-center font_family_a pb-10">{{$emoj->text}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center pt-10 pl-10 pr-10">
                                <button class="button -md -purple-1 font_family_a text-white">{{__('Saqlash')}}</button>
                            </div>
                        </form>
                    </div>
                @else
                @endif
            @endforeach
        @else
            <div class="accordion__content__inner">
                <form action="{{route('feeling.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach($emoji as $emoj)
                            <div class="col-md-2 col-4 pb-10">
                                <div class="accordion__item add-class">
                                    <input type="checkbox" class="d-none" value="{{$emoj->id}}" name="emoji_id">
                                    <input type="hidden" class="d-none" value="{{auth()->user()->id}}" name="user_id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="accordion__button justify-content-around">
                                                <div class="accordion__icon" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus icon">
                                                        @if(asset($emoj->image->path))
                                                            <img src="{{asset($emoj->image->path)}}" sty alt="">
                                                        @else
                                                        @endif
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus icon"></svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-color-white-for text-center font_family_a pb-10">{{$emoj->text}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center pt-10 pl-10 pr-10">
                        <button class="button -md -purple-1 font_family_a text-white">Save</button>
                    </div>
                </form>
            </div>
        @endif
        </div>
      </div>
    </div>
  </div>