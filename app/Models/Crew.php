<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'email_address', 'date_of_birth',
        'gender', 'profile_image', 'duty_id', 'metadata'
    ];
}
