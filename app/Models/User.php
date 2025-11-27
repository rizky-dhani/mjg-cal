<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * Set password automatically upon User creation
     */
    protected static function booted(): void
    {
        static::creating(function ($user) {
            $user->userId = Str::orderedUuid();
            $user->password = Hash::make('Calibration2025!');
        });
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * A user belongs to a customer (for Hospital User role)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * A user has many devices as PIC
     */
    public function devicePic()
    {
        return $this->hasMany(Device::class, 'pic_id');
    }

    /**
     * A user has many logbooks as PIC
     */
    public function logbookPic()
    {
        return $this->hasMany(Logbook::class, 'pic_id');
    }
}
