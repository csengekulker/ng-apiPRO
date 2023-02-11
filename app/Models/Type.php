<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Service::class);
    }

    public function duration() { }

    public function price() { }
}
