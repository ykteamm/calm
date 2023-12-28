@extends('user.layouts.app')
@section('user_content')
<div class="content-wrapper js-content-wrapper">
    <div class="dashboard -home-9 px-0 js-dashboard-home-9">
    @include('user.layouts.sidebar')
      <div class="dashboard__main mt-0">
        <div class="container">
            <div class="row">
                @foreach ($reward->images as $image)
                    <div class="col-6">
                        <img style="width: 400px" src="{{asset($image->path)}}" alt="">
                    </div>
                @endforeach
            </div>

            <form class="" style="margin-top:30px" action="{{route('reward-image-upload', ['reward' => $reward->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justiy-content-between" >
                    <input name="file" type="file" placeholder="Reward avatar">
                    <button type="submit" class="btn btn-primary text-white">Upload</button>
                </div>
            </form>
            <form class="" style="margin-top:30px" action="{{route('update-reward-feelings', ['reward' => $reward->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="d-flex justiy-content-between" >
                    <textarea class="form-control" name="feelings">
                        {{$reward->feelings}}
                    </textarea>
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>