<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'range' => $this->range,
            'date' => $this->date,
            'faculty' => $this->faculty,
            'speciality' => $this->speciality,
            'created_at' => $this->created_at,
        ];
    }
}
