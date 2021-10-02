<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sail extends Model
{
    use HasFactory;

    protected $casts = [
        'clients' => 'array',
        'crews' => 'array'
    ];

    /**
     * Table appends
     */
    protected $appends = [
        'destination',
        'ship'
    ];

    public function getDestinationAttribute() {
        return Destination::find( $this->destination_id );
    }

    public function getShipAttribute() {
        return Ship::find( $this->ship_id );
    }
}
