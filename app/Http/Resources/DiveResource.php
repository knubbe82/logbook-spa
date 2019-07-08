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
            'number' => $this->number,
            'date_of_diving' => Carbon::parse($this->time)->format('d-m-Y'),
            'date' => Carbon::parse($this->time),
            'time_of_diving' => Carbon::parse($this->time)->format('H:i'),
            'location' => $this->location,
            'bottom_time' => $this->bottom_time,
            'max_depth' => $this->max_depth,
            'water_temp' => $this->water_temp,
            'day_night' => $this->day_night,
            'visibility' => $this->visibility,
            'dive_start' => $this->dive_start,
            'current' => $this->current,
            'tank_type' => $this->tank_type,
            'tank_capacity' => $this->tank_capacity,
            'bar_start' => $this->bar_start,
            'bar_start' => $this->bar_start,
            'bar_end' => $this->bar_end,
            'gas_mix' => $this->gas_mix,
            'belt_weights' => $this->belt_weights,
            'bcd_weights' => $this->bcd_weights,
            'description' => $this->description,
            'user' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
