<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'profilePicture' => $this->profilePicture,
            'type' => $this->type,
            'desc' => $this->desc,
            'homePage' => $this->homePage,
            'city' => $this->address_city,
            'road' => $this->address_road,
            'number' => $this->address_number,
        ];
    }
}
