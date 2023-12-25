<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SteroidResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
			'translations' => $this->translations,
        ];
    }
}
