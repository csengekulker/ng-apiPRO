<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "type_id"
    ];

    public function appointment() { 
        return $this->belongsTo(Appointment::class);
    }

    public function type() { 
        return $this->belongsTo(Type::class);
    }

    

    
}
