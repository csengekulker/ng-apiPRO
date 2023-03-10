<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        //clientdetails from frontend
        //match table (tbd)
        'fullName',
        'dob',
        'email',
        'phone',
        'fullAddress' //??
    ];

    public function appointment() { 
        return $this->belongsTo(Appointment::class);
    }
}
