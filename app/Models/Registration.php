<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Registration extends Model
{
    protected $fillable = [
        'academic_year',
        'name',
        'slug',
        'start_date',
        'end_date',
        'is_open',
        'is_archived'
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

        static::addGlobalScope('orderByNameAndAcademicYear', function (Builder $builder) {
            $builder->orderBy('academic_year', 'desc')
               ->orderBy('name', 'asc');
        });
    }

    public function scopeOpen(Builder $query)
    {
        return $query->where('is_open', true);
    }
    
    public function scopeUnarchived(Builder $query)
    {
        return $query->where('is_archived', false);
    }

    public function scopeArchived(Builder $query)
    {
        return $query->where('is_archived', true);
    }

    public function applications()
    {
        return $this->hasMany(RegistrationApplication::class, 'registration_id');
    }
}
