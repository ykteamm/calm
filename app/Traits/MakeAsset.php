<?php

namespace App\Traits;

use FFMpeg\FFProbe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MakeAsset
{
    public $types = [
        'image' => [
            'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
            'mime_types' => ['image/jpeg', 'image/png', 'image/gif'],
        ],
        'video' => [
            'extensions' => ['mp4', 'mov', 'avi', 'wmv', 'flv', 'mpg', 'mpeg'],
            'mime_types' => ['video/mp4', 'video/quicktime', 'video/x-ms-wmv', 'video/x-flv', 'video/mpeg', 'video/x-msvideo'],
        ],
        'audio' => [
            'extensions' => ['mp3', 'wav', 'ogg', 'aac', 'flac', 'wma', 'm4a'],
            'mime_types' => ['audio/mpeg', 'audio/x-wav', 'audio/ogg', 'audio/x-aac', 'audio/flac', 'audio/x-ms-wma'],
        ],
        'file' => [
            'extensions' => ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'txt', 'zip', 'rar', 'gpg'],
            'mime_types' => ['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/pdf', 'text/plain', 'application/zip', 'application/x-rar-compressed'],
        ],
    ];

    protected function getTypeByExtension($ext)
    {
        foreach ($this->types as $type => $value) {
            if (in_array($ext, $value['extensions'])) return $type;
        }
        return 'other';
    }

    public function storeAsset($id, $data, $redirective = false)
    {   
        if (($model = $this->findById($id)) && $this->model->assetable) {
            $this->withTransaction(function () use ($model, $data) {
                if (!($file = $this->getFile($data))) {
                    $this->setResponseData(0, null, 'file_not_found', 500);
                    return;
                };
                if ($info = $this->uploadAsset($file)) {
                    $assetObject = $this->storeAssetModel($model, $info, $data);
                    $this->storeAssetModelTranslations($model, $assetObject, $data);
                    $this->setResponseData(1, $info, null, 200);
                } else {
                    $this->setResponseData(0, null, 'error accured', 500);
                }
            }, function ($error, $code) {
                $this->setResponseData(0, null, $error, $code);
            });
        } else $this->setResponseData(0, null, $this->getModelName() . '_not_found', 404);
        return $this->response($redirective);
    }

    protected function storeAssetModel($model, $info, $data)
    {
        $type = getProp($data, 'type');
        $assetTypes = $model->assetTypes();
        $builder = getProp($assetTypes, $type, $model->assets());
        $assetObject = $builder->create([
            'path' => $info['storpath'],
            'info' => json_encode($info),
            'type' => getProp($data, 'type', 0)
        ]);
        return $assetObject;
    }

    protected function storeAssetModelTranslations($model, $assetObject, $data)
    {
        $translations = getProp($data, 'translations', []);
        foreach ($translations as $translation) {
            $model->assetTranslationModel::create($translation + ['object_id' => $assetObject->id]);
        }
    }
    protected function updateAssetModelTranslations($model, $assetObject, $data)
    {
        $translations = getProp($data, 'translations', []);
        foreach ($translations as $translation) {
            if ($trId = getProp($translation, 'id')) {
                if ($trModel = $model->assetTranslationModel::find($trId)) {
                    $trModel->update($translation);
                }
            } else {
                $isExists = $model->assetTranslationModel::firstWhere([
                    'object_id' => $model->id,
                    'language_code' => $translation['language_code'],
                ]);
                if (!$isExists) {
                    $model->assetTranslationModel::create($translation + ['object_id' => $assetObject->id]);
                }
            }
        }
    }

    public function updateAsset($id, $asset, $data, $redirective = false)
    {
        if (($model = $this->findById($id)) && $this->model->assetable) {
            $this->withTransaction(function () use ($model, $asset, $data) {
                if ($assetObject = $model->assets()->find($asset)) {
                    if (!($file = $this->getFile($data))) {
                        $this->updateAssetModelTranslations($model, $assetObject, $data);
                        return;
                    }
                    if(!$this->deleteFile($assetObject)){
                        $this->setResponseData(0, null, 'cant_delete_file', 500);
                        return;
                    }
                    if ($info = $this->uploadAsset($file)) {
                        $assetObject->update([
                            'path' => $info['storpath'],
                            'info' => json_encode($info),
                            'type' => getProp($data, 'type', getProp($assetObject, 'type', 0))
                        ]);
                        $this->updateAssetModelTranslations($model, $assetObject, $data);
                        $this->setResponseData(1, $info, null, 200);
                    } else $this->setResponseData(0, null, 'error occured', 500);
                } else $this->setResponseData(0, null, 'asset_not_found', 404);
            }, function ($error, $code) {
                $this->setResponseData(0, null, $error, $code);
            });
        } else $this->setResponseData(0, null, $this->getModelName() . '_not_found', 404);
        return $this->response($redirective);
    }

    public function deleteAsset($id, $asset, $redirective = false)
    {
        if (($model = $this->findById($id)) && $this->model->assetable) {
            $this->withTransaction(function () use ($model, $asset) {
                if ($assetObject = $model->assets()->find($asset)) {
                    if(!$this->deleteFile($assetObject)){
                        $this->setResponseData(0, null, 'cant_delete_file', 500);
                        return;
                    }
                    $assetObject->translations()->delete();
                    $assetObject->delete();
                    $this->setResponseData(1, 'delted_successfully', null, 204);
                } else $this->setResponseData(0, null, 'asset_not_found', 500);
            }, function ($error, $code) {
                $this->setResponseData(0, null, $error, $code);
            });
        } else $this->setResponseData(0, null, $this->getModelName() . '_not_found', 404);
        return $this->response($redirective);
    }

    public function downloadAsset($id, $asset, $redirective = false)
    {
        if (($model = $this->findById($id)) && $this->model->assetable) {
            if ($assetObject = $model->assets()->find($asset)) {
                if (Storage::exists($assetObject->path)) {
                    return Storage::download($assetObject->path);
                } else $this->setResponseData(0, null, 'asset_not_found', 404);
            } else $this->setResponseData(0, null, 'asset_not_found', 404);
        } else $this->setResponseData(0, null, $this->getModelName() . '_not_found', 404);
        return $this->response($redirective);
    }

    public function getAsset($id, $asset)
    {
        if (($model = $this->findById($id)) && $this->model->assetable) {
            if ($assetObject = $model->assets()->find($asset)) return $assetObject;
        }
    }

    public function deleteFile($assetObject)
    {
        if(Storage::exists($assetObject->path)) return Storage::delete($assetObject->path);
        else return true;
    }

    protected function uploadAsset($assetFile)
    {
        $settings = $this->model->assetSettings();
        $folder = getProp($settings, 'folder', $this->getModelName());
        $scope = getProp($settings, 'scope', 'assets');
        $filename = (string)Str::uuid();
        $extension = $assetFile->getClientOriginalExtension();
        $type = $this->getTypeByExtension($extension);
        $info = [];
        if ($type == 'audio' && isset($settings['check']) && $settings['check']) {
            $ffprobe = FFProbe::create([
                'ffmpeg.binaries' => exec('which ffmpeg'),
                'ffprobe.binaries' => exec('which ffprobe')
            ]);
            $duration = $ffprobe->format($assetFile)->get('duration');
            $info['duration'] = $duration;
        }
        $path = $scope . '/' . $folder;
        $name = $filename . '.' . $extension;
        if (Storage::putFileAs($path, $assetFile, $name)) {
            $info = array_merge($info, [
                'storpath' => $path . '/' . $name,
                'path' => $path,
                'filename' => $filename,
                'extension' => $extension,
                'folder' => $folder,
                'type' => $type,
                'size' => $assetFile->getSize(),
                'originalName' => pathinfo($assetFile->getClientOriginalName(), PATHINFO_FILENAME),
            ]);
        } else $info = false;
        return $info;
    }

    protected function getFile($data)
    {
        if (request()->hasFile('file')) return getProp($data, 'file');
        if (request()->hasFile('files')) return getProp($data, 'files.0');
    }
}
