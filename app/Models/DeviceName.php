<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DeviceName extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Generate a slug automatically when creating or updating a device name
     */
    protected static function booted(): void
    {
        static::created(function ($deviceName) {
            $deviceName->slug = Str::slug($deviceName->name);
        });

        static::updated(function ($deviceName) {
            $deviceName->slug = Str::slug($deviceName->name);
        });
    }

    /**
     * A device name has many devices
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
