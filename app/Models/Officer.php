<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone_number', 'email_address', 'date_of_birth',
        'gender', 'profile_image', 'position_id', 'metadata'
    ];
}
