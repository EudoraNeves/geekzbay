<?php

namespace App\Http\Resources\v1;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class MeetupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $community = DB::table('communities')->find($this->community_id);
        $location = DB::table('locations')->find($this->location_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'desc' => $this->desc,
            'community' => $community,
            'location' => ($location ?
                [
                    'FromDataBase' => true,
                    'data' => $location
                ] : [
                    'FromDataBase' => false,
                    'data' => [
                        "city" => $this->alt_address_city,
                        "road" => $this->alt_address_street,
                        "number" => $this->alt_address_number
                    ]
                ]
            ),
        ];
    }
}
