<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' =>$this->id,
            'type'=> 'Service',
            'attributes' => [
                'name' =>$this->name,
                'coast' =>$this->coast,
                'time' =>$this->time,
                'created_at' =>$this->created_at,
            ],
        ];
    }
}
