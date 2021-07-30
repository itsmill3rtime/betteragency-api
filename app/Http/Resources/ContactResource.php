<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'phone'         => $this->phone,

            // TODO:: notes, may be a resource we would want to paginate. in that case we would remove it from here and only allow it to be loaded via its own endpoint
            'notes'         => ContactNoteResource::collection($this->whenLoaded('notes')),
            'phone_numbers' => ContactPhoneNumberResource::collection($this->whenLoaded('phoneNumbers')),
        ];
    }
}
