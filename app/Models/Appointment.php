<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start',
        'end',
        'isOpen'
    ];

    public function booking() {
        return $this->hasOne(Booking::class);
    }

}
