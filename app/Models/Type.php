<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'duration_id',
        'price_id'
    ];

    public function service() { 
        return $this->hasMany(Service::class);
    }

    public function duration() { 
        return $this->belongsTo(Duration::class);
    }

    public function price() { 
        return $this->belongsTo((Price::class));
    }
}
