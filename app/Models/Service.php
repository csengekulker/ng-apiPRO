<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name"
    ];

    public function appointment() { }

    public function type() { 
        return $this->hasMany(Type::class, 'type_id');
    }

    

    
}
