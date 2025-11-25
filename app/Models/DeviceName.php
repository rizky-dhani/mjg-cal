<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DeviceName extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Generate a slug automatically when creating or updating a device name
     */
    protected static function booted(): void
    {
        static::saving(function ($deviceName) {
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
