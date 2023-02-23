<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'fullName' => $this->fullName,
      'dob' => $this->dob,
      'email' => $this->email,
      'phone' => $this->phone,
      'fullAddress' => $this->fullAddress
    ];
  }
}
