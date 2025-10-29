<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * A brand has many models
     */
    public function models()
    {
        return $this->hasMany(DeviceModel::class, 'brand_id');
    }

    /**
     * A brand has many devices
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}