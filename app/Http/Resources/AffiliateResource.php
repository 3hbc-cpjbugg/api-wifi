<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AffiliateResource extends JsonResource
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
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'first_last_name' => $this->first_last_name,
            'second_last_name' => $this->second_last_name,
            'lat'  => $this->lat,
            'lng'  => $this->lng,
            'photo' => $this->photo,
            'rol' => $this->rol,
            'is_completed' => $this->is_completed,
            'elector_key' => $this->elector_key,
            'section' => $this->section,
            'phone'  => $this->phone,
            'email'  => $this->email,
            'state'  => $this->state,
            'municipality'  => $this->municipality,
            'origin'  => $this->origin,
            'birth_date'  => $this->birth_date,
            'elector_key_valid'  => $this->elector_key_valid,
        ];
    }
}
