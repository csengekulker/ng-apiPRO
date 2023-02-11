<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Duration extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'duration'
    ];

    public function type() { 
        return $this->hasMany(Type::class);
    }
}
