<?php

namespace App\Http\Resources;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{

    public function toArray($request)
    {
        $client = Client::find($this->client_id);
        $service = Service::find($this->service_id);
        $type = Type::find($this->type_id);
        $apt = Appointment::find($this->appointment_id);

        if (is_null($client)) {
            return "Vendeg nem talalhato.";
        } else if (is_null($service)) {
            return "Szolgaltatas nem talalhato.";
        } else if (is_null($type)) {
            return "Tipus nem talalhato.";
        } else if (is_null($apt)) {
            return "Idopont nem talalhato.";
        }
        
        return [
            'id' => $this->id,
            'service_id' => new ServiceResource($service),
            'type_id' => new TypeResource($type), 
            'client' => new ClientResource($client),
            'appointment_id' => new AppointmentResource($apt),
            'isApproved' => $this->isApproved,
          ];
    }
}
