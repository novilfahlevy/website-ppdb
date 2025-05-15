<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'sfp_option_1',
        'sfp_option_2',
        'sfp_option_3',
        'sfp_option_4',
        'sfp_option_5',
        'dpp_amount',
        'dpp_items',
        'spp_amount',
        'payment_phone',
        'payment_email',
    ];

    protected $casts = [
        'dpp_items' => 'array',
    ];
}
