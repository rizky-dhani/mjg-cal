<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_number',
        'date',
        'inventory_id',
        'accessories',
        'start_date',
        'end_date',
        'location',
        'pic_id',
        'status',
    ];

    /**
     * A logbook belongs to an inventory
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    /**
     * A logbook belongs to a user (PIC)
     */
    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }
}