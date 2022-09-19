<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CommunityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $category_name = DB::table('categories')->select('name', 'id')->find($this->category_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->img,
            'discordLink' => $this->discordLink,
            'category' => $category_name
        ];
    }
}
