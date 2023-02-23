<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'service_id' => $this->service_id, 
            'client_id' => $this->client_id,
            'appointment_id' => $this->appointment_id,
            'isApproved' => $this->isApproved,
          ];
    }
}
