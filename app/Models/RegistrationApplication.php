<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationApplication extends Model
{
    protected $fillable = [
        'full_name',
        'nisn',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'full_address',
        'personal_phone_number',
        'email',
        'father_name',
        'mother_name',
        'parents_last_education',
        'parents_occupation',
        'parents_address',
        'parents_phone_number',
        'parents_income',
        'previous_school_name',
        'previous_school_npsn',
        'previous_school_address',
        'school_status',
        'exam_participant_number',
        'birth_certificate_filepath',
        'family_card_filepath',
        'report_card_filepath',
        'recent_photo_filepath',
        'achievement_certificate_filepath',
        'domicile_certificate_filepath',
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];
}
