<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\IndexRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\UserUpsertRequest;
use App\Models\User;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }
    
    public function upload(AssetRequest $assetRequest)
    {
        $data = $assetRequest->validated();
        $data['type'] = User::IMAGE;
        return $this->service->storeAsset(auth()->id(), $data, true)
            ->redirect('/');
    }

    public function reupload(AssetRequest $assetRequest, $asset)
    {
        $data = $assetRequest->validated();
        $data['type'] = User::IMAGE;
        return $this->service->updateAsset(auth()->id(), $asset, $data, true)
            ->redirect('/');
    }

    public function unupload($asset)
    {
        return $this->service->deleteAsset(auth()->id(), $asset, true)
            ->redirect('/');
    }
    
    public function image()
    {
        return view('user.image', ['user' => auth()->user()]);
    }
    
}
