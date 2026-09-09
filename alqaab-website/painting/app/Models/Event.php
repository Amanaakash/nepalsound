<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'company_name',
        'phone_number',
        'email',
        'subject',
        'event_start_date',
        'event_end_date',
        'event_venue',
        'event_description',
        'estimated_attendance',
        'needs',
        'rider_path',
    ];
}
