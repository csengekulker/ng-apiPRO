<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_id',
        'type_id',
        'appointment_id',
        'isApproved',
    ];

    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }

}
