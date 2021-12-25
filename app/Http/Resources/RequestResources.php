<?php

namespace App\Http\Resources;

use App\Models\Material;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResources extends JsonResource
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
            'decs' => $this->decs,
            'created_at' => $this->created_at,
            'material' => $this->maretial,
            'service' => $this->service,
        ];
    }
}
