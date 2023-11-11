<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService extends BaseService
{
    public function __construct(User $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = UserResource::class;

        $this->likableFields = [
            'firstname',
            'lastname',
            'username',
            'email',
            'phone'
        ];

        $this->equalableFields = [
            'type'
        ];

        parent::__construct();
    }

    public function avatarUpload($id, $data)
    {
        $this->withTransaction(
            function() use ($id, $data) {
                if ($user = $this->findById($id)) {
                    if($user->avatar) $this->imageDelete($user->avatar);
                    $image = $data['image'];
                    $name = date("Ymdis") . Str::random(5);
                    $extension = $image->getClientOriginalExtension();
                    $image->storeAs('images', "$name.$extension");
                    $avatar = $user->avatar()->create([
                        'name' => $name,
                        'extension' => $extension,
                        'folder' => 'images'
                    ]);
                    return $this->setResponseData(1, $avatar);
                } else $this->setResponseData(0, null, 'User not found');
            },
            function ($error, $code) {
                return $this->setResponseData(0, null, $error, $code);
            }
        );
        return $this->response();
    }

    public function backgroundUpload($id, $data)
    {
        $this->withTransaction(
            function() use ($id, $data) {
                if ($user = $this->findById($id)) {
                    if($user->background) $this->imageDelete($user->background);
                    $image = $data['image'];
                    $name = date("Ymdis") . Str::random(5);
                    $extension = $image->getClientOriginalExtension();
                    $image->storeAs('images', "$name.$extension");
                    $background = $user->background()->create([
                        'name' => $name,
                        'extension' => $extension,
                        'folder' => 'images'
                    ]);
                    return $this->setResponseData(1, $background);
                } else $this->setResponseData(0, null, 'User not found');
            },
            function ($error, $code) {
                return $this->setResponseData(0, null, $error, $code);
            }
        );
        return $this->response();
    }

    protected function imageDelete($image)
    {
        $name = $image->name.'.'.$image->extension;
        $path = storage_path("app/images/$name");
        if(file_exists($path)) unlink($path);
        $image->delete();
    }
}
