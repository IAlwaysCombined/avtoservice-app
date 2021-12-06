<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
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
            'id' => $this->id,
            'type' => 'Users',
            'attributes' => [
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'created_at' => $this->created_at,
            ],
        ];
    }
}
