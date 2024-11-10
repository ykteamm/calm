<div class="modal-content" style="background: #1a4d73">
    <div class="modal-header row" style="border-bottom: none">
        <div class="col-md-10 col-sm-10 col-10">
            <h5 class="modal-title text-color-white-for" id="exampleModalLabel">
                {{$gratitude->translation->name}}
            </h5>
        </div>
        <div class="col-md-2 col-sm-2 col-2">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <br><br>
        <button wire:click="changeQuestion({{$gratitude}})" class="text-white">
            <i class="fas fa-exchange-alt mr-10"></i>
            Replace the question?
        </button>
        {{-- <div class="col-md-12 text-center">
            <h6 class="modal-title text-color-white-for" id="question" style="cursor: pointer;">
                <i class="fas fa-exchange-alt mr-10"></i>
                Change question?
            </h6>
        </div> --}}

    </div>

    <div class="modal-body">
        <form action="{{url('create-reply')}}" class="contact-form" method="POST">
            @csrf
            <input type="hidden" value="{{getProp(auth()->user(), 'id')}}" name="user_id">
            <input type="hidden" value="{{$gratitude->id}}" name="gratitude_id">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">1.</label>
                    <input type="text" class="placeholder123" required name="titles[]" placeholder="Write something...">
                </div>
                <div class="col-12 d-flex align-items-center">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">2.</label>
                    <input type="text" class="placeholder123" name="titles[]" placeholder="Write something...">
                </div>
                <div class="col-12 d-flex align-items-center">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10 text-color-white-for">3.</label>
                    <input type="text" class="placeholder123" name="titles[]" placeholder="Write something...">
                </div>
            </div>
            <div class="modal-footer" style="border: none">
                <button type="submit" class="btn btn-primary">
                    {{-- <i class="fas fa-plus-circle"></i> --}}
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
