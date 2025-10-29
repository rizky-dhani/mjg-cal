<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_id',
        'inventory_number',
        'brand_id',
        'model_id',
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
        'user_id',
    ];

    /**
     * A device belongs to a device name
     */
    public function deviceName()
    {
        return $this->belongsTo(DeviceName::class, 'name_id');
    }

    /**
     * A device belongs to a brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * A device belongs to a model
     */
    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'model_id');
    }

    /**
     * A device belongs to a user (PIC)
     */
    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    /**
     * A device belongs to a customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * A device belongs to a user (who created it)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A device has many inventories
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}