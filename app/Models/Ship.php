<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'max_clients', 'captain_id'
    ];

    protected $appends = [
        'captain'
    ];

    /**
     * Table appends
     */
    public function getCaptainAttribute() {
        return User::find( $this->captain_id );
    }
}
