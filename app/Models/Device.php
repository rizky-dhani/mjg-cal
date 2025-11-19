<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name_id',
        'device_number',
        'brand_id',
        'type_id',
        'serial_number',
        'location',
        'procurement_year',
        'pic_id',
        'customer_id',
        'calibrated_date',
        'next_calibration_date',
        'cert_number',
        'barcode',
        'result',
        'status',
        'notes',
        'admin_id',
    ];

    /**
     * A device belongs to a device name
     */
    public function deviceName()
    {
        return $this->belongsTo(DeviceName::class, 'device_name_id');
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
     * A device belongs to a user (PIC - Person In Charge)
     */
    public function pic()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A device belongs to an admin user (who created it)
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * A device belongs to a customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * A device has many inventories
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
