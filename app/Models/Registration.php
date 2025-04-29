<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Registration extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'is_open',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($registration) {
            $registration->slug = Str::slug($registration->name);
        });

        static::updating(function ($registration) {
            $registration->slug = Str::slug($registration->name);
        });
    }

    public function applications()
    {
        return $this->hasMany(RegistrationApplication::class, 'registration_id');
    }
}
