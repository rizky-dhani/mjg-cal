<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * An inventory belongs to a device
     */
    public function deviceName()
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * An inventory belongs to a device
     */
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * An inventory belongs to a customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * An inventory has many logbooks
     */
    public function logbooks()
    {
        return $this->hasMany(Logbook::class);
    }
}