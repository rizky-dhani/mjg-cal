<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * A logbook belongs to an inventory
     */
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    /**
     * A logbook belongs to a location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * A logbook belongs to a user (PIC)
     */
    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }
}