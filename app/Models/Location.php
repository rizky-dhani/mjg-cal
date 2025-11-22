<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'locationId';
    }

    protected static function booted()
    {
        static::creating(function ($location) {
            if (! $location->locationId) {
                $location->locationId = (string) Str::orderedUuid();
            }
        });
    }

    public function devices()
    {
        $this->hasMany(Device::class);
    }
}
