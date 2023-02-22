<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'hour',
        'min',
        'isOpen'
    ];

    //TODO:eloquent relations
    public function booking() {
        return $this->belongsTo(Booking::class);
    }
}
