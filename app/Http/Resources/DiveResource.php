<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class DiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'location' => $this->location,
            'time' => Carbon::parse($this->time)->format('d-m-Y'),
            'description' => $this->description,
            'user' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
