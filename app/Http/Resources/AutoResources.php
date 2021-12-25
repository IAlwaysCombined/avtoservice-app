<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoResources extends JsonResource
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
            'vin' => $this->vin,
            'model' => $this->model,
            'brand' => $this->brand,
            'color' => $this->color,
            'eco' => $this->eco,
            'created_at' => $this->created_at,
        ];
    }
}
