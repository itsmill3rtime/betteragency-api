<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactPhoneNumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'phone_number_type' => $this->phone_number_type,
            'phone_number'      => $this->phone_number,
            'phone_ext'         => $this->phone_ext,
            'status'            => $this->status,

            'contact' => ContactResource::make($this->whenLoaded('contact')),
        ];
    }
}
