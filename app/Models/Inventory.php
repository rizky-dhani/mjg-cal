<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Set status automatically to Available when creating an Inventory
     */
    protected static function booted(): void
    {
        static::creating(function ($inventory) {
            $inventory->status = 'Available';
            $inventory->next_calibration_date = \Carbon\Carbon::parse($inventory->last_calibration_date)->addYear();
            // Generate inventory number
            if (empty($inventory->inventory_number)) {
                $latest = static::orderBy('id', 'desc')->first();
                $number = $latest ? $latest->id + 1 : 1;
                $inventory->inventory_number = 'MJG-CAL-INV-' . str_pad($number, 6, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * An inventory belongs to a device
     */
    public function deviceName()
    {
        return $this->belongsTo(DeviceName::class);
    }

    /**
     * A device belongs to a location
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }


    /**
     * A device belongs to a brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * A device belongs to a type (model)
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
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