<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'fullName',
        'dob',
        'email',
        'phone',
        'fullAddress'
    ];

    public function appointments() { 
        return $this->hasMany(Appointment::class);
    }
}
