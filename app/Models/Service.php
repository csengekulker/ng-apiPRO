<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
    ];

    public function types(): BelongsToMany {
        return $this->belongsToMany(Type::class);
    }
    
}
