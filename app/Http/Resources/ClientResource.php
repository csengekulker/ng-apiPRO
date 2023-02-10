<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
      'id' => $this->id,
      'fullName' => $this->fullName,
      'dob' => $this->dob,
      'email' => $this->email,
      'phone' => $this->phone,
      'fullAddress' => $this->fullAddress
    ];
  }
}
