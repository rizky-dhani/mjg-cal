<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'phone_number',
        'address',
    ];

    /**
     * A customer has many users (Hospital Users)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * A customer has many devices
     */
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    /**
     * A customer has many inventories
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}