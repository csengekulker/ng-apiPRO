<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'duration',
        'price'
    ];

    public function services(): BelongsToMany {
        return $this->belongsToMany(Service::class);
    }

}
