<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestJobResources extends JsonResource
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
            'type' => 'Request Job',
            'attributes' => [
                'email' => $this->email,
                'phone' => $this->email,
                'name' => $this->name,
                'surname' => $this->surname,
                'passport_series' => $this->passport_series,
                'passport_number' => $this->passport_number,
                'date' => $this->date,
                'depart' => $this->depart,
                'depart_code' => $this->depart_code,
                'created_at' => $this->created_at,
            ],
        ];
    }
}
