<?php

namespace App\Services;

use App\Models\Lesson;
use App\Services\BaseService;
use App\Http\Resources\LessonResource;
use Error;
use FFMpeg\FFProbe;
use Illuminate\Support\Str;


class LessonService extends BaseService
{
    public function __construct(Lesson $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = LessonResource::class;

        $this->likableFields = [];

        $this->equalableFields = [
            'meditation_id',
        ];

        parent::__construct();
    }

    public function audioUpload($id, $data)
    {
        $this->withTransaction(
            function() use ($id, $data) {
                if ($lesson = $this->findById($id)) {
                    $audio = $data['audio'];
                    if(!($d = request('duration'))) {
                        $ffprobe = FFProbe::create([
                            'ffmpeg.binaries' => exec('which ffmpeg'),
                            'ffprobe.binaries' => exec('which ffprobe')
                        ]);
                        $duration = $ffprobe->format($audio)->get('duration');
                    } else $duration = $d;
                    $name = date("Ymdis") . Str::random(5);
                    $extension = $audio->getClientOriginalExtension();
                    $audio->storeAs('audios', "$name.$extension");
                    $savedAudio = $lesson->audios()->create([
                        'name' => $name,
                        'extension' => $extension,
                        'duration' => $duration,
                        'folder' => 'audios'
                    ]);
                    return $this->setResponseData(1, $savedAudio);
                } else $this->setResponseData(0, null, 'Lesson not found');
            },
            function ($error, $code) {
                return $this->setResponseData(0, null, $error, $code);
            }
        );
        return $this->response();
    }

    public function audioUpdate($id, $audio, $data)
    {
        $this->withTransaction(
            function() use ($id, $audio, $data) {
                if ($lesson = $this->findById($id)) {
                    if($old = $lesson->audios()->find($audio)){
                        if(!$this->mediaDelete($old)) {
                            throw new Error("Can't delete $audio audio");
                        };
                        $audio = $data['audio'];
                        if(!($d = request('duration'))) {
                            $ffprobe = FFProbe::create([
                                'ffmpeg.binaries' => exec('which ffmpeg'),
                                'ffprobe.binaries' => exec('which ffprobe')
                            ]);
                            $duration = $ffprobe->format($audio)->get('duration');
                        } else $duration = $d;
                        $name = date("Ymdis") . Str::random(5);
                        $extension = $audio->getClientOriginalExtension();
                        $audio->storeAs('audios', "$name.$extension");
                        $old->update([
                            'name' => $name,
                            'extension' => $extension,
                            'duration' => $duration
                        ]);
                        $this->setResponseData(1, $old);
                    } else $this->setResponseData(0, null, 'Audio not found');
                } else $this->setResponseData(0, null, 'Lesson not found');
            },
            function ($error, $code) {
                $this->setResponseData(0, null, $error, $code);
            }
        );
        return $this->response();   
    }

    public function audioDelete($id, $audio)
    {
        $this->withTransaction(
            function() use ($id, $audio) {
                if ($lesson = $this->findById($id)) {
                    if($old = $lesson->audios()->find($audio)){
                        if(!$this->mediaDelete($old)) {
                            throw new Error("Can't delete $audio audio");
                        };
                        $old->delete();
                        $this->setResponseData(1, $old);
                    } else $this->setResponseData(0, null, 'Audio not found');
                } else $this->setResponseData(0, null, 'Lesson not found');
            },
            function ($error, $code) {
                $this->setResponseData(0, null, $error, $code);
            }
        );
        return $this->response();
    }

    protected function mediaDelete($media)
    {
        $name = $media->name.'.'.$media->extension;
        $folder = $media->folder;
        $path = storage_path("app/$folder/$name");
        if(file_exists($path)) return unlink($path);
        return false;
    }
}
