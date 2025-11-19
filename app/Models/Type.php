<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'slug',
    ];

    /**
     * A type belongs to a brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * A type has many devices
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
