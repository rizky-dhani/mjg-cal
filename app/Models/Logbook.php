<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Set status automatically to Available when creating an Inventory
     */
    protected static function booted(): void
    {
        static::creating(function ($logbook) {
            $logbook->date = now();
            $logbook->status = 'Borrowed';
            // Generate log number
            if (empty($logbook->log_number)) {
                $latest = static::orderBy('id', 'desc')->first();
                $number = $latest ? $latest->id + 1 : 1;
                $logbook->log_number = 'MJG-CAL-LOG-' . str_pad($number, 6, '0', STR_PAD_LEFT);
            }
            
        });
    }

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