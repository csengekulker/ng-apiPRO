<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'client_id',
        'isApproved',
        'date'
    ];

    public function client() { 
        return $this->hasOne(Client::class);
    }

    public function service() { 
        return $this->hasOne(Service::class);
    }
}
