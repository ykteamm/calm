<?php

namespace App\Services;

use App\Models\Meditator;
use App\Services\BaseService;
use App\Http\Resources\MeditatorResource;
use App\Traits\MakeAsset;

class MeditatorService extends BaseService
{
    use MakeAsset;
    public function __construct(Meditator $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = MeditatorResource::class;

        $this->likableFields = [
            'firstname',
            'lastname',
        ];

        $this->equalableFields = [
            'id'
        ];

        parent::__construct();
    }

    // public function avatarUpload($id, $data)
    // {
    //     $this->withTransaction(
    //         function() use ($id, $data) {
    //             if ($meditator = $this->findById($id)) {
    //                 if($meditator->avatar) $this->imageDelete($meditator->avatar);
    //                 $image = $data['image'];
    //                 $name = date("Ymdis") . Str::random(5);
    //                 $extension = $image->getClientOriginalExtension();
    //                 $image->storeAs('images', "$name.$extension");
    //                 $avatar = $meditator->avatar()->create([
    //                     'name' => $name,
    //                     'extension' => $extension,
    //                     'folder' => 'images'
    //                 ]);
    //                 return $this->setResponseData(1, $avatar);
    //             } else $this->setResponseData(0, null, 'Meditator not found');
    //         },
    //         function ($error, $code) {
    //             return $this->setResponseData(0, null, $error, $code);
    //         }
    //     );
    //     return $this->response();
    // }

    // public function avatarUploadWeb($id, $data)
    // {
    //     $this->withTransaction(
    //         function() use ($id, $data) {
    //             if ($meditator = $this->findById($id)) {
    //                 if($meditator->avatar) $this->imageDelete($meditator->avatar);
    //                 $image = $data['image'];
    //                 $name = date("Ymdis") . Str::random(5);
    //                 $extension = $image->getClientOriginalExtension();
    //                 $image->storeAs('images', "$name.$extension");
    //                 $avatar = $meditator->avatar()->create([
    //                     'name' => $name,
    //                     'extension' => $extension,
    //                     'folder' => 'images'
    //                 ]);
    //                 return $this->result->setData($avatar);
    //             } else $this->result->setError('Meditator not found');
    //         },
    //         function ($error, $code) {
    //             return $this->result->setError($error);
    //         }
    //     );
    //     return $this->result;
    // }

    // public function imageUploadWeb($id, $data)
    // {
    //     $this->withTransaction(
    //         function() use ($id, $data) {
    //             if ($meditator = $this->findById($id)) {
    //                 if($meditator->image) $this->imageDelete($meditator->image);
    //                 $image = $data['image'];
    //                 $name = date("Ymdis") . Str::random(5);
    //                 $extension = $image->getClientOriginalExtension();
    //                 $image->storeAs('images', "$name.$extension");
    //                 $image = $meditator->image()->create([
    //                     'name' => $name,
    //                     'extension' => $extension,
    //                     'folder' => 'images'
    //                 ]);
    //                 return $this->result->setData($image);
    //             } else $this->result->setError('Meditator not found');
    //         },
    //         function ($error, $code) {
    //             return $this->result->setError($error);
    //         }
    //     );
    //     return $this->result;
    // }

    // public function imageUpload($id, $data)
    // {
    //     $this->withTransaction(
    //         function() use ($id, $data) {
    //             if ($meditator = $this->findById($id)) {
    //                 if($meditator->image) $this->imageDelete($meditator->image);
    //                 $image = $data['image'];
    //                 $name = date("Ymdis") . Str::random(5);
    //                 $extension = $image->getClientOriginalExtension();
    //                 $image->storeAs('images', "$name.$extension");
    //                 $image = $meditator->image()->create([
    //                     'name' => $name,
    //                     'extension' => $extension,
    //                     'folder' => 'images'
    //                 ]);
    //                 return $this->setResponseData(1, $image);
    //             } else $this->setResponseData(0, null, 'User not found');
    //         },
    //         function ($error, $code) {
    //             return $this->setResponseData(0, null, $error, $code);
    //         }
    //     );
    //     return $this->response();
    // }

    // protected function imageDelete($image)
    // {
    //     $name = $image->name.'.'.$image->extension;
    //     $path = storage_path("app/images/$name");
    //     if(file_exists($path)) unlink($path);
    //     $image->delete();
    // }
}
