<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Generate a slug automatically when creating or updating a brand
     */
    protected static function booted(): void
    {
        static::saving(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });
    }

    /**
     * A brand has many models
     */
    public function types()
    {
        return $this->hasMany(Type::class, 'brand_id');
    }

    /**
     * A brand has many devices
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
